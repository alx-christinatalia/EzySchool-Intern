<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Chat extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetRoomList($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];
			
			if(!empty($param["kywd"])) {
				$args["search"] = $param["kywd"];
			}
			$args["Limit"] = 6;

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("chat/room/list", $args);
			return $this->api->exec();
		}

		public function GetChatList($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];
			
			if(!empty($param["id_room"])) {
				$args["id_room"] = $param["id_room"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("chat/list", $args);
			$query = $this->api->exec();

			if($query->IsError == true) {
		        $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
		        if($dataError) {
		          	switch ($matches[1][0]) {
		            	case 'id_room':
		              		return (object) array("IsError"=>true, "ErrMessage"=>"Silahkan Pilih Pesan untuk Memulai");
		              	break;
		          	}
		        }
		    }

			return $query;
		}

		public function GetUsersList($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];
			
			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["kelas"])) {
				$args["id_kelas"] = $param["filter"]["kelas"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
			else $args["Sort"] = "nama asc";

            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("chat/siswa/list", $args);
			return $this->api->exec();
		}

		public function GetTotalUnread($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];
			
			$this->api->set("chat/total/unread", $args);
			return $this->api->exec("json");
		}

		public function HtmlRoomList($param) {
			$rHtml ="";

			$foto_default = base_url('assets/img/default-user.png');
			$query = $this->GetRoomList($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$foto = ($item->penerima_foto != "default-user.png") ? $this->foglobal->ParseGambar($item->penerima_foto): base_url("assets/img/default.png");
						
						$unread = "";
						if($item->total_unread > 0 and $item->total_unread <= 10) {
							$unread = '<div class="total-unread">'.$item->total_unread.'</div>';
						} else if($item->total_unread > 10) {
							$unread = '<div class="total-unread">10+</div>';
						}
						
						$rHtml .= '<div class="ktk" data-id_room="'.$item->id_room.'" data-nis="'.$item->penerima.'" data-kelas="'.$item->penerima_kelas.'" data-alamat="'.$item->penerima_alamat.'">
                                        <div class="row">
                                        	<div class="col-lg-2 col-md-3 col-sm-1 col-xs-3">
                                        		<img class="avatar" alt="" src="'.$foto.'" style="height:45px; width:45px;border-radius: 30px;" onerror="this.src='."'".$foto_default."'".'">
	                                            '.$unread.'
	                                        </div>
	                                        <div class="col-lg-10 col-md-9 col-sm-11 col-xs-9">
	                                            <div class="row">
	                                                <div class="col-xs-8">
	                                                    <label class="bold siswa ellipsis">'.$item->penerima_nama.'</label>
	                                                </div>
	                                                <div class="col-xs-4 pull-right bold" style="font-size: 12px;">
	                                                    <span class="datetime pull-right time">'.date("d/m H:i", strtotime($item->tgl_psn_terakhir)).'</span>
	                                                </div>
	                                            </div>
	                                            <div class="row">
	                                                <div class="col-md-12">
	                                                    <label class="short_message ellipsis" style="font-size: 13px;">'.$item->penerima_nama.' : '.$item->psn_terakhir.'</label>
	                                                </div>
	                                            </div>
	                                        </div>
                                        </div>
                                    </div>';
					}
				} else {
					$rHtml = '<div class="bg-blue notfound"><i class="fa fa-exclamation-circle"></i> Tidak Ada Data</div>';
				}
			} else {
				$rHtml = '<div class="bg-blue notfound">'.$query->ErrMessage."</div>";
			}

			$Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}

		public function HtmlChatList($param) {
			$rHtml ="";

			$query = $this->GetChatList($param);

			$foto_default = base_url('assets/img/default-user.png');
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					$paging = $query->Paging;

					for($i = ($paging->Count - 1); $i >= 0; $i--) {
						$item = $query->Data[$i];

						$foto  	   = $item->foto != "default.png" ? $this->foglobal->ParseGambar($item->foto): base_url("assets/img/default-user.png");
						$is_in 	   = !empty($item->is_from_pegawai) ? "out": "in";
						$user_link = !empty($item->is_from_pegawai) ? "#": base_url("siswa/detail.html?nis=".$item->no_induk);

						$is_baca = "";
						if(!empty($item->is_from_pegawai)) {
							$is_baca = !empty($item->is_baca) ? '<span class="check active"><i class="fa fa-check"></i></span>': '<span class="check"><i class="fa fa-check"></i></span>';
						}


						$rHtml .= '<li class="'.$is_in.'">
                                        <img class="avatar" src="'.$foto.'" onerror="this.src='."'".$foto_default."'".'">
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="'.$user_link.'" target="_blank" class="name">'.$item->nama.'</a>
                                            <span class="datetime">'.date_indo("d M Y H:i", strtotime($item->tgl_kirim)).'</span>
                                            '.$is_baca.'
                                            <span class="body">'.$item->message.'</span>
                                        </div>
                                    </li>';
					}
				} else {
					$rHtml = '<div class="bg-blue notfound"><i class="fa fa-exclamation-circle"></i> Tidak Ada Data Pesan</div>';
				}
			} else {
				$rHtml = '<div class="bg-blue notfound">'.$query->ErrMessage."</div>";
			}

			$Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}

		public function HtmlUserList($param) {
			$rHtml ="";

			$query = $this->GetUsersList($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$rHtml .= '<a role="button" class="list-group-item pilih-siswa-baru" data-nama="'.$item->nama.'" data-nis="'.$item->nis.'" data-kelas="'.$item->kelas_nama.'" data-alamat="'.$item->alamat.'">'.$item->nama.' - '.$item->kelas_nama.' - '.$item->nis.'</a>';
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

		public function AddChat($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];
			$args["message"] = $param["message"];

			if(!empty($param["id_room"])) {
				$args["id_room"] = $param["id_room"];
			}
			if(!empty($param["nis"])) {
				$args["nis"] = $param["nis"];
			}
			if(!empty($param["n_induk"])) {
				$args["no_induk"] = $param["n_induk"];
			}

			$this->api->set("chat/add", $args);
			return json_encode($this->api->exec());
		}
	}
