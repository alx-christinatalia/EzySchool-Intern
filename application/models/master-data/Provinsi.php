<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Provinsi extends CI_Model {

		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }
		
		public function GetProvinsi($param, $disable_page=false) {
			$args = [
				"user_key" => $this->user->user_key,
				"db" => $this->db
			];

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["id_prov"])) {
				$args["id_prov"] = $param["filter"]["id_prov"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("master-data/provinsi/list", $args, $disable_page);
			return $this->api->exec();
		}

		public function HtmlDropdownProvinsi($param) {
			$rHtml ="";
			$query = $this->GetProvinsi($param, true);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						 $rHtml .= '<option value="' . $item->id_prov . '">' . $item->nama . '</option>';
					}
				} else {
					$rHtml = '<option>Tidak ada data</option>';
				}
			} else {
				$rHtml = '<option>' . $query->ErrMessage . '</option>';
			}

			$Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}
	}
