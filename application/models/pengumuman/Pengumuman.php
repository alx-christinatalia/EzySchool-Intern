<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Model {

    private $user, $db;

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata("user");
        $this->db = $this->session->userdata("db");
    }

    public function GetPengumuman($param) {
        $args = ["user_key" => $this->user->user_key, "db" => $this->db];

        if (!empty($param["filter"]["kywd"])) {
            $args["search"] = $param["filter"]["kywd"];
        }
        if (!empty($param["filter"]["id"])) {
            $args["id_pengumuman"] = $param["filter"]["id"];
        }
        if (isset($param["filter"]["is_published"]) and $param["filter"]["is_published"] != "") {
            $args["is_published"] = $param["filter"]["is_published"];
        }

        //Default
        if (!empty($param["Sort"])) $args["Sort"] = $param["Sort"]; //Sorting
        else $args["Sort"] = "tgl_last_update desc";

        if (!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
        if (!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

        $this->api->set("pengumuman/list", $args);
        return $this->api->exec();
    }

    public function HtmlPengumuman($param) {
        $rHtml = "";

        $query = $this->GetPengumuman($param);
        if ($query->IsError == false) {
            if (!empty($query->Data)) {
                foreach ($query->Data as $item) {
                    $is_published = ($item->is_published) ? "<i class='fa fa-check'></i>" : "<i class='fa fa-times'></i>";
                    $tgl_eksekusi = ($item->tgl_eksekusi != "0000-00-00 00:00:00") ? date_indo("d M Y H:i", strtotime($item->tgl_eksekusi)) : "-";
                    $kategori = "";
                    foreach ($item->kategori as $itemchild) {
                        $kategori .= "<span style='padding-bottom:0px;padding-top:0px;' class='label label-success label-sm'>" . $itemchild->nama . "</span> ";
                        $kategori .= (!empty($itemchild->nama)) ? "" : "";
                    }
                    // perbaikan: penambahan href pada tag <a>
                    $rHtml .= '<tr>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                                <ul class="dropdown-menu">
                                                	<li><a role="button" class="detail-data" data-idupdate="' . $item->id . '"><i class="fa fa-external-link"></i> Lihat Detail</a></li>
                                                   	<li role="separator" class="divider"></li>
                                                    <li><a role="button" class="edit-data" data-idupdate="' . $item->id . '" href="' . base_url("pengumuman/edit.html?id=" . $item->id . "") . '"><i class="fa fa-pencil"></i> Edit Pengumuman</a></li>
                                                    <li><a role="button" class="status-data" data-idupdate="' . $item->id . '" data-status="' . $item->is_published . '"><i class="fa fa-check-square-o"></i> Edit Publish</a></li>
                                                </ul>
                                            </div>
                                        </td>                                        
                                        <td><a class="edit-data" data-idupdate="' . $item->id .  '" href="' . base_url("pengumuman/edit.html?id=" . $item->id . "") . '">' . $item->subyek . '</a></td>
                                        <td>' . $item->pegawai_nama . '</td>
                                        <td>' . $tgl_eksekusi . '</td>
                                        <td>' . date_indo("d M Y H:i", strtotime($item->tgl_last_update)) . '</td>
                                        <td>' . $kategori . '</td>
                                        <td class="text-center">' . $is_published . '</td>
                                    </tr>';
                }
            } else {
                $rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning'>Tidak ada data</span></td></tr>";
            }
        } else {
            $rHtml = "<tr><td colspan='10' class='text-center'><span class='label label-warning'>" . $query->ErrMessage . "</span></td></tr>";
        }

        $Paging = (!empty($query->Paging)) ? $query->Paging : "";
        $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
        return json_encode($ReturnData);
    }

    public function InsertDatapengumuman($data, $args) {
        $args = ["user_key" => $this->user->user_key,
            "db" => $this->db,
            "id_pegawai" => $data["id_pegawai"],
            "subyek" => $data["subyek"],
            "pesan" => $data["pesan"],
            "tgl_eksekusi" => $data["tgl_eksekusi"],
            "id_kategori" => $data["id_kategori"],
            "jns_penerima" => $data["jns_penerima"],
            "penerima" => $data["penerima"],
            "is_published" => $data["is_published"]
        ];
        $this->api->set("pengumuman/add", $args);
        $query = $this->api->exec();

        if ($query->IsError == true) {
            $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
            if ($dataError) {
                switch ($matches[1][0]) {
                    case 'nis':
                        return $this->foglobal->MakeJsonError("NIS tidak valid.");
                        break;
                    case 'nama':
                        return $this->foglobal->MakeJsonError("Nama tidak valid.");
                        break;
                }
            }
        }
        return json_encode($query);
    }

    public function UpdatePengumuman($id_update, $param) {
        $param['user_key'] = $this->user->user_key;
        $param["db"] = $this->db;
        $param['id_pengumuman'] = $id_update;

        $this->api->set("pengumuman/edit", $param);
        $query = $this->api->exec();

        if ($query->IsError == true) {
            $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
            if ($dataError) {
                switch ($matches[1][0]) {
                    case 'user_key':
                        return $this->foglobal->MakeJsonError("User Key tidak valid.");
                        break;
                    case 'db':
                        return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
                        break;
                    case 'id_pengumuman':
                        return $this->foglobal->MakeJsonError("ID tidak valid.");
                        break;
                    case 'is_published':
                        return $this->foglobal->MakeJsonError("Status tidak valid.");
                        break;
                }
            }
        }
        return json_encode($query);
    }

    public function GetPengumumanBeranda($param) {
        $rHtml = "";

        $query = $this->GetPengumuman($param);
        if ($query->IsError == false) {
            if (!empty($query->Data)) {
                foreach ($query->Data as $item) {
                    $is_published = ($item->is_published) ? "<i class='fa fa-check'></i>" : "<i class='fa fa-times'></i>";
                    $tgl_eksekusi = ($item->tgl_eksekusi != "0000-00-00 00:00:00") ? date_indo("d M Y H:i", strtotime($item->tgl_eksekusi)) : "-";
                    $rHtml .= '
                        <a href="' . base_url("pengumuman/edit.html?id=" . $item->id . "") . '" class="list-group-item">
                            <h5 class="list-group-item-heading font-blue-soft bold"> 
                               ' . $item->subyek . '
                            </h5>
                            <p class="list-group-item-text" align="justify">  
                               ' . $item->pesan_cuplikan . ' <br>
                                
                            </p>
                            <h6 class="font-blue-soft"> <i class="fa fa-calendar"></i> ' . $tgl_eksekusi . ' </h6>
                        </a>    
                        ';
                }
            } else {
                $rHtml = "<div class='text-center col-xs-12'><span class='label label-warning'>Tidak ada pengumuman</span></div>";
            }
        } else {
            $rHtml = "<div class='text-center col-xs-12'><span class='label label-warning'>" . $query->ErrMessage . "</span></div>";
        }
        
        $Paging = (!empty($query->Paging)) ? $query->Paging : "";
        $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
        return json_encode($ReturnData);
    }

}
