<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profil extends CI_Model {

		private $user, $db;
			
		public function __construct() {
			parent::__construct();
			$this->load->model("login");
			$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
		}

		public function UploadImage($param) {
			$args['user_key'] = $this->user->user_key;
			$args['FolderName'] = "image-pegawai";
			$args['db'] = $this->db;

			if(!empty($param["Base64"])) {
				$args["FileBase64"] = $param["Base64"];
			}
			if(!empty($param["OldPath"])) {
            $args["OldPath"] = $param["OldPath"];
        	}

            $this->api->set("tools/upload/image", $args);
            return $this->api->exec("json");
        }

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
			else {
				$this->login->Relogin();
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
			else {
				$this->login->Relogin();
			}
			return json_encode($query);
        }
	}
