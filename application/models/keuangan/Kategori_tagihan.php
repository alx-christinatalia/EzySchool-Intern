<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kategori_tagihan extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetKategori($param, $disable_page=false) {
			$args["user_key"] = $this->user->user_key; 
			$args["db"] = $this->db;

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["id"])) {
				$args["id_kategori"] = $param["filter"]["id"];
			}
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["is_active"] = $param["filter"]["status"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

			$this->api->set("tagihan/kategori/list", $args, $disable_page);
			return $this->api->exec();
		}

		public function HtmlKategori($param) {
			$rHtml ="";

			$query = $this->GetKategori($param);
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
                                        <td>'.$item->prefix_id_tagihan.'</td>
                                        <td>'.$item->default_keterangan.'</td>
                                        <td>'.date_indo("d M Y H:i", strtotime($item->tgl_last_update)).'</td>
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
        
		public function InsertKategori($args) {
        	$args["user_key"] = $this->user->user_key; 
			$args["db"] = $this->db;
			$args["prefix_id_tagihan"] = strtoupper($args["prefix_id_tagihan"]);

		    $this->api->set("tagihan/kategori/add", $args);
		    $query = $this->api->exec();

		    if($query->IsError == true) {
		        $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
		        if($dataError) {
		          	switch ($matches[1][0]) {
		            case 'user_key':
		              	return $this->foglobal->MakeJsonError("User tidak valid.");
		              	break;
		            case 'db':
              			return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
              			break;
              		case 'prefix_id_tagihan':
		              	return $this->foglobal->MakeJsonError("NIS tidak valid.");
		              	break;
		            case 'default_keterangan':
              			return $this->foglobal->MakeJsonError("Kategori tidak valid.");
              			break;
		          	}
		        }
		    }
		    return json_encode($query);
        }

        public function UpdateKategori($id_update, $param) {
          	$param['user_key'] = $this->user->user_key;
          	$param['db'] = $this->db;
          	$param['id_kategori'] = $id_update;

          	if(!empty($param["prefix_id_tagihan"])) {
          		$param["prefix_id_tagihan"] = strtoupper($param["prefix_id_tagihan"]);	
          	}

            $this->api->set("tagihan/kategori/edit", $param);
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
            		case 'db':
              			return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
              			break;
          			}
        		}
      		}
      		return json_encode($query);
        }
	}
