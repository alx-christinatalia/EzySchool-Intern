<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Tarif_khusus extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetTarif($param) {
			$args["user_key"] = $this->user->user_key; 
			$args["db"] = $this->db;

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["id"])) {
				$args["id_tarif"] = $param["filter"]["id"];
			}
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["is_active"] = $param["filter"]["status"];
			}
	        if (!empty($param["filter"]["kategori"])) {
	            $args["id_kategori"] = $param["filter"]["kategori"];
	        }
	        if (!empty($param["filter"]["kelas"])) {
	            $args["id_kelas"] = $param["filter"]["kelas"];
	        }

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
			else $args["Sort"] = "tgl_last_update desc";

            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

			$this->api->set("tagihan/tarifkhusus/list", $args);
			return $this->api->exec();
		}

		public function GetDatasiswaNoLimit($param, $disable_page=true) {
			$args["user_key"] = $this->user->user_key;
			$args["db"] = $this->db;
			
			if(!empty($param["id_kategori"])) {
		        $args["id_kategori"] = $param["id_kategori"];
		    }
		    if(!empty($param["kelas"])) {
		        $args["id_kelas"] = $param["kelas"];
		    }
		    if(!empty($param["tarif"])) {
		        $args["id_tarif"] = $param["tarif"];
		    }
			//Default
			$args["Sort"] = "nama asc"; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("tagihan/tarifkhusus/siswa/list", $args, $disable_page);
			return $this->api->exec();
		}

		public function HtmlTarif($param) {
			$rHtml ="";

			$query = $this->GetTarif($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>"; 
						 $rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                	<li><a role="button" class="detail-data" data-idupdate="'.$item->id.'"><i class="fa fa-external-link"></i> Lihat Detail</a></li>
                                                   	<li role="separator" class="divider"></li>
                                                    <li><a role="button" class="edit-data" data-idupdate="'.$item->id.'"><i class="fa fa-pencil"></i> Edit Tarif Khusus</a></li>
                                                    <li><a role="button" class="status-data" data-idupdate="'.$item->id.'" data-status="'.$item->is_active.'"><i class="fa fa-check-square-o"></i> Edit Status</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a class="detail-data" data-idupdate="'.$item->id.'">'.$item->nis.'</a></td>
                                        <td><a class="edit-data" data-idupdate="'.$item->id.'">'.$item->siswa_nama.'</a></td>
                                        <td>'.$item->kategori_nama.'</td>
                                        <td>'.$item->tarif_nama.'</td>
                                        <td>'.$this->foglobal->formatAngka($item->tarif).'</td>
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
        
		public function InsertTarif($args) {
        	$args["user_key"] = $this->user->user_key; 
			$args["db"] = $this->db;

			if(!empty($args["tarif"])) {
				$args["tarif"] = str_replace(".", "", $args["tarif"]);
			}

		    $this->api->set("tagihan/tarifkhusus/add", $args);
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
              		case 'nis':
		              	return $this->foglobal->MakeJsonError("NIS tidak valid.");
		              	break;
		            case 'id_kategori':
              			return $this->foglobal->MakeJsonError("Kategori tidak valid.");
              			break;
              		case 'tarif':
		              	return $this->foglobal->MakeJsonError("Tarif tidak valid.");
		              	break;
		          	}
		        }
		    }
		    return json_encode($query);
        }

        public function InsertTarifRepeat($args) {
        	$args["user_key"] = $this->user->user_key; 
			$args["db"] = $this->db;

			if(!empty($args["tarif"])) {
				$args["tarif"] = str_replace(".", "", $args["tarif"]);
			}

		    $this->api->set("tagihan/tarifkhusus/add", $args);
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
              		case 'nis':
		              	return $this->foglobal->MakeJsonError("NIS tidak valid.");
		              	break;
		            case 'id_kategori':
              			return $this->foglobal->MakeJsonError("Kategori tidak valid.");
              			break;
              		case 'tarif':
		              	return $this->foglobal->MakeJsonError("Tarif tidak valid.");
		              	break;
		          	}
		        }
		    }
		    return json_encode($query);
        }

        public function UpdateTarif($id_update, $param) {
          	$param['user_key'] = $this->user->user_key;
          	$param['db'] = $this->db;
          	$param['id_tarifkhusus'] = $id_update;

          	if(!empty($args["tarif"])) {
				$args["tarif"] = str_replace(".", "", $args["tarif"]);
			}

            $this->api->set("tagihan/tarifkhusus/edit", $param);
            $query = $this->api->exec();
      		if($query->IsError == true) {
        		$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
        		if($dataError) {
          			switch ($matches[1][0]) {
            		case 'id_tarifkhusus':
              			return $this->foglobal->MakeJsonError("ID Tarif Khusus tidak valid.");
              			break;
            		case 'user_key':
              			return $this->foglobal->MakeJsonError("User Key tidak valid.");
              			break;
            		case 'db':
              			return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
              			break;
		            case 'nis':
		              	return $this->foglobal->MakeJsonError("Siswa tidak valid.");
		              	break;
          			}
        		}
      		}
      		return json_encode($query);
        }

        public function UpdateTarifRepeat($args) {
        	$args["user_key"] = $this->user->user_key;
        	$args["db"] = $this->db;

		    $this->api->set("tagihan/tarifkhusus/edit", $args);
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
              		case 'nis':
		              	return $this->foglobal->MakeJsonError("NIS tidak valid.");
		              	break;
		            case 'id_kategori':
              			return $this->foglobal->MakeJsonError("Kategori tidak valid.");
              			break;
              		case 'tarif':
		              	return $this->foglobal->MakeJsonError("Tarif tidak valid.");
		              	break;
		          	}
		        }
		    }
		     return json_encode($query);
        }
	}
