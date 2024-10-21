<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Nilai extends CI_Model {

		private $user, $db;
			
		public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetNilai($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["id"])) {
				$args["id_nilai"] = $param["filter"]["id"];
			}
			if(!empty($param["filter"]["id_kelas"])) {
				$args["id_kelas"] = $param["filter"]["id_kelas"];
			} 
			if(!empty($param["filter"]["jns_kat"])) {
				$args["id_kategori"] = $param["filter"]["jns_kat"];
			} 
			if(isset($param["filter"]["is_published"]) and $param["filter"]["is_published"] != "") {
				$args["is_published"] = $param["filter"]["is_published"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
			else $args["Sort"] = "tgl_last_update desc";

            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

			$this->api->set("nilai/list", $args);
			return $this->api->exec();
		}

		public function HtmlNilai($param) {
			$rHtml ="";

			$query = $this->GetNilai($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$is_published = ($item->is_published) ? "<i class='fa fa-check'></i>": "<i class='fa fa-times'></i>";
						$rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                	<li><a role="button" class="detail-data" data-idupdate="'.$item->id.'"><i class="fa fa-external-link"></i> Lihat Detail</a></li>
                                                   	<li role="separator" class="divider"></li>
                                                    <li><a role="button" class="edit-data" data-idupdate="'.$item->id.'"><i class="fa fa-pencil"></i> Edit Nilai</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a class="detail-data" data-idupdate="'.$item->id.'">'.$item->nis.'</a></td>
						 				<td><a class="edit-data" data-idupdate="'.$item->id.'">'.$item->siswa_nama.'</a></td>
						 				<td>'.$item->kategori_nama.'</td>
						 				<td>'.$this->foglobal->CheckStrip($item->keterangan).'</td>
						 				<td>'.date_indo("d M Y H:i", strtotime($item->tgl_publish)).'</td>
						 				<td>'.date_indo("d M Y H:i", strtotime($item->tgl_last_update)).'</td>
						 				<td class="text-center">'.$is_published.'</td>
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

		public function InsertNilai($args) {
			$args['user_key'] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["tgl_ujian"] = date_indo("Y-m-d", strtotime($args["tgl_ujian"]));
        	$args["tgl_publish"] = date_indo("Y-m-d H:i:s", strtotime($args["tgl_publish"]));

		    $this->api->set("nilai/add", $args);
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
		            case 'id_kelas':
		              	return $this->foglobal->MakeJsonError("Kelas tidak valid.");
		              	break;
		            case 'nis':
		              	return $this->foglobal->MakeJsonError("NIS tidak valid.");
		              	break;
		            case 'id_kategori':
		              	return $this->foglobal->MakeJsonError("Kategori tidak valid.");
		              	break;
		            case 'keterangan':
		              	return $this->foglobal->MakeJsonError("Nilai tidak valid.");
		              	break;
		          	}
		        }
		    }
		    return json_encode($query);
        }

        public function InsertNilaiRepeat($params) {
        	$args['user_key'] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["repeater"] = $params;

		    $this->api->set("nilai/add", $args);
		    $query = $this->api->exec();
		    
		    return json_encode($query);
        }

        public function UpdateNilai($id_update, $args) {
        	$args['user_key'] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args['id_nilai'] = $id_update;
        	$args["tgl_ujian"] = date_indo("Y-m-d", strtotime($args["tgl_ujian"]));
        	$args["tgl_publish"] = date_indo("Y-m-d H:i:s", strtotime($args["tgl_publish"]));

		    $this->api->set("nilai/edit", $args);
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
		            case 'nis':
		              	return $this->foglobal->MakeJsonError("Siswa tidak valid.");
		              	break;
		            case 'id_kategori':
		              	return $this->foglobal->MakeJsonError("Kategori tidak valid.");
		              	break;
		            case 'keterangan':
		              	return $this->foglobal->MakeJsonError("Keterangan tidak valid.");
		              	break;
		            case 'is_published':
		              	return $this->foglobal->MakeJsonError("Status tidak valid.");
		              	break;
		          	}
		        }
		    }
		    return json_encode($query);
        }
	}
