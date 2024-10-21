<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Tarif extends CI_Model {
			
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
			if(!empty($param["filter"]["kategori"])) {
				$args["id_kategori"] = $param["filter"]["kategori"];
			}
			if(!empty($param["filter"]["bulan"])) {
				$args["bulan"] = $param["filter"]["bulan"];
			}
			if(!empty($param["filter"]["tahun"])) {
				$args["tahun"] = $param["filter"]["tahun"];
			}
			if(isset($param["filter"]["status"])) {
				$args["is_active"] = $param["filter"]["status"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
			else $args["Sort"] = "a.tgl_last_update desc";

            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit
            if(!empty($param["Field"])) $args["Field"] = $param["Field"]; //Limit

			$this->api->set("tagihan/tarif/list", $args);
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
                                                    <li><a role="button" class="edit-data" data-idupdate="'.$item->id.'"><i class="fa fa-pencil"></i> Edit Tarif</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a class="edit-data" data-idupdate="'.$item->id.'">'.$item->nama.'</a></td>
                                        <td>'.$this->foglobal->formatAngka($item->tarif).'</td>
                                        <td>'.$item->kategori_nama.'</td>
                                        <td>'.$this->foglobal->IDtoMonth($item->bulan).'</td>
                                        <td>'.$item->tahun.'</td>
                                        <td>'.date_indo("d M Y H:i", strtotime($item->tgl_insert)).'</td>
                                        <td>'.date_indo("d M Y H:i", strtotime($item->tgl_last_update)).'</td>
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

		public function HtmlDataTarif($param) {
			$rHtml ="";

			$param["Field"] = "a.id, a.nama, a.bulan, a.tahun";
			$query = $this->GetTarif($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$rHtml .= '<a class="list-group-item nama-tarif" role="button" data-id_tarif="'.$item->id.'" data-nama="'.$item->nama.'" id="tarif'.$item->id.'"><strong>'.$this->foglobal->IDtoMonth($item->bulan).' '.$item->tahun.'</strong> - '.$item->nama.'</a>';
					}
				} else {
					$rHtml = "<div class='text-center'><span class='label label-warning'>Tidak ada tarif, silahkan tambah tarif terlebih dahulu</span></div>";
				}
			} else {
				$rHtml = "<div class='text-center'><span class='label label-warning'>".$query->ErrMessage."</span></div>";
			}

			$Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}
        
		public function InsertTarif($args) {
        	$args["user_key"] = $this->user->user_key; 
			$args["db"] = $this->db;

		    $this->api->set("tagihan/tarif/add", $args);
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

		    $this->api->set("tagihan/tarif/add", $args);
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
          	$param['id_tarif'] = $id_update;

            $this->api->set("tagihan/tarif/edit", $param);
            $query = $this->api->exec();
      		if($query->IsError == true) {
        		$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
        		if($dataError) {
          			switch ($matches[1][0]) {
            		case 'id_tarif':
              			return $this->foglobal->MakeJsonError("ID Tarif tidak valid.");
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
	}
