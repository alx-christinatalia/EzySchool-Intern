<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Keuangan extends CI_Model {
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetChartList($param) {
			if((empty($param["bulan"]) or empty($param["tahun"])) and (empty($param["tahun"]) or empty($param["nis"]))) {
				return $this->foglobal->MakeJsonError("Tahun-Bulan atau Tahun-Nis tidak valid");
			}
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

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("chart/list", $args);
			return $this->api->exec("json");
		}

		public function GetListTotal($param) {
			if((empty($param["bulan"]) or empty($param["tahun"])) and (empty($param["tahun"]) or empty($param["nis"]))) {
				return $this->foglobal->MakeJsonError("Tahun-Bulan atau Tahun-Nis tidak valid");
			}
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

			$this->api->set("chart/list/total", $args);
			return $this->api->exec("json");
		}

		public function GetListTotalEzyPay($param) {
			$args = [
				"user_key" => $this->user->user_key,
				"db" => $this->db
			];

			$this->api->set("chart/list/totalezypay", $args);
			return $this->api->exec("json");
		}
	}
