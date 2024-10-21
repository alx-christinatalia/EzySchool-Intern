<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Siswa extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	      	$this->sekolah = $this->session->userdata("sekolah");
	      	$this->sekolah = $this->sekolah->Data[0];
	    }

		public function GetDatasiswa($param, $disable_page=false) {
			$args["user_key"] = $this->user->user_key;
			$args["db"] = $this->db;
			
			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["nis"])) {
				$args["nis"] = $param["filter"]["nis"];
			}
			if(!empty($param["filter"]["jurusan"])) {
		        $args["id_jurusan"] = $param["filter"]["jurusan"];
		    }
		    if(!empty($param["filter"]["kelas"])) {
		        $args["id_kelas"] = $param["filter"]["kelas"];
		    }
		    if(!empty($param["kelas"])) {
		        $args["id_kelas"] = $param["kelas"];
		    }
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["is_active"] = $param["filter"]["status"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
			else $args["Sort"] = "a.nama asc";

            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("siswa/list", $args, $disable_page);
			$result =  $this->api->exec();
			if($result->IsError == false) {
				if(!empty($result->Data)) {
					foreach ($result->Data as $index => $value) {
						if(!empty($value->nis) and !empty($value->password)) {
							$result->Data[$index]->password = $this->foglobal->GeneratePassSiswa($value->nis);
						}
					}
				}
			}

			return $result;
		}

		public function HtmlDatasiswa($param) {
			$rHtml ="";

			$query = $this->GetDatasiswa($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>"; 
						$jk = $this->foglobal->IDtoSex($item->jk);
						$rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                	<li><a role="button" class="detail-data" data-idupdate="'.$item->nis.'" href="'.base_url("siswa/detail.html?nis=".$item->nis).'"><i class="fa fa-external-link"></i> Lihat Detail</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a role="button" class="edit-data" data-idupdate="'.$item->nis.'" href="'.base_url("siswa/edit.html?nis=".$item->nis."").'"><i class="fa fa-pencil"></i> Edit Siswa</a></li>
                                                    <li><a role="button" class="edit-status" data-idupdate="'.$item->nis.'" data-status="'.$item->is_active.'"><i class="fa fa-check-square-o"></i> Edit Status</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a href="'.base_url("siswa/detail.html?nis=".$item->nis).'">'.$item->nis.'</a></td>
                                        <td>'.$item->nisn.'</td>
                                        <td><a href="'.base_url("siswa/edit.html?nis=".$item->nis).'">'.$item->nama.'</a></td>
                                        <td>'.$jk.'</td>
                                        <td>'.$item->kelas_nama.'</td>
                                        <td class="text-center"><a class="edit-status" data-idupdate="'.$item->nis.'" data-status="'.$item->is_active.'">'.$is_active.'</a></td>
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

		public function HtmlDatasiswaNama($param) {
	      $rHtml ="";

	      $query = $this->GetDatasiswa($param);
	      if($query->IsError == false) {
	        if(!empty($query->Data)) {
	          foreach ($query->Data as $item) {
	            $is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>"; 
	             $rHtml .= '<a class="list-group-item nama-siswa" role="button" nama-siswa="'.$item->nama.'" class="edit-data" id="nis'.$item->nis.'">'.$item->nama.' - '.$item->nis.' - '.$item->kelas_nama.'</a>';
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

		public function HtmlDropdownSiswa($param) {
			$rHtml ="";

			$query = $this->GetDatasiswa($param, true);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						 $rHtml .= '<option value="'.$item->nis.'">'.$item->nama.'</td>';
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

		public function UpdateDatasiswa($id_update, $param) {
          	$param['user_key'] = $this->user->user_key;
          	$param['db'] = $this->db;
        	$param["nis"] = $id_update;

        	if(empty($param["foto"])){
        		$param["foto"] = "default.png";
        	}

            $this->api->set("siswa/edit", $param);
            $query = $this->api->exec();
      		if($query->IsError == true) {
        		$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
        		if($dataError) {
          			switch ($matches[1][0]) {
            		case 'nis':
              			return $this->foglobal->MakeJsonError("NIS Siswa tidak valid.");
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

        public function UploadDataSiswa($param) {
            $args["user_key"] = $this->user->user_key;
            $args["db"] = $this->db;
            $args["FolderName"] = "excel/import-siswa";

			if(!empty($param["Base64"])) {
				$args["FileBase64"] = $param["Base64"];
			}
			if(!empty($param["Ext"])) {
				$args["FileExtension"] = $param["Ext"];
			}
            $this->api->set("tools/upload/file", $args);
            return $this->api->exec("json");
        }

        public function UploadFotoSiswa($param) {
        	$args["user_key"] = $this->user->user_key;
            $args["db"] = $this->db;
            $args["FolderName"] = "image-siswa";

			if(!empty($param["Base64"])) {
				$args["FileBase64"] = $param["Base64"];
			}
			if(!empty($param["OldPath"])) {
            $args["OldPath"] = $param["OldPath"];
        	}

            $this->api->set("tools/upload/image", $args);
            return $this->api->exec("json");
        }

        public function InsertDataSiswa($args) {
        	$args["user_key"] = $this->user->user_key;
            $args["db"] = $this->db;

            if($args["foto"] == ""){
        		$args["foto"] = "default.png";
        	}

		    $this->api->set("siswa/add", $args);
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
		              	return $this->foglobal->MakeJsonError("NIS tidak valid.");
		              	break;
		            case 'nama':
		              	return $this->foglobal->MakeJsonError("Nama tidak valid.");
		              	break;
		            case 'id_kelas':
		              	return $this->foglobal->MakeJsonError("Kelas tidak valid.");
		              	break;
		            case 'id_jurusan':
		              	return $this->foglobal->MakeJsonError("Jurusan tidak valid.");
		              	break;
		            case 'jk':
		              	return $this->foglobal->MakeJsonError("Jenis Kelamin tidak valid.");
		              	break;
		          	}
		        }
		    } else {
		    	if($this->sekolah->install_step == 2) {
			    	$this->load->model("administrator/profil_sekolah");
			    	$dt_sklh["user_key"] = $this->user->user_key;
		            $dt_sklh["db"] = $this->db;
		            $data_sekolah = $this->profil_sekolah->GetProfil2($dt_sklh);
		            $this->session->set_userdata(["sekolah" => $data_sekolah]);
		        }
		    }
		    return json_encode($query);
        }

        public function InsertDataSiswaRepeat($param) {
        	$args["user_key"] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["repeater"] = $param;

		    $this->api->set("siswa/repeater/add", $args);
		    $query = $this->api->exec("array");

		    if(!empty($query["DataRepeat"][0])) {
			    $DataRepeat = $query["DataRepeat"][0];
			    if($DataRepeat["IsError"] == false) {
			    	if($this->sekolah->install_step == 2) {
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

        public function UpdateDataSiswaRepeat($param) {
        	$args["user_key"] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["repeater"] = $param;

		    $this->api->set("siswa/repeater/edit", $args);
		    $query = $this->api->exec();

			return json_encode($query);
        }
	}
