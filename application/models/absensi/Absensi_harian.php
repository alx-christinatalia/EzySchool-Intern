<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Absensi_harian extends CI_Model {

		private $user, $db;
			
		public function __construct() {
	      	parent::__construct();
	      	$this->user = $this->session->userdata("user");
	      	$this->db = $this->session->userdata("db");
	    }

		public function GetAbsensiHari($param) {
			$args['user_key'] = $this->user->user_key;
        	$args["db"] = $this->db;
			if(!empty($param["filter"]["id"])) {
				$args["id"] = $param["filter"]["id"];
			}
			if(!empty($param["filter"]["tgl_jurnal"])) {
				$args["tgl_jurnal"] = date_indo("Y-m-d", $param["filter"]["tgl_jurnal"]);
			} 
			if(!empty($param["filter"]["id_kelas"])) {
				$args["id_kelas"] = $param["filter"]["id_kelas"];
			}
			if(!empty($param["filter"]["id_jurusan"])) {
				$args["id_jurusan"] = $param["filter"]["id_jurusan"];
			}

			//Default
			if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) {
            	$args["Page"] = $param["Page"]; //Limit
            } else {
            	$args["Page"] = 1;
            }

			$this->api->set("absensi/jurnal/kelas", $args);
			return $this->api->exec();
		}

		public function HtmlAbsensiHari($param) {
			$rHtml ="";

			$query = $this->GetAbsensiHari($param);
			if($query->IsError == false) {
				if(!empty($query->Data)) {
					foreach ($query->Data as $item) {
						$button = ($item->is_terabsen == 0) ? "<i class='fa fa-pencil'></i> Input Absen" : "<i class='fa fa-eye'></i> Lihat Absen";
						 $rHtml .= '<tr>
						 				<td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                	<li><a role="button" href="'.base_url("input_absensi.html?kls=".$item->id_kelas).'&tgl='.date_indo("Y-m-d", strtotime($param["filter"]["tgl_jurnal"])).'"><i class="fa fa-external-link"></i> Lihat Absensi</a></li>
                                                </ul>
                                            </div>
                                        </td>
						 				<td><a href="'.base_url("input_absensi.html?kls=".$item->id_kelas).'&tgl='.date_indo("Y-m-d", $param["filter"]["tgl_jurnal"]).'">'.$item->kelas_nama.'</a></td>
						 				<td>'.$item->hadir.'</td>
                                        <td>'.$item->sakit.'</td>
                                        <td>'.$item->ijin.'</td>
                                        <td>'.$item->alpha.'</td>
                                        <td>'.($item->sakit + $item->ijin + $item->alpha).'</td>
                                        <td><a role="button" class="btn btn-primary" href="'.base_url("input_absensi.html?kls=".$item->id_kelas).'&tgl='.date_indo("Y-m-d", $param["filter"]["tgl_jurnal"]).'">'.$button.'</a></td>
                                    </tr>';
					}
				} else {
					$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning'>Silahkan Tambah Periode Absensi Bulan Ini</span></td></tr>";
				}
			} else {
				$rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning'>".$query->ErrMessage."</span></td></tr>";
			}

			$Paging = (!empty($query->Paging)) ? $query->Paging : "";
            $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
            return json_encode($ReturnData);
		}
	}
