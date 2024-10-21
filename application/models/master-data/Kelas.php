<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kelas extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	      	$this->sekolah = $this->session->userdata("sekolah");
	      	$this->sekolah = $this->sekolah->Data[0];
	    }

		public function GetMdkelas($param, $disable_page=false) {
			$args = [
				"user_key" => $this->user->user_key,
				"db" => $this->db
			];
			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["id_jurusan"])) {
				$args["id_jurusan"] = $param["filter"]["id_jurusan"];
			}
			if(!empty($param["filter"]["id_kelas"])) {
				$args["id_kelas"] = $param["filter"]["id_kelas"];
			}
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["is_active"] = $param["filter"]["status"];
			} 
			if(!empty($param["id_jurusan"])) {
		        $args["id_jurusan"] = $param["id_jurusan"];
		    }

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
			else $args["Sort"] = "a.nama asc";

            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("master-data/kelas/list", $args, $disable_page);
			return $this->api->exec();
		}

		public function GetAllKelas() {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			$this->api->set("master-data/kelas/list", $args, true);
			return $this->api->exec();
		}

		public function HtmlMdkelas($param) {
			$rHtml ="";

			$query = $this->GetMdkelas($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>"; 
						 $rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                	<li><a role="button" class="detail-data" data-idupdate="'.$item->id_kelas.'"><i class="fa fa-external-link"></i> Lihat Detail</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a role="button" class="edit-data" data-idupdate="'.$item->id_kelas.'"><i class="fa fa-pencil"></i> Edit Kelas</a></li>
                                                    <li><a role="button" class="status-data" data-idupdate="'.$item->id_kelas.'" data-status="'.$item->is_active.'"><i class="fa fa-check-square-o"></i> Edit Status</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a class="edit-data" data-idupdate="'.$item->id_kelas.'">'.$item->nama.'</a></td>
                                        <td><a class="detail-data" data-idupdate="'.$item->id_kelas.'">'.$this->foglobal->CheckStrip($item->pegawai_nama).'</a></td>
                                        <td>'.date_indo("d M Y H:i", strtotime($item->tgl_last_update)).'</td>
                                        <td class="text-center"><a class="status-data" data-idupdate="'.$item->id_kelas.'" data-status="'.$item->is_active.'">'.$is_active.'</a></td>
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

		public function HtmlMdkelasNama($param) {
			$rHtml ="";

			$query = $this->GetMdkelas($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>"; 
						 $rHtml .= '<a class="list-group-item nama-kelas" role="button" class="edit-data" id="kelas'.$item->id_kelas.'">'.$item->nama.'</a>';
					}
				} else {
					$rHtml = "<div class='text-center'><span class='label label-warning'>Tidak ada data</span></div>";
				}
			} else {
				$rHtml = "<div class='text-center'><span class='label label-warning'>".$query->ErrMessage."</span></div>";
			}

			$Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}
		
		public function HtmlDropdownKelas($param) {
			$rHtml ="";

			$query = $this->GetMdkelas($param, true);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						 $rHtml .= '<option value="'.$item->id_kelas.'">'.$item->nama.'</td>';
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

		public function UploadMdkelas($param) {
			$args["user_key"] = $this->user->user_key;
            $args["db"] = $this->db;
          	$args['FolderName'] = "excel/import-mdkelas";

			if(!empty($param["Base64"])) {
				$args["FileBase64"] = $param["Base64"];
			}
			if(!empty($param["Ext"])) {
				$args["FileExtension"] = $param["Ext"];
			}
            $this->api->set("tools/upload/file", $args);
            return $this->api->exec("json");
        }

		public function InsertMdkelas($args) {
			$args['user_key'] = $this->user->user_key;
          	$args['db'] = $this->db;

		    $this->api->set("master-data/kelas/add", $args);
		    $query = $this->api->exec();

		    if($query->IsError == true) {
		        $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
		        if($dataError) {
		          	switch ($matches[1][0]) {
		            case 'user_key':
		              	return $this->foglobal->MakeJsonError("User tidak valid.");
		              	break;
		            case 'id_jurusan':
		              	return $this->foglobal->MakeJsonError("ID Jurusan tidak valid.");
		              	break;
		          	}
		        }
		    } else {
		    	if($this->sekolah->install_step == 1) {
			    	$this->load->model("administrator/profil_sekolah");
			    	$dt_sklh["user_key"] = $this->user->user_key;
		            $dt_sklh["db"] = $this->db;
		            $data_sekolah = $this->profil_sekolah->GetProfil2($dt_sklh);
		            $this->session->set_userdata(["sekolah" => $data_sekolah]);
		        }
		    }
		    
		    return json_encode($query);
        }

        public function UpdateMdkelas($id_update, $param) {
          	$param['user_key'] = $this->user->user_key;
          	$param['db'] = $this->db;
          	$param['id_kelas'] = $id_update;

            $this->api->set("master-data/kelas/edit", $param);
            $query = $this->api->exec();
      		if($query->IsError == true) {
        		$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
        		if($dataError) {
          			switch ($matches[1][0]) {
            			case 'id_kelas':
              			return $this->foglobal->MakeJsonError("ID Kelas tidak valid.");
              		break;
            			case 'user_key':
              			return $this->foglobal->MakeJsonError("User Key tidak valid.");
              		break;
          			}
        		}
      		}
      		return json_encode($query);
        }

        public function InsertKelasRepeat($param) {
        	$args["user_key"] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["repeater"] = $param;

		    $this->api->set("master-data/kelas/repeater/add", $args);
		    $query = $this->api->exec("array");

		    if(!empty($query["DataRepeat"][0])) {
			    $DataRepeat = $query["DataRepeat"][0];
			    if($DataRepeat["IsError"] == false) {
			    	if($this->sekolah->install_step == 1) {
				    	$this->load->model("administrator/profil_sekolah");
				    	$dt_sklh["user_key"] = $this->user->user_key;
			            $dt_sklh["db"] = $this->db;
			            $data_sekolah = $this->profil_sekolah->GetProfil2($dt_sklh);
			            $this->session->set_userdata(["sekolah" => $data_sekolah]);
			        }
			    }
			}
		    return json_encode($query);
        }
        
        public function UpdateKelasRepeat($param) {
        	$args["user_key"] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["repeater"] = $param;

		    $this->api->set("master-data/kelas/repeater/edit", $args);
		    $query = $this->api->exec();

		    return json_encode($query);
        }
	}
