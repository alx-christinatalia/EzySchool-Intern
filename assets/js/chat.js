var id_room, no_induk, search;
var lock_paging_chat = false, total_page_chat = 1, page = 1, interval_chat = 0;
var lock_paging_room = false, total_page_room = 1, page_room = 1, interval_room = 0;

$(document).ready(function() {
	GetListRoom(true);
    GetChatRoom(true);

    console.log("Close Interval ID (Room): "+interval_room);
    clearInterval(interval_room);
    interval_room = setInterval(function() {
        page = 1;
        GetListRoom();

        console.log("Interval ID (Room): "+interval_room);
    }, 5000);

    $("#slimtest1").on("scroll", function() {
        var tinggi1 = $(this)[0].scrollHeight, tinggi2 = $(this).height();
        var total = (tinggi1 - tinggi2);

        var scroll = $(this).scrollTop();  
        if (scroll == total) {
            page_room = (page_room + 1);
            if(!lock_paging_room && page_room <= total_page_room) {
                lock_paging_room = true;

                $(".daftar-room").append(ChatLoader());
                GetListRoom("", true);
            }
        }

        if(scroll > 0 && interval_room != 0) {
            console.log("Close Interval ID (Room): "+interval_room);
            clearInterval(interval_room);

            interval_room = 0;
        }

        if(scroll == 0 && interval_room == 0) {
            interval_room = setInterval(function() {
                lock_paging_room = true;

                page_room = 1;
                GetListRoom();

                console.log("Interval ID (Room): "+interval_room);
            }, 5000);
        }
    });

    $("#slimtest2").on("scroll", function() {
        var tinggi1 = $(this)[0].scrollHeight, tinggi2 = $(this).height();
        var total = (tinggi1 - tinggi2);

        var scroll = $(this).scrollTop(); 
        if (scroll == 0) {
            page = (page + 1);
            if(!lock_paging_chat && page <= total_page_chat) {
                lock_paging_chat = true;

                $(".daftar-chat").prepend(ChatLoader());
                GetChatRoom(true);
            }
        }

        if(scroll < total && interval_chat != 0) {
            console.log("Close Interval ID (Chat): "+interval_chat);
            clearInterval(interval_chat);

            interval_chat = 0;
        }

        if(scroll == total && interval_chat == 0) {
            interval_chat = setInterval(function() {
                page = 1;
                GetChatRoom();

                console.log("Interval ID (Chat): "+interval_chat);
            }, 10000);
        }
    });

    //Search Room
    $("#FrmSearchRoom").submit(function() {
        $(".daftar-room").html("");
        $(".search").focus();

        page_room = 1;
        search = $(this).find(".search").val();
        GetListRoom(true);

        return false;
    });

    //Add Chat
    $("#FrmChatAdd").submit(function() {
        lock_paging_room = true;
        lock_paging_chat = true;

        var value = $(this).find(".pesan").val();

        AddChat(value);
        $(this).find(".pesan").val("");

        page_room = 1;
        GetListRoom();

        return false;
    });

    $("#FrmSearchRoom .input-icon").on("click", ".icon-close", function() {
        $(".daftar-room").html("");
        $(".search").focus();

        $("#FrmSearchRoom .input-icon i").removeClass("icon-close")
        $("#FrmSearchRoom .input-icon i").addClass("icon-magnifier");
        $(".search").val("");

        search = "";
        GetListRoom();        
    });

    $(".daftar-room").on("click", ".ktk", function() {
        lock_paging_chat= true;

        id_room = $(this).attr("data-id_room");
        var nama    = $(this).find(".siswa").html();
        var alamat  = $(this).attr("data-alamat");
        var kelas   = $(this).attr("data-kelas");
        var nis = $(this).attr("data-nis");

        $(".daftar-chat").html(ChatLoader());

        page = 1;
        GetChatRoom();

        console.log("Close Interval ID (Chat): "+interval_chat);
        clearInterval(interval_chat);
        interval_chat = setInterval(function() {
            page = 1;
            GetChatRoom();

            console.log("Interval ID (Chat): "+interval_chat);
        }, 10000);

        $(".n_induk").val(nis);
        $(".pesan").prop("disabled", false).focus();
        $(".refresh-data").removeClass("disabled");
        $(".title .nama-siswa").html(nama);
        $(".title .kelas-alamat").html("("+ nis +") " + kelas+" - "+alamat);
    });

    $("#pilihsiswa").on("shown.bs.modal", function() {
        $(".kywd").focus();
    });

    $(".list-group-siswa").on("click", ".pilih-siswa-baru", function() {
        lock_paging_chat = true;
        id_room  = "";
        no_induk = "";

        console.log("Close Interval ID: "+interval_chat);
        clearInterval(interval_chat);

        var nama    = $(this).attr("data-nama");
        var alamat  = $(this).attr("data-alamat");
        var kelas   = $(this).attr("data-kelas");
        no_induk    = $(this).attr("data-nis");

        $(".n_induk").val(no_induk);
        $(".pesan").prop("disabled", false).focus();
        $(".refresh-data").removeClass("disabled");
        $(".title .nama-siswa").html(nama);
        $(".title .kelas-alamat").html("("+ no_induk +") " + kelas+" - "+alamat);
        $(".daftar-chat").html('<div class="bg-blue notfound">Silahkan Kirim Pesan untuk Memulai</div>');

        $("#pilihsiswa .close").click();
        $(".pesan").focus();
    });
});

$(".pesan-baru").click(function() {
    resetformvalue("#SetFrmSiswa");
    
    pagename = "chatting/ajax-chatting.html";
    request["Page"] = 1;
    SetGetData(request, "listuser", "", ".list-group-siswa");
    getdatadropdownkelas2();
    $("#pilihsiswa").modal("show");
});

$(".search").keyup(function() {
    var value = $(this).val();
        value = value.length;

    if(value > 0) {
        $("#FrmSearchRoom .input-icon i").removeClass("icon-magnifier")
        $("#FrmSearchRoom .input-icon i").addClass("icon-close");
    } else {
        $("#FrmSearchRoom .input-icon i").removeClass("icon-close")
        $("#FrmSearchRoom .input-icon i").addClass("icon-magnifier");
    }
});

$(".refresh-data").click(function() {
    var selector = $(this);

    selector.addClass("disabled");
    setTimeout(function() {
        page = 1; page_room = 1;

        GetListRoom();
        GetChatRoom();

        $(".pesan").focus();
        selector.removeClass("disabled");
    }, 500);
});

$("#SetFrmSiswa").submit(function() {
    var kywd = $(this).find(".kywd").val();

    request["filter"]["kywd"] = kywd;
    SetGetData(request, act, getfunc, ".list-group-siswa");
    return false;
});

$(".btn.siswanext").click(function() {
    request["Page"] = datanext;
    SetGetData(request, act, getfunc, ".list-group-siswa");

    $(".kywd").focus();
});

$(".btn.siswaprev").click(function() {
    request["Page"] = dataprev;
    SetGetData(request, act, getfunc, ".list-group-siswa");

    $(".kywd").focus();
});

function GetListRoom(loader = false, next_page = false) {
    if(loader) $(".daftar-room").html(ChatLoader());

    $.ajax({
        type: "POST",
        url: base_url + "/ajax/chatting/ajax-chatting.html",
        data: {act:"listroom", req: {"kywd": search, "Page": page_room}},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            lock_paging_room = false;
            
            if(!empty(resp.paging)) {
                total_page_room = resp.paging.JmlHalTotal;
            } else {
                total_page_room = 1;
            }

            if(!next_page) {
                $(".daftar-room").html(resp.lsdt);
            } else {
                $(".daftar-room").append(resp.lsdt);
            }

            $(".loader").remove();
        },
        error: function(xhr, textstatus, errorthrown) {
            if(textstatus == "timeout") {
                this.tryCount++;
                if(this.tryCount <= this.retryLimit) {
                    $.ajax(this);
                }
            }
        }
    });
}

function GetChatRoom(next_page = false) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/chatting/ajax-chatting.html",
        data: {act:"listchat", req: {"id_room": id_room, "Page": page}},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){ 
            lock_paging_chat = false;
            
            if(!empty(resp.paging)) {
                total_page_chat = resp.paging.JmlHalTotal;
            } else {
                total_page_chat = 1;
            }

            if(!next_page) {
                $(".daftar-chat").html(resp.lsdt);

                var tinggi = $("#slimtest2").prop("scrollHeight") + "px";
                $("#slimtest2").slimScroll({
                    scrollTo: tinggi,
                    height: "auto",
                    size: "5px",
                    wheelStep: 5,
                    start: "bottom",
                    alwaysVisible: true
                });
            } else {
                $(".loader").remove();
                $(".daftar-chat").prepend(resp.lsdt);
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(textstatus == "timeout") {
                this.tryCount++;
                if(this.tryCount <= this.retryLimit) {
                    $.ajax(this);
                }
            }
        }
    });
}

function AddChat(message) {
    var data;
    if(!empty(id_room)) data = {"id_room": id_room, "message": message, "n_induk": $(".n_induk").val()};
    else data = {"nis": no_induk, "message": message}

    $.ajax({
        type: "POST",
        url: base_url + "/ajax/chatting/ajax-chatting.html",
        data: {act:"addchat", req: data},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(!empty(no_induk)) {
                no_induk = "";
                id_room  = resp.Output;

                interval_chat = setInterval(function() {
                    page = 1;
                    GetChatRoom();

                    console.log("Interval ID: "+interval_chat);
                }, 10000);
            }
            
            page = 1;
            GetChatRoom();
        },
        error: function(xhr, textstatus, errorthrown) {
            if(textstatus == "timeout") {
                this.tryCount++;
                if(this.tryCount <= this.retryLimit) {
                    $.ajax(this);
                }
            }
        }
    });
}

function ChatLoader() {
    var html  = "";
        html += '<div class="text-center loader" style="padding: 10px 0px 10px 0px;">';
        html += '<img src="'+base_url+'/assets/img/loading_2.gif" alt="Loading ..." style="width: 30px;">';
        html += '</div>';

    return html;
}

