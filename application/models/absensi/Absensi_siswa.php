<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Absensi_siswa extends CI_Model {

		private $user, $db;
			
		public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetAbsensiSiswa($param, $disable_page=true) {
			$args['user_key'] = $this->user->user_key;
        	$args["db"] = $this->db;
			if(!empty($param["filter"]["id"])) {
				$args["id"] = $param["filter"]["id"];
			}
			if(!empty($param["filter"]["bulan"])) {
				$args["bulan"] = $param["filter"]["bulan"];
			} 
			if(!empty($param["filter"]["id_kelas"])) {
				$args["id_kelas"] = $param["filter"]["id_kelas"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

			$this->api->set("absensi/harian/list", $args, true);
			return $this->api->exec();
		}

		public function HtmlAbsensiSiswa($param) {
			$rHtml ="";

			$query = $this->GetAbsensiSiswa($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) { 
						$rHtml .= '<tr>
                                        <td>'.$item->nis.'</td>
                                        <td><a href="'.base_url("siswa/detail.html?nis=".$item->nis).'">'.$item->nama_siswa.'</a></td>
                                        <td>'.$item->j_sakit.'</td>
                                        <td>'.$item->j_ijin.'</td>
                                        <td>'.$item->j_alpa.'</td>
                                        <td>'.$item->j_sia.'</td>
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
	}
