<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Foglobal extends CI_Model {
			
		protected $user, $db;

		public function __construct() {
			parent::__construct();
		}

		//String : No. Induk Siswa
		public function GeneratePassSiswa($string) {
			return substr(md5($string), 13, 6);
		}

		public function UploadImage($param) {
			$this->api->setAction("ImageUpload");
            $this->api->setParam($param); 
            $output = $this->api->execute();
            return $output;
		}

		public function DeleteImage($param) {
			$this->api->setAction("ImageDelete");
            $this->api->setParam($param); 
            $output = $this->api->execute();
            return $output;
		}
		
		public function MakeJsonError($message) {
			return json_encode([
				"IsError" => true, 
				"ErrMessage" => $message
			]);
		}

		public function encrypt($string) {
			return hash("ripemd160", md5($string));
		}

		public function RandomWord($len = 5) {
		    $word = array_merge(range('a', 'z'), range('A', 'Z'));
		    shuffle($word);
		    return substr(implode($word), 0, $len);
		}

		public function ImgProfile2Photo($db_image) {
			if(preg_match("/(http|https)/", $db_image)) {
				return $db_image;
			} else {
				$img = str_replace("1|", "", $db_image);
				return base_url("assets/upload/images/".$img);
			}
		}

		public function MakeAlert($message, $type = "warning") {
			return "<div class='alert alert-{$type}'><a role='button' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a>{$message}</div>";
		}

		public function IDtoTextKey($id) {
			$data = [1 => "Admin", 2 => "Sekolah", 3 => "Pengguna"];
			return (array_key_exists($id, $data)) ? $data[$id]: "Level tidak valid";
		}

		public function IDtoSex($id) {
	      	$data = [1 => "Laki - laki", 2 => "Perempuan"];
	      	return (array_key_exists($id, $data)) ? $data[$id]: "Jenis Kelamin tidak valid";
	    }

	    public function date_abs($tgl) {
	      $bulan  = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
	      $string = explode("-", $tgl);

	      $stgl   = ($string[2] <= 9) ? "0".$string[2]: $string[2];
	      $sbulan = ($string[1] - 1);
	      $sbulan = (array_key_exists($sbulan, $bulan)) ? $bulan[$sbulan]: "Bulan tidak valid";
	      $stahun = $string[0];

	      return $stgl." ".$sbulan." ".$stahun; 
	    }

	    public function IDtoMonth($id) {
	      	$data = [1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni",
	      			 7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"];
	      	return (array_key_exists($id, $data)) ? $data[$id]: "Bulan tidak valid";
	    }

	    public function CheckSessionLogin() {
			if(empty($this->session->userdata("user"))) {
				$rHtml = $this->MakeAlert("Silahkan login dahulu untuk melanjutkan");
				$this->session->set_userdata("notifikasi", $rHtml);

				redirect("user/login");
				return;
			}

			$this->user = $this->session->userdata("user");
			$this->db = $this->session->userdata("db");
			$this->sekolah = $this->session->userdata("sekolah");
			$this->sekolah = $this->sekolah->Data[0];

			$query = $this->ApiSession(["user_key" => $this->user->user_key, "db" => $this->db]);
			if($query->IsError == true) {
				$this->session->unset_userdata("user");
				$this->session->unset_userdata("user_login");
				$this->session->unset_userdata("db");

				$rHtml = $this->MakeAlert($query->ErrMessage);
				$this->session->set_userdata("notifikasi", $rHtml);
        		redirect("user/login");
			} else {
				if($this->uri->segment(1) != "profil_sekolah") {
					/*$rHtml = $this->MakeAlert("<strong>Peringatan!</strong> Mohon lengkapi Informasi dengan benar. Pastikan field dengan tanda (<span class='text-danger'>*</span>) telah terisi.");
					
					$n = 0; $info_list = $this->config->item("informasi_list");
					foreach ($info_list as $key => $value) {
						foreach ($value as $index => $text) {
							if(empty($this->sekolah->$text)) {
								$this->session->set_userdata("notifikasi", $rHtml);
								header("location: ".base_url("profil_sekolah.html?tab=".$key));
								return;
							} else {
								$n++;
							}
						}
					}

					$total_req = $this->config->item("informasi_list_total"); //Total informasi required
					if($n == $total_req) {*/
						if($this->sekolah->install_step == 1 and $this->uri->segment(1) != "kelas" and $this->uri->segment(1) != "manajemen_user" and $this->uri->segment(1) != "download") {
							redirect("kelas");
						}
						if($this->sekolah->install_step == 2 and $this->uri->segment(1) != "siswa" and $this->uri->segment(1) != "download") {
							redirect("siswa");
						}
					//}
				}
			}
			return;
		}

		public function HakAkses($no_urut, $redirect = true) {
			$this->user = $this->session->userdata("user");

			$explode = explode(",", $this->user->hak_akses);
			if(!in_array($no_urut, $explode)) {
				if(preg_match("!.!", $no_urut)) {
					$explode = preg_grep('/^'.$no_urut.'\.(\d{1})/i', $explode);
					if(empty($explode)) {
						if($redirect) redirect("not_found");
						return false;
					}
				} else {
					if($redirect) redirect("not_found");
					return false;
				}
			}
			return true;
		}

		public function ApiSession($param) {
			$this->api->set("pegawai/session", $param);
			return $this->api->exec();
		}

		public function CheckStrip($param) {
		    return !empty($param) ? $param : "-";
		}

		public function formatAngka($angka, $precision = 0) { //contoh format sebelum di convert 1000000 
	      if(is_numeric($angka)) {
	        return number_format($angka, $precision, ",", ".");
	      }
	      return $angka;
	    }
	    
		public function ParseGambar($url) {
			if(preg_match("!(http|https)!", $url)) {
				$url = str_replace("https", "http", $url);
				return $url;
			} else {
				$url = str_replace("2|", "", $url);
				return $this->config->item("cdn_url")."/sekolah/images/".$url;
			}
		}
	}
