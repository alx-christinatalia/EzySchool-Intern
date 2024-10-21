<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kategori extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetKategori($param, $disable_page=false) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];
			
			if(!empty($param["filter"]["jns_kat"])) {
				$args["jns_kat"] = $param["filter"]["jns_kat"];
			}
			if(!empty($param["filter"]["id_kategori"])) {
				$args["id_kategori"] = $param["filter"]["id_kategori"];
			}
			if(!empty($param["filter"]["is_active"])) {
				$args["is_active"] = $param["filter"]["is_active"];
			}
			else{
				$args["is_active"] = 1;
			}

			$this->api->set("master-data/kategori/list", $args, $disable_page);
			return $this->api->exec();
		}

		public function HtmlMdkategori($param) {
			$rHtml ="";

			$query = $this->GetMdkategori($param);
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
                                        <td class="text-center">'.$item->id.'</td>
                                        <td>'.$item->nama.'</td>
                                        <td>'.$item->jns_kat.'</td>
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

		public function HtmlDropdownKategori($param) {
			$rHtml ="";

			$query = $this->GetKategori($param, true);
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

		public function UploadMdkategori($param) {
            $args = [
            			"user_key" => $this->user->user_key,
            			"FolderName" => "excel/import-mdkategori",
            			"db" => $this->db
            		];
			if(!empty($param["Base64"])) {
				$args["FileBase64"] = $param["Base64"];
			}
			if(!empty($param["Ext"])) {
				$args["FileExtension"] = $param["Ext"];
			}
            $this->api->set("tools/upload/file", $args);
            return $this->api->exec("json");
        }
        
		public function InsertMdkategori($data, $args) {
        	$args = [
        				"user_key" => $this->user->user_key,
        				"db" => $this->db,
        				"nama" => $data["nama"],
        				"jns_kat" => $data["jns_kat"]
        			];
		    $this->api->set("master-data/kategori/add", $args);
		    $query = $this->api->exec();

		    if($query->IsError == true) {
		        $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
		        if($dataError) {
		          	switch ($matches[1][0]) {
		            case 'user_key':
		              	return $this->foglobal->MakeJsonError("User tidak valid.");
		              	break;
		            case 'nama':
		              	return $this->foglobal->MakeJsonError("Nama tidak valid.");
		              	break;
		          	}
		        }
		    }
		     return json_encode($query);
        }

        public function InsertMdkategoriRepeat($args) {
        	$args["user_key"] = $this->user->user_key;
        	$args["db"] = $this->db;

		    $this->api->set("master-data/kategori/add", $args);
		    $query = $this->api->exec();

		    if($query->IsError == true) {
		        $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
		        if($dataError) {
		          	switch ($matches[1][0]) {
		            case 'id':
		              	return $this->foglobal->MakeJsonError("ID tidak valid.");
		              	break;
		            case 'nama':
		              	return $this->foglobal->MakeJsonError("Nama tidak valid.");
		              	break;
		          	}
		        }
		    }
		     return json_encode($query);
        }

        public function UpdateMdkategori($id_update, $param) {
          	$param['user_key'] = $this->user->user_key;
          	$param['db'] = $this->db;
          	$param['id_kategori'] = $id_update;

            $this->api->set("master-data/kategori/edit", $param);
            $query = $this->api->exec();
      		if($query->IsError == true) {
        		$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
        		if($dataError) {
          			switch ($matches[1][0]) {
            			case 'id_kategori':
              			return $this->foglobal->MakeJsonError("ID Kategori tidak valid.");
              		break;
            			case 'user_key':
              			return $this->foglobal->MakeJsonError("User Key tidak valid.");
              		break;
          			}
        		}
      		}
      	return json_encode($query);
        }

        public function HtmlDropdownJeniskategori($param) {
			$rHtml ="";

			$query = $this->GetMdkategori($param);
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
	}
