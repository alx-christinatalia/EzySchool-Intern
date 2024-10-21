<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Notifikasi extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetNotifikasi($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["id_notifikasi"])) {
				$args["id_notifikasi"] = $param["filter"]["id_notifikasi"];
			} 
			if(!empty($param["filter"]["tgl_insert"])) {
				$args["tgl_insert"] = date_indo("Y-m-d", $param["filter"]["tgl_insert"]);
			} 
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["status"] = $param["filter"]["status"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("notifikasi/list", $args);
			return $this->api->exec();
		}

		public function HtmlNotifikasi($param) {
			$rHtml ="";

			$query = $this->GetNotifikasi($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						if ($item->status == 0) {
							$status = "<span class='label label-warning'>Proses</span>";
						} else if ($item->status == 1) {
							$status = "<span class='label label-success'>Sukses</span>";
						} else if ($item->status == 2) {
							$status = "<span class='label label-danger'>Gagal</span>";
						} 
						$rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                	<li><a role="button" class="detail-data" data-idupdate="'.$item->id.'"><i class="fa fa-external-link"></i> Lihat Detail</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a class="detail-data" data-idupdate="'.$item->id.'">'.$this->foglobal->CheckStrip($item->nis).'</a></td>
                                        <td>'.$item->subyek.'</td>
                                        <td>'.date_indo("d M Y H:i", strtotime($item->tgl_insert)).'</td>
                                        <td>'.date_indo("d M Y H:i", strtotime($item->tgl_eksekusi)).'</td>
                                        <td class="text-center">'.$status.'</td>
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
