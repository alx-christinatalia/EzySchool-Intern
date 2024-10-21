<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Aktivitas_user extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetAktivitasUser($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["aktivitas"])) {
				$args["aktivitas"] = $param["filter"]["aktivitas"];
			}
			if(!empty($param["filter"]["tgl"])) {
				$args["tgl_insert"] = date_indo("Y-m-d", $param["filter"]["tgl"]);
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("userlog/list", $args);
			return $this->api->exec();
		}

		public function HtmlAktivitasUser($param) {
			$rHtml ="";
			$query = $this->GetAktivitasUser($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$rHtml .= '<tr>
                                        <td>'.$item->pegawai_nama.'</td>
                                        <td>'.$item->message.'</td>
                                        <td>'.$item->aktifitas.'</td>
                                        <td>'.date_indo("d M Y H:i", strtotime($item->tgl_insert)).'</td>
                                    </tr>';
					}
				} else {
					$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning'>Tidak ada data</span></td></tr>";
				}
			} else {
				$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning'>".$query->ErrMessage."</span></td></tr>";
			}
			$Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}
	}
