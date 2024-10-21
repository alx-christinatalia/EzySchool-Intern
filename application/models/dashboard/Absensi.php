<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Absensi extends CI_Model {
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetListAbsensi($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["bulan"])) {
				$args["bulan"] = $param["bulan"];
			}
			if(!empty($param["tahun"])) {
				$args["tahun"] = $param["tahun"];
			}
			if(!empty($param["nis"])) {
				$args["nis"] = $param["nis"];
			}

			$this->api->set("absensi/rekap/list", $args);
			return $this->api->exec("json");
		}

		public function GetDetailAbsensi($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["tgl"])) {
				$args["tgl"] = $param["tgl"];
			}
			if(!empty($param["nis"])) {
				$args["nis"] = $param["nis"];
			}

			$this->api->set("absensi/detail/tgl", $args);
			return $this->api->exec("json");
		}
	}
