<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Absensi_bulanan extends CI_Model {

		private $user, $db;
			
		public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetAbsensi($param) {
			$args = ["user_key" => $this->user->user_key, "db" => $this->db];

			if(!empty($param["filter"]["id"])) {
				$args["id"] = $param["filter"]["id"];
			}
			if(!empty($param["filter"]["tahun"])) {
				$args["tahun"] = $param["filter"]["tahun"];
			} else {
				return json_decode($this->foglobal->MakeJsonError("Silahkan Pilih Tahun Terlebih Dahulu"));
			}
			if(!empty($param["filter"]["bulan"])) {
				$args["bulan"] = $param["filter"]["bulan"];
			} else {
				return json_decode($this->foglobal->MakeJsonError("Silahkan Pilih Bulan Terlebih Dahulu"));
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"]))  $args["Page"] = $param["Page"]; //Limit

			$this->api->set("absensi/jurnal/list", $args);
			return $this->api->exec();
		}

		public function HtmlAbsensi($param) {
			$rHtml ="";

			$query = $this->GetAbsensi($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$bulan   = sprintf("%02d", $param["filter"]["bulan"]);
						$bln_thn = $param["filter"]["tahun"]."-".$bulan;

						$date_strtotime = strtotime($item->tgl_absensi);
						$date_check = date("Y-m", $date_strtotime);

						if($bln_thn == $date_check) {
							$button = (($item->hadir + $item->sakit + $item->ijin + $item->alpha) == 0) ? "<i class='fa fa-pencil'></i> Input Absen" : "<i class='fa fa-eye'></i> Lihat Absen";
							$rHtml .= '<tr>
							 				<td class="text-center">
	                                            <div class="btn-group">
	                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
	                                                <ul class="dropdown-menu">
	                                                	<li><a role="button" href="'.base_url("input_absensi_harian.html?tgl=".$item->tgl_absensi).'"><i class="fa fa-external-link"></i> Lihat Absensi</a></li>
	                                                </ul>
	                                            </div>
	                                        </td>
							 				<td><a href="'.base_url("input_absensi_harian.html?tgl=".$item->tgl_absensi).'">'.date_indo("d M Y", $date_strtotime).'</a></td>
	                                        <td>'.$item->hadir.'</td>
	                                        <td>'.$item->sakit.'</td>
	                                        <td>'.$item->ijin.'</td>
	                                        <td>'.$item->alpha.'</td>
	                                        <td>'.($item->sakit + $item->ijin + $item->alpha).'</td>
	                                        <td><a role="button" class="btn btn-primary" href="'.base_url("input_absensi_harian.html?tgl=".$item->tgl_absensi).'"><i class="fa fa-eye"></i> Lihat Absen</a></td>
	                                    </tr>';
	                    }
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

		public function HtmlDropdownTahun($param) {
			$rHtml ="";

			$query = $this->GetAbsensi($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						 $rHtml .= '<option value="' . $item->tahun_ajaran . '">' . $item->tahun_ajaran . '</option>';
					}
				} else {
					$rHtml = '<option>Tidak ada data</option>';
				}
			} else {
				$rHtml = '<option>' . $query->ErrMessage . '</option>';
			}

			$Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}
	}
