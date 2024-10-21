<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Model {
			
		public function __construct() {
			parent::__construct();
			$this->load->model("administrator/profil_sekolah");
		}
		
		//////////////// Login and Relogin //////////////////
		public function Login($param, $func) {
			if($func == "Login"){
	        	$args['username'] = $this->form['username'];
	        	$args['password'] = $this->form['password'];
	        	$args['db'] 	  = $this->form['id_sekolah'];
	        } else {
	        	$args['username'] = $param['username'];
	        	$args['password'] = $param['password'];
	        	$args['db'] 	  = $param['id_sekolah'];
	        }
	        
			$this->api->set("pegawai/login", $args);
			return $this->api->exec();
		}	

		public function LoginProcess($captcha, $param, $func) {
			if(empty($captcha)) {
				$IsError = true;
				$rHtml = $this->foglobal->MakeAlert("Mohon masukkan captcha dengan benar");
				goto returnData;
			} else if ($captcha == "tanpa_captcha") {
				$IsError = false;
			} else {
				$response = $this->recaptcha->verifyResponse($captcha);
				if($response["success"] === false) {
					$IsError = true;
					$rHtml = $this->foglobal->MakeAlert("Mohon masukkan captcha dengan benar");
					goto returnData;
				}
			}

			$UserData = $this->Login($param, $func);
			$IsError  = $UserData->IsError;

			if($UserData->IsError == false) {
				if(empty($UserData->Data)) {
					$IsError = true;
					$rHtml = $this->foglobal->MakeAlert("Alamat email/password tidak valid.");
					goto returnData;
				}

				if($UserData->Data->is_active == 0) {
					$IsError = true;
					$rHtml = $this->foglobal->MakeAlert("Akun tidak aktif. Silahkan hubungi Administrator untuk tindakan lebih lanjut.");
					goto returnData;
				}

				if(!empty($UserData->Data->tgl_expired) and $UserData->Data->tgl_expired < date("Y-m-d")) {
					$IsError = true;
					$rHtml = $this->foglobal->MakeAlert("Akun telah expired. Silahkan hubungi Administrator untuk tindakan lebih lanjut.");
					goto returnData;
				}
				
				$Data = $UserData->Data;

				$rHtml = "success";
				if(empty($this->session->set_userdata)) {
					$this->session->set_userdata(["user" => $Data, "user_login" => $param, "db" => $param["id_sekolah"]]);
					$dt_sklh["user_key"] = $Data->user_key; $dt_sklh["db"] = $param["id_sekolah"];
					$data_sekolah = $this->profil_sekolah->GetProfil2($dt_sklh);
					$this->session->set_userdata(["sekolah" => $data_sekolah]);
				}
				else {
					$this->session->sess_destroy();
					$this->session->set_userdata(["user" => $Data, "user_login" => $param, "db" => $param["id_sekolah"]]);
					$dt_sklh["user_key"] = $Data->user_key; $dt_sklh["db"] = $param["id_sekolah"];
					$data_sekolah = $this->profil_sekolah->GetProfil2($dt_sklh);
					$this->session->set_userdata(["sekolah" => $data_sekolah]);
				}

			} else {
				$rHtml = "error";
				$UserData->IsError = true;
				$rHtml = $this->foglobal->MakeAlert("Error: {$UserData->ErrMessage}.");
			}

			returnData:
			$ReturnData = ["IsError" => $IsError, "lsdt" => $rHtml];
			return json_encode($ReturnData);
		}

		public function ReLogin() {
			$captcha = "tanpa_captcha";
			$func = "ReLogin";
			if(empty($this->session->userdata("user_login"))) return true;
			else {
				$user_login = $this->session->userdata("user_login");
				$UserData = $this->LoginProcess($captcha, $user_login, $func);
				return false;
			}
		}

		//////////////// Forgot Password //////////////////
		public function Forgot($param) {
			$args = [];
			$args['reset_url'] = base_url("user/reset/".$param["id_sekolah"]);
			$args['db'] = $param["id_sekolah"];
			$args['email'] = $param["email"];

			$this->api->set("pegawai/reset/password", $args);
			return $this->api->exec();
		}

		public function ForgotProcess($captcha, $param) {
			if(empty($captcha)) {
				$IsError = true;
				$rHtml = $this->foglobal->MakeAlert("Mohon masukkan captcha dengan benar");
				goto returnData;
			} else {
				$response = $this->recaptcha->verifyResponse($captcha);
				if($response["success"] === false) {
					$IsError = true;
					$rHtml = $this->foglobal->MakeAlert("Mohon masukkan captcha dengan benar");
					goto returnData;
				}
			}
			if(empty($param["email"])) {
				$IsError = true;
				$rHtml = $this->foglobal->MakeAlert("Silahkan masukkan alamat email.");
				goto returnData;
			} 
			if(empty($param["id_sekolah"])) {
				$IsError = true;
				$rHtml = $this->foglobal->MakeAlert("Silahkan masukkan id sekolah.");
				goto returnData;
			} 

			$CheckUser = $this->Forgot($param);
			if($CheckUser->IsError == false) {
				$IsError = false;
				$rHtml = $this->foglobal->MakeAlert("Email telah terkirim. Silahkan periksa kotak masuk/spam dan klik link untuk aksi selanjutnya", "success");
			} else {
				$IsError = true;
				$rHtml = $this->foglobal->MakeAlert("<strong>Opps!</strong> Error : {$CheckUser->ErrMessage}.");
			}

			returnData:
			$Paging = (!empty($CheckUser->Paging)) ? $CheckUser->Paging : "";
			$ReturnData = ["IsError" => $IsError, "lsdt" => $rHtml, "paging" => $Paging];
			return json_encode($ReturnData);
		}

		//////////////// Reset Password //////////////////
		public function Reset($param) {
			$args['db']  = $param["id_sekolah"];
			$args['user_key']  = $param["user_key"];
	        $args['password1'] = $param["newpass1"];
        	$args['password2'] = $param["newpass2"];

           	$this->api->set("pegawai/edit/password", $args);
			return $this->api->exec();
		}

		public function ResetProcess($captcha, $param) {
			if(empty($captcha)) {
				$IsError = true;
				$rHtml = $this->foglobal->MakeAlert("Mohon masukkan captcha dengan benar");
				goto returnData;
			} else {
				$response = $this->recaptcha->verifyResponse($captcha);
				if($response["success"] === false) {
					$IsError = true;
					$rHtml = $this->foglobal->MakeAlert("Mohon masukkan captcha dengan benar");
					goto returnData;
				}
			}

			if(empty($param["id_sekolah"])) {
				$IsError = true;
	            $rHtml = $this->foglobal->MakeAlert("ID Sekolah tidak valid. Silahkan hubungi administrator.");
	            goto returnData;
	        }
	        if(empty($param["user_key"])) {
				$IsError = true;
	            $rHtml = $this->foglobal->MakeAlert("User Key tidak valid. Silahkan hubungi administrator.");
	            goto returnData;
	        }

	        if(empty($param["newpass1"]) or empty($param["newpass2"])) {
				$IsError = true;
	            $rHtml = $this->foglobal->MakeAlert("Mohon masukkan password dengan benar");
	            goto returnData;
	        } 
	        if($param["newpass1"] != $param["newpass2"]) {
	        	$IsError = true;
	            $rHtml = $this->foglobal->MakeAlert("Password baru tidak sama. Mohon periksa kembali");
	            goto returnData;
	        }

        	$CheckUser = $this->Reset($param);
        	if($CheckUser->IsError == false) {
        		$IsError = false;
        		$rHtml = $this->foglobal->MakeAlert("Password sudah diganti. Sekarang Anda dapat masuk ke sistem", "success");
        	} else {
        		$IsError = true;
        		$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $CheckUser->ErrMessage, $matches);
        		if($dataError) {
        			switch ($matches[1][0]) {
        				case 'password1':
        					$rHtml = $this->foglobal->MakeAlert("Password Pengguna tidak valid.");
        					break;
        				case 'password2':
        					$rHtml = $this->foglobal->MakeAlert("Password Pengguna tidak valid.");
        								break;
        				case 'user_key':
        					$rHtml = $this->foglobal->MakeAlert("User Key tidak valid.");
        					break;
        			}
        		}
        		$rHtml = $this->foglobal->MakeAlert("<strong>Opps!</strong> Error : {$CheckUser->ErrMessage}.");
        	}		     
	        

	        returnData:
			$Paging = (!empty($CheckUser->Paging)) ? $CheckUser->Paging : "";
			$ReturnData = ["IsError" => $IsError, "lsdt" => $rHtml, "paging" => $Paging];
			return json_encode($ReturnData);
		}

		//////////// Update Data and Password //////////////
		public function UpdatePengguna($id_update, $param) {
        	$param['user_key'] = $this->user->user_key;
        	$param['id_users'] = $id_update;
        	$param['db'] = $this->db;

           	$this->api->set("pegawai/edit", $param);
			$query = $this->api->exec();
			if($query->IsError == true) {
				$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
				if($dataError) {
					switch ($matches[1][0]) {
						case 'db':
							return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
							break;
						case 'id_users':
							return $this->foglobal->MakeJsonError("ID Pengguna tidak valid.");
							break;
						case 'user_key':
							return $this->foglobal->MakeJsonError("User Key tidak valid.");
							break;
					}
				}
			}
			return json_encode($query);
        }

        public function UpdatePasswordPengguna($id_update, $param) {
        	$param['user_key'] = $this->user->user_key;
        	$param['db'] = $this->db;
        	$param['id_users'] = $id_update['id'];
        	$param['password1'] = $id_update['password1'];
        	$param['password2'] = $id_update['password2'];

           	$this->api->set("pegawai/edit/password", $param);
			$query = $this->api->exec();
			if($query->IsError == true) {
				$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
				if($dataError) {
					switch ($matches[1][0]) {
						case 'db':
							return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
							break;
						case 'id_users':
							return $this->foglobal->MakeJsonError("ID Pengguna tidak valid.");
							break;
						case 'password1':
							return $this->foglobal->MakeJsonError("Password Pengguna tidak valid.");
							break;
						case 'password2':
							return $this->foglobal->MakeJsonError("Password Pengguna tidak valid.");
							break;
						case 'user_key':
							return $this->foglobal->MakeJsonError("User Key tidak valid.");
							break;
					}
				}
			}
			return json_encode($query);
        }
	}
