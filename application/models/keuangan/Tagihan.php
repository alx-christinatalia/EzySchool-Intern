<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class Tagihan extends CI_Model {

        private $user, $db;

        public function __construct() {
            parent::__construct();
            $this->user = $this->session->userdata("user");
            $this->db = $this->session->userdata("db");
        }

        public function GetTagihan($param) {
            $args = ["user_key" => $this->user->user_key, "db" => $this->db];

            if (!empty($param["filter"]["kywd"])) {
                $args["search"] = $param["filter"]["kywd"];
            }
            if (!empty($param["filter"]["id"])) {
                $args["id_tagihan"] = $param["filter"]["id"];
            }
            if (!empty($param["filter"]["id_kelas"])) {
                $args["id_kelas"] = $param["filter"]["id_kelas"];
            }
            if (!empty($param["filter"]["jns_kat"])) {
                $args["id_kategori"] = $param["filter"]["jns_kat"];
            }
            if (!empty($param["filter"]["jns_tag"])) {
                $args["jns_tagihan"] = $param["filter"]["jns_tag"];
            }
            if (isset($param["filter"]["is_published"]) and $param["filter"]["is_published"] != "") {
                $args["is_published"] = $param["filter"]["is_published"];
            }

            //Default
            if (!empty($param["Sort"])) $args["Sort"] = $param["Sort"]; //Sorting
            else $args["Sort"] = "tgl_insert desc";
             
            if (!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if (!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

            $this->api->set("tagihan/list", $args);
            return $this->api->exec();
        }

        public function GetTagihansiswaNoLimit($param, $disable_page=true) {
            $args = ["user_key" => $this->user->user_key, "db" => $this->db];

            if(!empty($param["nis"])) {
                $args["nis"] = $param["nis"];
            }
            if(!empty($param["jns_tagihan"])) {
                $args["jns_tagihan"] = $param["jns_tagihan"];
            }
            //Default
            if(!empty($param["Sort"]))  $args["Sort"] = $param["Sort"]; //Sorting
            if(!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
            if(!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

            $this->api->set("tagihan/list", $args, $disable_page);
            return $this->api->exec();
        }

        public function HtmlTagihan($param) {
            $rHtml = "";

            $query = $this->GetTagihan($param);
            if ($query->IsError == false) {
                if (!empty($query->Data)) {
                    foreach ($query->Data as $item) {
                        if($item->status == 2){
                            $status = "<span class='label' style='background-color: #4CAF50;'>Lunas</span>";
                        } else if($item->status == 1 ){
                            $status = "<span class='label label-warning'>Sudah Dibayar / Angsur</span>";
                        } else if($item->status == 0 && strtotime($item->tgl_jatuh_tempo) > time()){
                            $status = "<span class='label label-info'>Akan Datang</span>";
                        } else if($item->status == 0){
                            $status = "<span class='label label-danger'>Belum Dibayar</span>";
                        }
                        
                        if ($item->is_published == 1) {
                            $edit1 = "";
                            $edit2 = $item->nama;
                        } else {
                            $edit1 = "<li role='separator' class='divider'></li>
                                          <li><a role='button' class='edit-data' data-idupdate=" . $item->id_tagihan . "><i class='fa fa-pencil'></i> Edit Tagihan</a></li>";
                            $edit2 = "<a class='edit-data' data-idupdate=" . $item->id_tagihan . ">" . $item->nama . "</a>";
                        }
                        $is_published = ($item->is_published) ? "<i class='fa fa-check'></i>" : "<i class='fa fa-times'></i>";
                        $jumlah = ($item->jml - $item->jml_bayar);
                        $rHtml .= '
                            <tr>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                        <ul class="dropdown-menu">
                                                <li><a role="button" class="detail-data" data-idupdate="' . $item->id_tagihan . '" href="' . base_url("tagihan/detail.html?id=" . $item->id_tagihan . "") . '"><i class="fa fa-external-link"></i> Lihat Detail</a></li>
                                                ' . $edit1 . '
                                        </ul>
                                    </div>
                                </td>
                                <td><a class="detail-data" data-idupdate="' . $item->id_tagihan . '" href="' . base_url("tagihan/detail.html?id=" . $item->id_tagihan . "") . '">' . $item->id_tagihan . '</a></td>
                                <td>' . $edit2 . '</td>
                                <td> Rp. ' . $this->foglobal->formatAngka($jumlah) . '</td>
                                <td><a href="'.base_url("siswa/detail.html?nis=".$item->nis).'">'.$item->siswa_nama.'</a></td>
                                <td>' . date_indo("d M Y", strtotime($item->tgl_tagihan)) . '</td>
                                <td>' . date_indo("d M Y", strtotime($item->tgl_jatuh_tempo)) . '</td>
                                <td class="text-center">' . $status. '</td>
                                <td class="text-center">' . $is_published. '</td>
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

        public function InsertTagihanWithTarif($args) {
            $args['user_key'] = $this->user->user_key;
            $args["db"] = $this->db;

            if (!empty($args["jml"])) {
                $args["jml"] = str_replace(".", "", $args["jml"]);
            }
            if (!empty($args["tgl_tagihan"])) {
                $args["tgl_tagihan"] = date_indo("Y-m-d", $args["tgl_tagihan"]);
            }
            if (!empty($args["tgl_jatuh_tempo"])) {
                $args["tgl_jatuh_tempo"] = date_indo("Y-m-d", $args["tgl_jatuh_tempo"]);
            }

            $this->api->set("tagihan/add/withtarif", $args);
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
                        case 'id_tagihan':
                            return $this->foglobal->MakeJsonError("ID Tagihan tidak valid.");
                            break;
                        case 'nis':
                            return $this->foglobal->MakeJsonError("NIS tidak valid.");
                            break;
                        case 'id_kategori':
                            return $this->foglobal->MakeJsonError("Kategori tidak valid.");
                            break;
                        case 'jml':
                            return $this->foglobal->MakeJsonError("Jumlah tidak valid.");
                            break;
                        case 'tgl_tagihan':
                            return $this->foglobal->MakeJsonError("Tanggal Tagihan tidak valid.");
                            break;
                        case 'tgl_jatuh_tempo':
                            return $this->foglobal->MakeJsonError("Tanggal Jatuh Tempo tidak valid.");
                            break;
                        case 'tgl_telat':
                            return $this->foglobal->MakeJsonError("Tanggal Telat tidak valid.");
                            break;
                    }
                }
            }
            return json_encode($query);
        }

        public function InsertTagihanRepeat($args) {
            $args['user_key'] = $this->user->user_key;
            $args["db"] = $this->db;

            if (!empty($args["jml"])) {
                $args["jml"] = str_replace(".", "", $args["jml"]);
            }
            if (!empty($args["tgl_tagihan"])) {
                $args["tgl_tagihan"] = date_indo("Y-m-d", $args["tgl_tagihan"]);
            }
            if (!empty($args["tgl_jatuh_tempo"])) {
                $args["tgl_jatuh_tempo"] = date_indo("Y-m-d", $args["tgl_jatuh_tempo"]);
            }

            $this->api->set("tagihan/add", $args);
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
                        case 'id_tagihan':
                            return $this->foglobal->MakeJsonError("ID Tagihan tidak valid.");
                            break;
                        case 'nis':
                            return $this->foglobal->MakeJsonError("NIS tidak valid.");
                            break;
                        case 'id_kategori':
                            return $this->foglobal->MakeJsonError("Kategori tidak valid.");
                            break;
                        case 'jml':
                            return $this->foglobal->MakeJsonError("Jumlah tidak valid.");
                            break;
                        case 'tgl_tagihan':
                            return $this->foglobal->MakeJsonError("Tanggal Tagihan tidak valid.");
                            break;
                        case 'tgl_jatuh_tempo':
                            return $this->foglobal->MakeJsonError("Tanggal Jatuh Tempo tidak valid.");
                            break;
                        case 'tgl_telat':
                            return $this->foglobal->MakeJsonError("Tanggal Telat tidak valid.");
                            break;
                    }
                }
            }
            return json_encode($query);
        }

        public function UpdateTagihan($id_update, $args) {
            $args['user_key'] = $this->user->user_key;
            $args["db"] = $this->db;
            $args['id_tagihan'] = $id_update;
            
            if (!empty($args["tgl_tagihan"])) {
                $args["tgl_tagihan"] = date_indo("Y-m-d", $args["tgl_tagihan"]);
            }
            if (!empty($args["tgl_jatuh_tempo"])) {
                $args["tgl_jatuh_tempo"] = date_indo("Y-m-d", $args["tgl_jatuh_tempo"]);
            }

            $this->api->set("tagihan/edit", $args);
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
                        case 'id_tagihan':
                            return $this->foglobal->MakeJsonError("ID Tagihan tidak valid.");
                            break;
                        case 'is_published':
                            return $this->foglobal->MakeJsonError("Status tidak valid.");
                            break;
                        case 'tgl_tagihan':
                            return $this->foglobal->MakeJsonError("Tanggal Tagihan tidak valid.");
                            break;
                        case 'tgl_jatuh_tempo':
                            return $this->foglobal->MakeJsonError("Tanggal Jatuh Tempo tidak valid.");
                            break;
                        case 'tgl_telat':
                            return $this->foglobal->MakeJsonError("Tanggal Telat tidak valid.");
                            break;
                    }
                }
            }
            return json_encode($query);
        }
    }
