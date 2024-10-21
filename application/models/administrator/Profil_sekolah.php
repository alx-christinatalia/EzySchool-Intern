<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_sekolah extends CI_Model {

    private $user, $db;

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata("user");
        $this->db = $this->session->userdata("db");
    }

    public function GetProfil($param) {
        $args = ["user_key" => $this->user->user_key, "db" => $this->db];

        $this->api->set("setting/profil/show", $args);
        return $this->api->exec();
    }

    public function GetProfil2($param) {
        $this->api->set("setting/profil/show", $param);
        return $this->api->exec();
    }

    public function UploadImage($param) {
        $param['user_key'] = $this->user->user_key;
        $param['FolderName'] = "image-sekolah";
        $param['db'] = $this->db;
        

        if (!empty($param["Base64"])) {
            $param["FileBase64"] = $param["Base64"];
        }
        if (!empty($param["OldPath"])) {
            $param["OldPath"] = $param["OldPath"];
        }

        $this->api->set("tools/upload/image", $param);
        return $this->api->exec("json");
    }

    public function UpdateProfil($id_update, $args) {
        $args["user_key"] = $this->user->user_key;
        $args["db"] = $id_update;

        if ($args["logo"] == "") {
            $args["logo"] = "default.png";
        }

        if ($args["kepsek_foto"] == "") {
            $args["kepsek_foto"] = "default.png";
        }

        $this->api->set("setting/profil/edit", $args);
        $query = $this->api->exec();
        if ($query->IsError == true) {
            $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
            if ($dataError) {
                switch ($matches[1][0]) {
                    case 'id_sekolah':
                        return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
                        break;
                    case 'id_mesin_server':
                        return $this->foglobal->MakeJsonError("Server tidak valid.");
                        break;
                    case 'id_mesin_finger':
                        return $this->foglobal->MakeJsonError("Unique ID tidak valid.");
                        break;
                    case 'user_key':
                        return $this->foglobal->MakeJsonError("User Key tidak valid.");
                        break;
                }
            }
        } else {
            // unset ($this->session->userdata("sekolah"));
            $dt_sklh["user_key"] = $this->user->user_key;
            $dt_sklh["db"] = $id_update;
            $data_sekolah = $this->GetProfil2($dt_sklh);
            $this->session->set_userdata(["sekolah" => $data_sekolah]);
        }
        return json_encode($query);
    }

}
