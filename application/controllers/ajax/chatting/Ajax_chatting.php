<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_chatting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("chatting/chat");
    }

    public function index() {
        if($this->input->is_ajax_request() and $this->input->post("act") and !empty($this->session->userdata("user"))) {
            if(method_exists($this, $this->input->post("act"))) {
                $act = $this->input->post("act");
                $this->req  = $this->input->post("req");
                $this->form = $this->input->post("form");
                print_r($this->$act());
            } else {
                print_r($this->api->msg(true, "Invalid Method"));
            }
        } else {
            print_r($this->api->msg(true, "Invalid Request"));
        }
    }

    private function listroom() {
        $this->req["Sort"] = "psn_from_pegawai asc, tgl_psn_terakhir desc";
        $Request = $this->chat->HtmlRoomList($this->req);
        return $Request;
    }

    private function listchat() {
        $this->req["Sort"] = "tgl_kirim desc";
        $Request = $this->chat->HtmlChatList($this->req);
        return $Request;
    }

    private function listuser() {
         $Request = $this->chat->HtmlUserList($this->req);
        return $Request;
    }

    private function addchat() {
        $Request = $this->chat->AddChat($this->req);
        return $Request;
    }

    private function totalunread() {
        $Request = $this->chat->GetTotalUnread($this->req);
        return $Request;
    }
}
