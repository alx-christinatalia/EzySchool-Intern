<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Semester extends CI_Model {

		private $user, $db;
			
		public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetSemester($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["filter"]["id"])) {
				$args["id_semester"] = $param["filter"]["id"];
			}
			// if(!empty($param["filter"]["tahun"])) {
			// 	$args["tahun"] = $param["filter"]["tahun"];
			// }
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["is_active"] = $param["filter"]["status"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

			$this->api->set("master-data/semester/list", $args);
			return $this->api->exec();
		}

		public function HtmlSemester($param) {
			$rHtml ="";

			$query = $this->GetSemester($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					$bulan = "";
					foreach ($query->Data as $item) {
						$is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>";
						$rHtml .= '<tr>
						 				<td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                	<li><a role="button" class="edit-data" data-idupdate="'.$item->id.'"><i class="fa fa-pencil"></i> Edit Semester</a></li>
                                                	<li><a role="button" class="status-data" data-idupdate="'.$item->id.'" data-status="'.$item->is_active.'"><i class="fa fa-check-square-o"></i> Edit Status</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a class="edit-data" data-idupdate="'.$item->id.'">'.$item->nama.'</a></td>
                                        <td>'.date("d M Y", strtotime($item->dari)).'</td>
                                        <td>'.date("d M Y", strtotime($item->sampai)).'</td>
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

		public function InsertSemester($args) {
			$args['user_key'] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["dari"] = date("Y-m-d", strtotime($args["dari"]));
        	$args["sampai"] = date("Y-m-d", strtotime($args["sampai"]));

		    $this->api->set("master-data/semester/add", $args);
		    $query = $this->api->exec();

		    if($query->IsError == true) {
		        $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
		        if($dataError) {
		          	switch ($matches[1][0]) {
		            case 'user_key':
		              	return $this->foglobal->MakeJsonError("User Key tidak valid.");
		              	break;
		            case 'db':
		              	return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
		              	break;
		            case 'nama':
		              	return $this->foglobal->MakeJsonError("Nama tidak valid.");
		              	break;
		            case 'dari':
		              	return $this->foglobal->MakeJsonError("Tanggal Mulai tidak valid.");
		              	break;
		            case 'sampai':
		              	return $this->foglobal->MakeJsonError("Tanggal Berakhir tidak valid.");
		              	break;
		          	}
		        }
		    }
		     return json_encode($query);
        }

        public function UpdateSemester($id_update, $args) {
        	$args['user_key'] = $this->user->user_key;
        	$args['id_semester'] = $id_update;
        	$args["db"] = $this->db;
        	$args["dari"] = date("Y-m-d", strtotime($args["dari"]));
        	$args["sampai"] = date("Y-m-d", strtotime($args["sampai"]));

		    $this->api->set("master-data/semester/edit", $args);
		    $query = $this->api->exec();

		    if($query->IsError == true) {
		        $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
		        if($dataError) {
		          	switch ($matches[1][0]) {
		            case 'user_key':
		              	return $this->foglobal->MakeJsonError("User Key tidak valid.");
		              	break;
		            case 'db':
		              	return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
		              	break;
		            case 'nama':
		              	return $this->foglobal->MakeJsonError("Nama tidak valid.");
		              	break;
		            case 'dari':
		              	return $this->foglobal->MakeJsonError("Tanggal Mulai tidak valid.");
		              	break;
		            case 'sampai':
		              	return $this->foglobal->MakeJsonError("Tanggal Berakhir tidak valid.");
		              	break;
		          	}
		        }
		    }
		     return json_encode($query);
        }
	}
