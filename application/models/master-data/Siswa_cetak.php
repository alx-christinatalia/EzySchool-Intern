<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Siswa_cetak extends CI_Model {

		private $user, $db;
			      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetDatasiswa($param) {
			$args["user_key"] = $this->user->user_key;
			$args["db"] = $this->db;

			if(!empty($param["nis"])) {
				$args["nis"] = $param["nis"]; 
			}
			if(!empty($param["id_kelas"])) {
				$args["id_kelas"] = $param["id_kelas"]; 
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("siswa/list", $args, true);
			return $this->api->exec("array");
		}
	}
