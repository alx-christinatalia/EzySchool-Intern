<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pengumuman_kategori extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetKategoriPengumuman($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];
			
			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["id_kategori"])) {
				$args["id_kategori"] = $param["filter"]["id_kategori"];
			}
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["is_active"] = $param["filter"]["status"];
			} 

			$args["jns_kat"] = 2;

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("master-data/kategori/list", $args);
			return $this->api->exec();
		}

		public function HtmlKategoriPengumuman($param) {
			$rHtml ="";

			$query = $this->GetKategoriPengumuman($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>"; 
						 $rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                    <li><a role="button" class="edit-data" data-idupdate="'.$item->id.'"><i class="fa fa-pencil"></i> Edit Kategori</a></li>
                                                    <li><a role="button" class="status-data" data-idupdate="'.$item->id.'" data-status="'.$item->is_active.'"><i class="fa fa-check-square-o"></i> Edit Status</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a class="edit-data" data-idupdate="'.$item->id.'">'.$item->nama.'</a></td>
                                        <td>'.date_indo("d M Y", strtotime($item->tgl_last_update)).'</td>
                                        <td class="text-center"><a class="status-data" data-idupdate="'.$item->id.'" data-status="'.$item->is_active.'">'.$is_active.'</a></td>
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

		public function UploadKategoriPengumuman($param) {
			$args['user_key'] = $this->user->user_key;
			$args["db"] = $this->db;
			$args['FolderName'] = "excel/import-mdkategori";

			if(!empty($param["Base64"])) {
				$args["FileBase64"] = $param["Base64"];
			}
			if(!empty($param["Ext"])) {
				$args["FileExtension"] = $param["Ext"];
			}
			
            $this->api->set("tools/upload/file", $args);
            return $this->api->exec("json");
        }
        
		public function InsertKategoriPengumuman($args) {
			$args['user_key'] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args['jns_kat'] = 2;

		    $this->api->set("master-data/kategori/add", $args);
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
		          	}
		        }
		    }
		     return json_encode($query);
        }

        public function InsertKategoriPengumumanRepeat($args) {
        	$args['user_key'] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args['jns_kat'] = 2;

		    $this->api->set("master-data/kategori/add", $args);
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
		          	}
		        }
		    }
		     return json_encode($query);
        }

        public function UpdateKategoriPengumuman($id_update, $param) {
          	$param['user_key'] = $this->user->user_key;
        	$param["db"] = $this->db;
          	$param['id_kategori'] = $id_update;

            $this->api->set("master-data/kategori/edit", $param);
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
          			}
        		}
      		}
      	return json_encode($query);
        }
	}
