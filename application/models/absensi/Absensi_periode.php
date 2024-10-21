<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Absensi_periode extends CI_Model {

		private $user, $db;
			
		public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetPeriode($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["filter"]["id"])) {
				$args["id"] = $param["filter"]["id"];
			}
			if(!empty($param["filter"]["tahun"])) {
				$args["tahun"] = $param["filter"]["tahun"];
			}
			// if(!empty($param["filter"]["bulan"])) {
			// 	$args["bulan"] = $param["filter"]["bulan"];
			// }

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

			$this->api->set("absensi/periode/list", $args);
			return $this->api->exec();
		}

		public function HtmlPeriode($param) {
			$rHtml ="";

			$query = $this->GetPeriode($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					$bulan = "";
					$no = 1;
					foreach ($query->Data as $item) {
						$bulan = $this->foglobal->IDtoMonth($item->bulan);
						$rHtml .= '<tr>
                                        <td>'.$bulan.'</td>
						 				<td>'.$item->tahun.'</td>
						 				<td>
                                        	<a role="button" class="btn btn-primary sync-data" data-idtahun="'.$item->tahun.'" data-idbulan="'.$item->bulan.'"><i class="fa fa-refresh"></i> Sinkronisasi</a>
                                        	<a href="'.base_url("rekap_absensi_bulanan.html?tahun=".$item->tahun."&bulan=".$item->bulan).'" class="btn btn-info"><i class="fa fa-file-o"></i> Lihat Rekap</a>
                                        </td>
                                   </tr>';
                        $no++;
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

		public function InsertPeriode($args) {
        	$args = ["user_key" => $this->user->user_key, "db" => $this->db, "tahun" => $args["tahun"], "bulan" => $args["bulan"]];

		    $this->api->set("absensi/periode/add", $args);
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
		            case 'tahun':
		              	return $this->foglobal->MakeJsonError("Tahun tidak valid.");
		              	break;
		            case 'bulan':
		              	return $this->foglobal->MakeJsonError("Bulan tidak valid.");
		              	break;
		            case 'duplicate':
		              	return $this->foglobal->MakeJsonError("Periode sudah pernah dimasukkan.");
		              	break;
		          	}
		        }

		        if(preg_match("!(Duplicate entry)!", $query->ErrMessage)) {
		        	return $this->foglobal->MakeJsonError("Periode Bulan ".$args["bulan"]."-".$args["tahun"]." telah dibuat");
		        }
		    }
		     return json_encode($query);
        }

        public function Sync($args) {
        	$args = ["user_key" => $this->user->user_key, "db" => $this->db, "tahun" => $args["tahun"], "bulan" => $args["bulan"]];

		    $this->api->set("absensi/periode/sinkronisasi", $args);
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
		            case 'tahun':
		              	return $this->foglobal->MakeJsonError("Tahun tidak valid.");
		              	break;
		            case 'bulan':
		              	return $this->foglobal->MakeJsonError("Bulan tidak valid.");
		              	break;
		          	}
		        }
		    }
		     return json_encode($query);
        }
	}
