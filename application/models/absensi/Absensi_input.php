<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Absensi_input extends CI_Model {

		private $user, $db;
			
		public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetAbsensiKelas($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}			
			if(!empty($param["filter"]["id"])) {
				$args["id"] = $param["filter"]["id"];
			}
			if(!empty($param["filter"]["tgl_jurnal"])) {
				$args["tgl_jurnal"] = date_indo("Y-m-d", $param["filter"]["tgl_jurnal"]);
			}
			if(!empty($param["filter"]["id_kelas"])) {
				$args["id_kelas"] = $param["filter"]["id_kelas"];
			} else {
				return json_decode($this->foglobal->MakeJsonError("Silahkan Pilih Kelas Terlebih Dahulu"));
			}
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["status"] = $param["filter"]["status"];
			} 

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

			$this->api->set("absensi/siswa/list", $args);
			return $this->api->exec();
		}

		public function GetAbsensiKelasNoLimit($param, $disable_page=true) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}	
			if(!empty($param["filter"]["id"])) {
				$args["id"] = $param["filter"]["id"];
			}
			if(!empty($param["filter"]["tgl_jurnal"])) {
				$args["tgl_jurnal"] = date_indo("Y-m-d", $param["filter"]["tgl_jurnal"]);
			}
			if(!empty($param["filter"]["id_kelas"])) {
				$args["id_kelas"] = $param["filter"]["id_kelas"];
			} else {
				return json_decode($this->foglobal->MakeJsonError("Silahkan Pilih Kelas Terlebih Dahulu"));
			}
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["status"] = $param["filter"]["status"];
			} 

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

			$this->api->set("absensi/siswa/list", $args, $disable_page);
			return $this->api->exec();
		}

		public function HtmlAbsensiKelas($param) {
			$rHtml ="";

			$query = $this->GetAbsensiKelas($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					$ind = 1;
					foreach ($query->Data as $item) {
						$h = ""; $s = ""; $i = ""; $a = ""; $abs = "";
						if ($item->absensi == 1) {
							$h = 'checked';
							$abs = 1;
						}
						else if ($item->absensi == 2) {
							$s = 'checked';
							$abs = 2;
						}
						else if ($item->absensi == 3) {
							$i = 'checked';
							$abs = 3;
						}
						else if ($item->absensi == 4) {
							$a = 'checked';
							$abs = 4;
						}
						$rHtml .= '<tr class="item-index-data-'.$ind.'">
						 				<td class="text-center">'.$ind.'</td>
						 				<td>'.$item->nama.'</td>
                                        <td>
                                        	<label class="mt-radio">
                                        		<input type="radio" name="data[items]['.$ind.'][sia]" value="1" '.$h.' class="sia_h'.$ind.'">H
                                        		<span></span>
                                        	</label>
                                        	&nbsp;
                                        	<label class="mt-radio">
                                        		<input type="radio" name="data[items]['.$ind.'][sia]" value="2" '.$s.'>S
                                        		<span></span>
                                        	</label>
                                        	&nbsp;
                                        	<label class="mt-radio">
                                        		<input type="radio" name="data[items]['.$ind.'][sia]" value="3" '.$i.'>I
                                        		<span></span>
                                        	</label>
                                        	&nbsp;
                                        	<label class="mt-radio">
                                        		<input type="radio" name="data[items]['.$ind.'][sia]" value="4" '.$a.'>A
                                        		<span></span>
                                        	</label>
                                        	<input type="hidden" name="data[items]['.$ind.'][abs]" value="'.$abs.'" class="abs'.$ind.'">
                                        	<input type="hidden" name="data[items]['.$ind.'][nama]" value="'.$item->nama.'" class="nama'.$ind.'">
                                        </td>
						 				<td class="nis hidden"><input type="hidden" name="data[items]['.$ind.'][nis]" value="'.$item->nis.'">'.$item->nis.'</td>
						 				<td class="nisn hidden">'.$item->nisn.'</td>
						 				<td class="alamat hidden">'.$item->alamat.'</td>
                                    </tr>';
                        $ind++;
					}
				} else {
					$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning'>Tidak ada data</span></td></tr>";
				}
			} else {
				$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning'>".$query->ErrMessage."</span></td></tr>";
			}

			// $Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => ""];
            return json_encode($ReturnData);
		}

        public function GetDatasiswaNoLimit($param) {
			$rHtml ="";

			$query = $this->GetAbsensiKelasNoLimit($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					$ind = 1;
					foreach ($query->Data as $item) {
						$h = ""; $s = ""; $i = ""; $a = ""; $abs = "";
						if ($item->absensi == 1) {
							$h = 'checked';
							$abs = 1;
						}
						else if ($item->absensi == 2) {
							$s = 'checked';
							$abs = 2;
						}
						else if ($item->absensi == 3) {
							$i = 'checked';
							$abs = 3;
						}
						else if ($item->absensi == 4) {
							$a = 'checked';
							$abs = 4;
						}
						$rHtml .= '<tr class="mt-repeater-item item-index-data-'.$ind.'" id="data-'.$ind.'">
						 				<td class="text-center">'.$ind.'.</td>
						 				<td><a href="'.base_url("siswa/detail.html?nis=".$item->nis).'" target="_blank">'.$item->nama.'</a></td>
                                        <td>
                                        	<label class="mt-radio">
                                        		<input type="radio" name="data[items]['.$ind.'][sia]" value="1" '.$h.' class="sia_h'.$ind.' check_absen">H
                                        		<span></span>
                                        	</label>
                                        	&nbsp;
                                        	<label class="mt-radio">
                                        		<input type="radio" name="data[items]['.$ind.'][sia]" value="2" '.$s.' class="check_absen">S
                                        		<span></span>
                                        	</label>
                                        	&nbsp;
                                        	<label class="mt-radio">
                                        		<input type="radio" name="data[items]['.$ind.'][sia]" value="3" '.$i.' class="check_absen">I
                                        		<span></span>
                                        	</label>
                                        	&nbsp;
                                        	<label class="mt-radio">
                                        		<input type="radio" name="data[items]['.$ind.'][sia]" value="4" '.$a.' class="check_absen">A
                                        		<span></span>
                                        	</label>
                                        	<input type="hidden" name="data[items]['.$ind.'][abs]" value="'.$abs.'" class="abs'.$ind.'">
                                        	<input type="hidden" name="data[items]['.$ind.'][nama]" value="'.$item->nama.'" class="nama'.$ind.'">
                                        </td>
                                        <td><input type="text" class="form-control formketerangan'.$ind.'" name="data[items]['.$ind.'][uraian]" placeholder="Keterangan" value="'.$item->uraian.'">
                                        	<input type="hidden" class="keterangan'.$ind.'" value="'.$item->uraian.'">
                                        </td>
						 				<td class="nis hidden"><input type="hidden" name="data[items]['.$ind.'][nis]" value="'.$item->nis.'">'.$item->nis.'</td>
						 				<td class="nisn hidden">'.$item->nisn.'</td>
						 				<td class="alamat hidden">'.$item->alamat.'</td>
                                    </tr><script>$(".hiddensave1, .hiddensave2").removeClass("hidden");</script>';
                        $ind++;
					}
				} else {
					$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning'>Tidak ada data</span></td></tr><script>$('.hiddensave1, .hiddensave2').addClass('hidden');</script>";
				}
			} else {
				$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning'>".$query->ErrMessage."</span></td></tr><script>$('.hiddensave1, .hiddensave2').addClass('hidden');</script>";
			}

			// $Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => ""];
            return json_encode($ReturnData);
		}

		public function InsertDataAbsen($param) {
			$args = [];
        	$args["user_key"] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["repeater"] = $param;

		    $this->api->set("absensi/repeater/add", $args);
		    $query = $this->api->exec();

		    return json_encode($query);
        }

        public function UpdateDataAbsen($param) {
        	$args = [];
        	$args["user_key"] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["repeater"] = $param;

		    $this->api->set("absensi/repeater/edit", $args);
		    $query = $this->api->exec();

		    return json_encode($query);
        }
	}
