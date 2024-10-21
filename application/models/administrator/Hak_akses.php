<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Hak_akses extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetHakAkses($param, $disable_page=false) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["id"])) {
				$args["id_hakakses"] = $param["filter"]["id"];
			}
			if(isset($param["filter"]["status"])) {
				$args["is_active"] = $param["filter"]["status"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("hak_akses/list", $args, $disable_page);
			return $this->api->exec();
		}

		public function HtmlHakAkses($param) {
			$rHtml ="";

			$query = $this->GetHakAkses($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						if ($item->is_active == 1) {
							$status = "<span class='label label-success'>Aktif</span>";
						} else {
							$status = "<span class='label label-danger'>Tidak Aktif</span>";
						} 
						$rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                	<li><a href="'.base_url("manajemen_hak_akses/edit.html?id=".$item->id).'"><i class="fa fa-pencil"></i> Edit Hak Akses</a></li>
                                                	<li><a role="button" class="status-data" data-idupdate="'.$item->id.'"><i class="fa fa-check-square-o"></i> Edit Status</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>'.$item->id.'</td>
                                        <td><a href="'.base_url("manajemen_hak_akses/edit.html?id=".$item->id).'" class="detail-data">'.$item->nama.'</a></td>
                                        <td>'.$item->catatan.'</td>
                                        <td>'.date_indo("d M Y H:i", strtotime($item->tgl_last_update)).'</td>
                                        <td class="text-center"><a href="#" class="status-data" data-idupdate="'.$item->id.'">'.$status.'</a></td>
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

		public function HtmlDropdownHakAkses($param) {
			$rHtml ="";

			$query = $this->GetHakAkses($param, true);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						 $rHtml .= '<option value="'.$item->id.'">'.$item->nama.'</td>';
					}
				} else {
					$rHtml = '<option value="">Tidak Ada Data</td>';
				}
			} else {
				$rHtml = '<option value="">'.$query->ErrMessage.'</td>';
			}

			$Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}

		public function InsertDataHakAkses($param) {
			$param["db"] = $this->db;
			$param["user_key"] = $this->user->user_key;

			$this->api->set("hak_akses/add", $param);
			$query = $this->api->exec();
			if($query->IsError == true) {
        		$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
        		if($dataError) {
          			switch ($matches[1][0]) {
            			case 'hak_akses':
	              			return $this->foglobal->MakeJsonError("Hak Akses wajib di isi");
	              		break;
          			}
        		}
      		}
      		return json_encode($query);
		}

		public function UpdateDataHakAkses($id_update, $param) {
			$param["db"] = $this->db;
			$param["user_key"] = $this->user->user_key;
			$param["id_hakakses"] = $id_update;

			$this->api->set("hak_akses/edit", $param);
			return $this->api->exec("json");
		}
	}
