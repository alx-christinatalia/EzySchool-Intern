<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Mesin_server extends CI_Model {

		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetMesin($param) {
			$args = [
				"user_key" => $this->user->user_key,
				"db" => $this->db,
				"id_sekolah" => $this->db
			];

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			// if(!empty($param["filter"]["sekolah"])) {
			// 	$args["id_sekolah"] = $param["filter"]["sekolah"];
			// }
			if(!empty($param["filter"]["id"])) {
				$args["id_mesin"] = $param["filter"]["id"];
			}
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["is_active"] = $param["filter"]["status"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("master-data/mesin/server/list", $args);
			return $this->api->exec();
		}

		public function HtmlMesin($param) {
			$rHtml ="";

			$query = $this->GetMesin($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>"; 
						 $rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                    <li><a role="button" class="edit-data" data-idupdate="'.$item->id.'"><i class="fa fa-pencil"></i> Edit Mesin</a></li>
                                                    <li><a role="button" class="status-data" data-idupdate="'.$item->id.'" data-status="'.$item->is_active.'"><i class="fa fa-check-square-o"></i> Edit Status</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>'.$item->nama.'</td>
                                        <td>'.$item->jenjang.'</td>
                                        <td>'.$item->email.'</td>
                                        <td><a role="button" class="edit-data" data-idupdate="'.$item->id.'">'.$item->uid_mesin_server.'</td>
                                        <td>'.date("d M Y H:i", strtotime($item->tgl_registrasi)).'</td>
                                        <td>'.date("d M Y H:i", strtotime($item->tgl_last_update)).'</td>
                                        <td class="text-center"><a role="button" class="status-data" data-idupdate="'.$item->id.'" data-status="'.$item->is_active.'">'.$is_active.'</td>
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

		public function HtmlDropdownServer($param) {
			$rHtml ="";

			$query = $this->GetMesin($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						 $rHtml .= '<option value="' . $item->id . '">' . $item->uid_mesin_server . '</option>';
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

		public function InsertMesin($data, $param) {
            $param['user_key'] = $this->user->user_key;
        	$param['id_sekolah'] = $this->db;
        	$param['db'] = $this->db;
        	$param['uid_mesin_server'] = $data['uid_mesin_server'];
        	$param['catatan'] = $data['catatan'];

           	$this->api->set("master-data/mesin/server/add", $param);
			$query = $this->api->exec();
			if($query->IsError == true) {
				$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
				if($dataError) {
					switch ($matches[1][0]) {
						case 'id_sekolah':
							return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
							break;
						case 'id_mesin_server':
							return $this->foglobal->MakeJsonError("Server tidak valid.");
							break;
						case 'id_mesin_finger':
							return $this->foglobal->MakeJsonError("Unique ID tidak valid.");
							break;
						case 'user_key':
							return $this->foglobal->MakeJsonError("User Key tidak valid.");
							break;
					}
				}
			}
			return json_encode($query);
        }

        public function UpdateMesin($id_update, $param) {
        	$param['user_key'] = $this->user->user_key;
        	$param['id_sekolah'] = $this->db;
        	$param['db'] = $this->db;
        	$param['id_mesin'] = $id_update;

           	$this->api->set("master-data/mesin/server/edit", $param);
			$query = $this->api->exec();
			if($query->IsError == true) {
				$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
				if($dataError) {
					switch ($matches[1][0]) {
						case 'id_sekolah':
							return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
							break;
						case 'id_mesin_server':
							return $this->foglobal->MakeJsonError("Server tidak valid.");
							break;
						case 'id_mesin_finger':
							return $this->foglobal->MakeJsonError("Unique ID tidak valid.");
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
