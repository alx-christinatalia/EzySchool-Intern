<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cara_bayar_step extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetMdpembayaranstep($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];
			
			if(!empty($param["filter"]["id_metode"])) {
				$args["id_metode"] = $param["filter"]["id_metode"];
			}
			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["is_active"] = $param["filter"]["status"];
			} else {
				$args["is_active"] = 1;
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("master-data/pembayaran/step", $args);
			return $this->api->exec();
		}

		public function HtmlMdpembayaranstep($param) {
			$rHtml ="";

			$query = $this->GetMdpembayaranstep($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>"; 
						 $rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                    <li><a role="button" class="edit-data" data-idupdate="'.$item->id.'"><i class="fa fa-pencil"></i> Edit Data</a></li>
                                                    <li><a role="button" class="status-data" data-idupdate="'.$item->id.'" data-status="'.$item->is_active.'"><i class="fa fa-check-square-o"></i> Edit Status</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="text-center">'.$item->urutan.'</td>
                                        <td>'.$item->ket.'</td>
                                        <td>'.date("d M Y H:i", strtotime($item->tgl_last_update)).'</td>
                                        <td class="text-center">'.$is_active.'</td>
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

		public function InsertSekolah($param) {
            $this->api->set("sekolah/add", $param);
			return $this->api->exec();
        }

        public function UpdateSekolah($id_update, $param) {
           	$this->api->set("sekolah/edit", $param);
			return $this->api->exec();
        }
	}
