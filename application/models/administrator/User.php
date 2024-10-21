<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetPegawai($param, $disable_page=false) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["id"])) {
				$args["id_users"] = $param["filter"]["id"];
			}
			if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
				$args["is_active"] = $param["filter"]["status"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("pegawai/list", $args, $disable_page);
			return $this->api->exec();
		}

		public function HtmlPegawai($param) {
			$rHtml ="";
			$query = $this->GetPegawai($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						if($item->username == "administrator") continue;
						$is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>"; 
						$jk = $this->foglobal->IDtoSex($item->jk);
						$rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                	<li><a role="button" class="detail-data" data-idupdate="'.$item->id.'"><i class="fa fa-external-link"></i> Lihat Detail</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a role="button" href="'.base_url("manajemen_user/edit.html?id=".$item->id).'"><i class="fa fa-pencil"></i> Edit User</a></li>
                                                    <li><a role="button" class="status-data" data-idupdate="'.$item->id.'" data-status="'.$item->is_active.'"><i class="fa fa-check-square-o"></i> Edit Status</a></li>
                                                   	<li><a role="button" class="edit-password" data-idupdate="'.$item->id.'"><i class="fa fa-unlock-alt"></i> Edit Password</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a class="detail-data" data-idupdate="'.$item->id.'">'.$this->foglobal->CheckStrip($item->nip).'</a></td>
                                        <td><a href="'.base_url("manajemen_user/edit.html?id=".$item->id).'">'.$item->nama.'</a></td>
                                        <td>'.$jk.'</td>
                                        <td>'.$item->username.'</td>
                                        <td>'.$item->email.'</td>
                                        <td>'.$this->foglobal->CheckStrip($item->jabatan).'</td>
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

        public function HtmlDropdownPegawai($param) {
			$rHtml ="";

			$query = $this->GetPegawai($param, true);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						if($item->username == "administrator") continue;
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

		public function UpdatePegawai($id_update, $param) {
          	$param['user_key'] = $this->user->user_key;
          	$param['db'] = $this->db;
          	$param['id_users'] = $id_update;

          	if(empty($param["foto"])){
        		$param["foto"] = "default.png";
        	}

            $this->api->set("pegawai/edit", $param);
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
			            case 'username':
			              	return $this->foglobal->MakeJsonError("Username tidak valid.");
			              	break;
			            case 'jk':
			              	return $this->foglobal->MakeJsonError("Jenis Kelamin tidak valid.");
			              	break;
          			}
        		}
      		}
      	return json_encode($query);
        }

        public function InsertDataPegawai($args) {
        	$args['user_key'] = $this->user->user_key;
        	$args["db"] = $this->db;

        	if($args["foto"] == ""){
        		$args["foto"] = "default.png";
        	}

		    $this->api->set("pegawai/add", $args);
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
		            case 'username':
		              	return $this->foglobal->MakeJsonError("Username tidak valid.");
		              	break;
		            case 'jk':
		              	return $this->foglobal->MakeJsonError("Jenis Kelamin tidak valid.");
		              	break;
		          	}
		        }
		    }
		    return json_encode($query);
        }

        public function UploadFotoPegawai($param) {
			$args["user_key"] = $this->user->user_key;
            $args["db"] = $this->db;
            $args["FolderName"] = "image-pegawai";

			if(!empty($param["Base64"])) {
				$args["FileBase64"] = $param["Base64"];
			}
			if(!empty($param["OldPath"])) {
            $args["OldPath"] = $param["OldPath"];
        	}

            $this->api->set("tools/upload/image", $args);
            return $this->api->exec("json");
        }

        public function UploadDataPegawai($param) {
        	$args['user_key'] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args['FolderName'] = "excel/import-pegawai";

			if(!empty($param["Base64"])) {
				$args["FileBase64"] = $param["Base64"];
			}
			if(!empty($param["Ext"])) {
				$args["FileExtension"] = $param["Ext"];
			}

            $this->api->set("tools/upload/file", $args);
            return $this->api->exec("json");
        }

        public function UpdatePasswordPengguna($id_update, $param) {
        	$param['user_key'] = $this->user->user_key;
        	$param["db"] = $this->db;
        	$param['id_users'] = $id_update['id'];
        	$param['password1'] = $id_update['password1'];
        	$param['password2'] = $id_update['password2'];

           	$this->api->set("pegawai/edit/password", $param);
			$query = $this->api->exec();
			if($query->IsError == true) {
				$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
				if($dataError) {
					switch ($matches[1][0]) {
						case 'id_users':
							return $this->foglobal->MakeJsonError("ID Pengguna tidak valid.");
							break;
						case 'password1':
							return $this->foglobal->MakeJsonError("Password Pengguna tidak valid.");
							break;
						case 'password2':
							return $this->foglobal->MakeJsonError("Password Pengguna tidak valid.");
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

        public function InsertDataPegawaiRepeat($param) {
        	$args["user_key"] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["repeater"] = $param;

		    $this->api->set("pegawai/repeater/add", $args);
		    $query = $this->api->exec();

		    return json_encode($query);
        }

        public function UpdateDataPegawaiRepeat($param) {
        	$args["user_key"] = $this->user->user_key;
        	$args["db"] = $this->db;
        	$args["repeater"] = $param;

		    $this->api->set("pegawai/repeater/edit", $args);
		    $query = $this->api->exec();

		    return json_encode($query);
        }
	}
