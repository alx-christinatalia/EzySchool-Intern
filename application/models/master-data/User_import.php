<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User_import extends CI_Model {
			
		private $user, $db;
      
    public function __construct() {
      parent::__construct();
      $this->user = $this->session->userdata("user");
      $this->db = $this->session->userdata("db");
    }

		public function GetPegawaiimport($param) {
      $args = [
        "user_key" => $this->user->user_key,
        "db" => $this->db
      ];
      if(!empty($param["filter"]["kywd"])) {
        $args["search"] = $param["filter"]["kywd"];
      }
      if(!empty($param["filter"]["ExcelPath"])) {
        $args["ExcelPath"] = $param["filter"]["ExcelPath"];
      }
      $this->api->set("tools/excel/reader", $args);
      return $this->api->exec();
    }

    public function HtmlPegawai($param) {
      $rHtml ="";

      $query = $this->GetPegawaiimport($param);
      if($query->IsError == false) {
        if(!empty($query->Data)) {
          foreach ($query->Data as $item) {
            $is_active = ($item->is_active) ? "<span class='label label-success'>Aktif</span>": "<span class='label label-danger'>Tidak Aktif</span>"; 
             $rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                    <li><a role="button" class="edit-data" data-idupdate="'.$item->nis.'"><i class="fa fa-pencil"></i> Edit Data</a></li>
                                                    <li><a role="button" class="status-data" data-idupdate="'.$item->nis.'" data-status="'.$item->is_active.'"><i class="fa fa-trash-o"></i> Hapus</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a href="'.base_url("ezy_sekolah/edit_siswa.html?nis=".$item->nis).'">'.$item->nis.'</a></td>
                                        <td>'.$item->nisn.'</td>
                                        <td>'.$item->nama.'</td>
                                        <td>'.$item->kelas_nama.'</td>
                                        <td>'.$item->jurusan_nama.'</td>
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

    public function UpdateDatasiswa($id_update, $param) {
            $param['user_key'] = $this->user->user_key;
            $param['db'] = $this->db;
            $param['nis'] = $id_update;

            $this->api->set("siswa/edit", $param);
            $query = $this->api->exec();
          if($query->IsError == true) {
            $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
            if($dataError) {
                switch ($matches[1][0]) {
                  case 'nis':
                    return $this->fodatasiswa->MakeJsonError("NIS Siswa tidak valid.");
                  break;
                  case 'user_key':
                    return $this->fodatasiswa->MakeJsonError("User Key tidak valid.");
                  break;
                }
            }
          }
        return json_encode($query);
        }
	}
