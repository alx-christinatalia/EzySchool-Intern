<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Model {

    private $user, $db;

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata("user");
        $this->db = $this->session->userdata("db");
        $this->load->model('Foglobal');
    }

    public function GetBerita($param) {
        $args = ["user_key" => $this->user->user_key, "db" => $this->db];

        if (!empty($param["filter"]["kywd"])) {
            $args["search"] = $param["filter"]["kywd"];
        }
        if (!empty($param["filter"]["id"])) {
            $args["id_berita"] = $param["filter"]["id"];
        }
        if (isset($param["filter"]["is_published"]) and $param["filter"]["is_published"] != "") {
            $args["is_published"] = $param["filter"]["is_published"];
        }

        //Default
        if (!empty($param["Sort"])) $args["Sort"] = $param["Sort"]; //Sorting
        else $args["Sort"] = "tgl_last_update desc";

        if (!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
        if (!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

        $this->api->set("berita/list", $args);
        return $this->api->exec();
    }

    public function HtmlBerita($param) {
        $rHtml = "";

        $query = $this->GetBerita($param);
        if ($query->IsError == false) {
            if (!empty($query->Data)) {
                foreach ($query->Data as $item) {
                    $is_published = ($item->is_published) ? "<i class='fa fa-check'></i>" : "<i class='fa fa-times'></i>";
                    $tgl_publish = ($item->tgl_publish != "0000-00-00 00:00:00") ? date_indo("d M Y H:i", strtotime($item->tgl_publish)) : "-";
                    $kategori = "";
                    if (empty($item->kategori)) {
                        $kategori = "-";
                    } else {
                        foreach ($item->kategori as $itemchild) {
                            $kategori .= "<span style='padding-bottom:0px;padding-top:0px;' class='label label-success label-sm'>" . $itemchild->nama . "</span> ";
                            $kategori .= (!empty($itemchild->nama)) ? "" : "";
                        }
                    }
                    $rHtml .= '<tr>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                            <ul class="dropdown-menu">
                                                <li><a role="button" class="detail-data" data-idupdate="' . $item->id . '"><i class="fa fa-external-link"></i> Lihat Detail</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a role="button" class="edit-data" data-idupdate="' . $item->id . '" href="' . base_url("berita/edit.html?id=" . $item->id . "") . '"><i class="fa fa-pencil"></i> Edit Berita</a></li>
                                                <li><a role="button" class="status-data" data-idupdate="' . $item->id . '" data-status="' . $item->is_published . '"><i class="fa fa-check-square-o"></i> Edit Publish</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td><a class="edit-data" data-idupdate="' . $item->id . '" href="' . base_url("berita/edit.html?id=" . $item->id . "") . '">' . $item->subyek . '</a></td>
                                    <td>' . $item->pegawai_nama . '</td>
                                    <td>' . $tgl_publish . '</td>
                                    <td>' . date_indo("d M Y H:i", strtotime($item->tgl_insert)) . '</td>
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

    public function InsertDataberita($data, $args) {
        $args = ["user_key" => $this->user->user_key,
            "db" => $this->db,
            "id_pegawai" => $data["id_pegawai"],
            "subyek" => $data["subyek"],
            "isi" => $data["isi"],
            "tgl_publish" => $data["tgl_publish"],
            "id_kategori" => $data["id_kategori"],
            "is_published" => $data["is_published"],
            "foto" => $data["foto"],
            "source" => $data["source"],
            "source_url" => $data["source_url"]
        ];
        $this->api->set("berita/add", $args);
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

    public function UploadFotoBerita($param) {
        $args = [
            "user_key" => $this->user->user_key,
            "db" => $this->db,
            "FolderName" => "image-berita"
        ];
        if(!empty($param["Base64"])) {
            $args["FileBase64"] = $param["Base64"];
        }
        if(!empty($param["OldPath"])) {
            $args["OldPath"] = $param["OldPath"];
        }
        $this->api->set("tools/upload/image", $args);
        return $this->api->exec("json");
    }

    public function UpdateBerita($id_update, $args) {
        $args['user_key'] = $this->user->user_key;
        $args["db"] = $this->db;
        $args['id_berita'] = $id_update;

        $this->api->set("berita/edit", $args);
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
                    case 'id_berita':
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

    public function GetBeritaBeranda($param) {
        $rHtml = "";

        $query = $this->GetBerita($param);
        if ($query->IsError == false) {
            if (!empty($query->Data)) {
                foreach ($query->Data as $item) {
                    $is_published = ($item->is_published) ? "<i class='fa fa-check'></i>" : "<i class='fa fa-times'></i>";
                    $foto = empty($item->foto) ? base_url("assets/img/default-news.jpg") : $this->Foglobal->ParseGambar($item->foto);
                    $tgl_publish = ($item->tgl_publish != "0000-00-00 00:00:00") ? date_indo("d M Y H:i", strtotime($item->tgl_publish)) : "-";
                    $foto_default = base_url('assets/img/default-news.jpg');

                    
                    $rHtml .= '
                    <div class="col-md-4 col-sm-6">
                        <div class="list-group-item" style="min-height:440px; margin-bottom:10px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-element-overlay">
                                        <div class="mt-overlay-1 ">
                                        <div class="cover-img">
                                            <img src="' . $foto . '" alt="image" onerror="this.src='."'".$foto_default."'".'">
                                            </div>
                                            <div class="mt-overlay">
                                                <ul class="mt-info">
                                                    <li>
                                                        <a class="btn default" href="' . base_url("berita/edit.html?id=" . $item->id . "") . '"><i class="fa fa-edit"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">   
                                    <div class="list-group-item-heading font-blue-soft bold">
                                        <a href="' . base_url("berita/edit.html?id=" . $item->id . "") . '"><h4 class="judul-berita bold ">' . $item->subyek . '</h4></a>
                                    </div>
                                    <h5><span class="label label-info"><i class="glyphicon glyphicon-calendar"></i> ' . $tgl_publish . '</span></h5>
                                   
                                    <div class="list-group-item-text" align="justify">  
                                        <p align="justify">' . $item->isi_cuplikan . '</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
            } else {
                $rHtml = "<div class='text-center col-xs-12'><span class='label label-warning'>Tidak ada data</span></div>";
            }
        } else {
            $rHtml = "<div class='text-center col-xs-12'><span class='label label-warning'>" . $query->ErrMessage . "</span></div>";
        }

        $Paging = (!empty($query->Paging)) ? $query->Paging : "";
        $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
        return json_encode($ReturnData);
    }
}