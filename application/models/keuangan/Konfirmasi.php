<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Konfirmasi extends CI_Model {
			
		private $user, $db;
      
	    public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetKonfirmasi($param) {
			$args["user_key"] = $this->user->user_key; 
			$args["db"] = $this->db;

			if(!empty($param["filter"]["no_ref"])) {
				$args["no_ref"] = $param["filter"]["no_ref"];
			}
			if(!empty($param["filter"]["kywd"])) {
				$args["search"] = $param["filter"]["kywd"];
			}
			if(!empty($param["filter"]["nis"])) {
				$args["nis"] = $param["filter"]["nis"];
			}
			if(!empty($param["filter"]["kelas"])) {
				$args["id_kelas"] = $param["filter"]["kelas"];
			}
			if(isset($param["filter"]["status"])) {
				$args["status"] = $param["filter"]["status"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
			else $args["Sort"] = "tgl_insert desc";

            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("tagihan/konfirmasi/list", $args);
			return $this->api->exec();
		}

		public function HtmlKonfirmasi($param) {
			$rHtml ="";

			$query = $this->GetKonfirmasi($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$status = "<span class='label label-warning'>Menunggu Konfirmasi</span>";
						if($item->status == 1) {
							$status = "<span class='label label-success'>Sukses</span>";
						} else if($item->status == 2) {
							$status = "<span class='label label-danger'>Dibatalkan</span>";
						}
						$tgl_konfirmasi = !empty($item->tgl_konfirmasi) ? date_indo("d M Y H:i:s", strtotime($item->tgl_konfirmasi)): "-";
						
						$action = "";
						if($item->status == 0) {
							$action = '<div class="btn-group">
                                        <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                            	<a role="button" data-noref="'.$item->no_ref.'" class="BtnKonfirmasiSukses">
                                                	<i class="fa fa-check" style="font-size:13px;"></i> Sukses Konfirmasi
                                                </a>
                                            </li>
                                            <li role="separator" class="divider">Konfirmasi</li>
                                            <li>
                                            	<a role="button" data-noref="'.$item->no_ref.'" class="BtnKonfirmasiGagal">
                                            		<i class="fa fa-times" style="font-size:13px;"></i> Batalkan
                                            	</a>
                                            </li>
                                        </ul>
                                    </div>';
						} else {
							$action = '<a role="button" data-noref="'.$item->no_ref.'" style="margin-left: 0px;" class="btn btn-sm btn-primary BtnKonfirmasiDetail">
                                		 <i class="fa fa-external-link"></i>
                                	  </a>';
						}
						$rHtml .= '<tr>
                                        <td class="text-center">'.$action.'</td>
                                        <td><a href="'.base_url("tagihan/detail.html?id=".$item->id_tagihan).'">'.$item->tagihan_nama.'</a></td>
                                        <td><a href="'.base_url("siswa/detail.html?nis=".$item->nis).'">'.$item->siswa_nama.'</a></td>
                                        <td>'.$item->nama_rek_asal.'</td>
                                        <td class="text-right">'.$this->foglobal->formatAngka($item->jml_bayar).'</td>
                                        <td><a role="button" onclick=\'window.open("'.$this->foglobal->ParseGambar($item->bukti_bayar) .'", "", "width=800,height=400");\' target="_blank">Lihat Bukti</a></td>
                                        <td>'.date_indo("d M Y", strtotime($item->tgl_bayar)).'</td>
                                        <td>'.$tgl_konfirmasi.'</td>
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

		public function UpdateKonfirmasi($param) {
          	$param['user_key'] = $this->user->user_key;
          	$param['db'] = $this->db;
          	$param['tgl_konfirmasi'] = date("Y-m-d H:i:s");

            $this->api->set("tagihan/konfirmasi/edit", $param);
            $query = $this->api->exec();
      		if($query->IsError == true) {
        		$dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
        		if($dataError) {
          			switch ($matches[1][0]) {
            			case 'status':
              			return $this->foglobal->MakeJsonError("Status tidak valid.");
              		break;
            			case 'no_ref':
              			return $this->foglobal->MakeJsonError("No Ref tidak valid.");
              		break;
          			}
        		}
      		}
      		return json_encode($query);
        }
	}
