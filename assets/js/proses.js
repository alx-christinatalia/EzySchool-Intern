var base_url = location.origin,
pagename = "", cdn_url = "http://cdn.ezyschool.id";
//var base_url = location.origin + "/ezyschool-sekolah2",
//pagename = "", cdn_url = location.origin+"/ezyschool-cdn";
//pagename = "", cdn_url = "http://dev.cdn.ezyschool.id";
//pagename = "", cdn_url = "http://localhost:8080/ezyschool-cdn"; 

var datanext = 0, dataprev = 0;
var request  = {"filter": {"kywd": ""}};
var act = "", getfunc = "", interval_total_chat;
var l = $(".ladda-button-submit").ladda();

$(document).ready(function() {
    moment.locale("id"); //Set Moment Laguage ke Indonesia
    if(jQuery().select2) {
        $(".select2-normal").select2();
        $(".select2-nosearch").select2({
            minimumResultsForSearch: Infinity
        });
        $(".select2-notambah").on("select2:open", function (e) { 
            $('.tambahdata').attr('style', "display:none;");
            $('.margintambahdata').attr('style', "margin-bottom:0px;");
        });
    }

    GetTotalChatUnread();
    interval_total_chat = setInterval(function() {
        GetTotalChatUnread();

        console.log("Interval ID (Total Unread): "+interval_total_chat);
    }, 5000);
});

function getdatadropdownprovinsi(selected = "", func = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/master-data/ajax-provinsi.html",
        data: {act:"listdropdownprovinsi"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Provinsi</option>";
                    result += resp.lsdt;
                
                $(".dropdown-provinsi").html(result);

                if(selected != "") {
                    $(".dropdown-provinsi").val(selected).trigger("change");
                }

                if(!empty(func)) {
                    func(resp);
                }
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

function getdatadropdownkotakab(id_prov, selected = "", func = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/master-data/ajax-kotakab.html",
        data: {act:"listdropdownkotakab", req: {"id_prov": id_prov}},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Kota/Kabupaten</option>";
                    result += resp.lsdt;
                
                $(".dropdown-kotakab").html(result);

                if(selected != "") {
                    $(".dropdown-kotakab").val(selected).trigger("change");
                }

                if(!empty(func)) {
                    func(resp);
                }
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

function getdatadropdownkecamatan(id_kota, selected = "", func = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/master-data/ajax-kecamatan.html",
        data: {act:"listdropdownkecamatan", req: {"id_kota": id_kota}},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Kecamatan</option>";
                    result += resp.lsdt;
                
                $(".dropdown-kecamatan").html(result);

                if(selected != "") {
                    $(".dropdown-kecamatan").val(selected).trigger("change");
                }
                if(!empty(func)) {
                    func(resp);
                }
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

function getdatadropdownserver(selected = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/administrator/ajax-mesin-server.html",
        data: {act:"listdropdownserver"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Server</option>";
                    result += resp.lsdt;
                
                $(".dropdown-server").html(result);

                if(selected != "") {
                    $(".dropdown-server").val(selected).trigger("change");
                }
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

function getdatadropdownkelas(selected = "", lastchild) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/master-data/ajax-kelas.html",
        data: {act:"listdropdownkelas"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Kelas</option>";
                    result += resp.lsdt;
                if(lastchild!="true"){
                    $(".dropdown-kelas").html(result);

                    if(selected != "") {
                      $(".dropdown-kelas").val(selected).trigger("change");
                    }
                }
                if(lastchild=="true"){
                    $(".mt-repeater-item:last-child .dropdown-kelas").html(result);

                    if(selected != "") {
                      $(".mt-repeater-item:last-child .dropdown-kelas").val(selected).trigger("change");
                    }
                }
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

function getdatadropdownkelas2(selected = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/master-data/ajax-kelas.html",
        data: {act:"listdropdownkelas"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Semua Kelas</option>";
                    result += resp.lsdt;
                
                $(".dropdown-kelas").html(result);

                if(selected != "") {
                  $(".dropdown-kelas").val(selected).trigger("change");
                }
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

function getdatadropdownkelas3(selected = "", with_firstoption = true) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/master-data/ajax-kelas.html",
        data: {act:"listdropdownkelas"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result;
                if(with_firstoption == true) {
                    result = "<option value=''>Pilih Kelas</option>";
                }
                result += resp.lsdt;
                
                $(".dropdown-kelas3").html(result);

                if(selected != "") {
                  $(".dropdown-kelas3").val(selected).trigger("change");
                }
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

function getdatadropdownsiswa(selected = "", kelas) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/master-data/ajax-siswa.html",
        data: {act:"listdropdownsiswa", req: {"kelas": kelas}},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Siswa</option>";
                    result += resp.lsdt;
                
                $(".dropdown-siswa").html(result);

                if(selected != "") {
                    $(".dropdown-siswa").val(selected).trigger("change");
                }
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

function getdatadropdownsiswa2(selected = "", kelas) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/master-data/ajax-siswa.html",
        data: {act:"listdropdownsiswa", req: {"kelas": kelas}},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Siswa</option>";
                    result += resp.lsdt;
                
                $(".dropdown-siswa2").html(result);

                if(selected != "") {
                    $(".dropdown-siswa2").val(selected).trigger("change");
                }
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

function getdatadropdownkategori(selected = "", jns_kat) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/kategori/ajax-kategori.html",
        data: {act:"listdropdown", req: jns_kat},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Kategori</option>";
                    result += resp.lsdt;
                
                $(".dropdown-kategori").html(result);

                if(selected != "") {
                    $(".dropdown-kategori").val(selected).trigger("change");
                }
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

function getdatadropdownkategori2(selected = "", jns_kat) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/kategori/ajax-kategori.html",
        data: {act:"listdropdown", req: jns_kat},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "";
                    result += resp.lsdt;
                
                $(".dropdown-kategori").html(result);

                if(selected != "") {
                    $(".dropdown-kategori").val(selected).trigger("change");
                }
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

function getdatadropdownkategori3(selected = "", jns_kat) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/kategori/ajax-kategori.html",
        data: {act:"listdropdown", req: jns_kat},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Kategori</option>";
                    result += resp.lsdt;
                
                $(".dropdown-kategori3").html(result);

                if(selected != "") {
                    $(".dropdown-kategori3").val(selected).trigger("change");
                }
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

function getdatadropdownkattagihan(selected = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/keuangan/ajax-kategori-tagihan.html",
        data: {act:"listdropdown"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Kategori</option>";
                    result += resp.lsdt;
                
                $(".dropdown-kattagihan").html(result);

                if(selected != "") {
                  $(".dropdown-kattagihan").val(selected).trigger("change");
                }
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

function getdatadropdownkattagihan2(selected = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/keuangan/ajax-kategori-tagihan.html",
        data: {act:"listdropdown"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Semua Kategori</option>";
                    result += resp.lsdt;
                
                $(".dropdown-kattagihan2").html(result);

                if(selected != "") {
                  $(".dropdown-kattagihan2").val(selected).trigger("change");
                }
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

function getdatadropdownpegawai(selected = "", lastchild) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/administrator/ajax-user.html",
        data: {act:"listdropdown"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Pengguna</option>";
                    result += resp.lsdt;
                if(lastchild!="true"){
                    $(".dropdown-pegawai").html(result);
                    if(selected != "") {
                      $(".dropdown-pegawai").val(selected).trigger("change");
                    }
                }
                if(lastchild=="true"){
                    $(".mt-repeater-item:last-child .dropdown-pegawai").html(result);
                    if(selected != "") {
                      $(".mt-repeater-item:last-child .dropdown-pegawai").val(selected).trigger("change");
                    }
                }
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

function getdatadropdownpegawai2(selected = "", lastchild) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/administrator/ajax-user.html",
        data: {act:"listdropdown"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Wali Kelas</option>";
                    result += resp.lsdt;
                if(lastchild!="true"){
                    $(".dropdown-pegawai2").html(result);
                    if(selected != "") {
                      $(".dropdown-pegawai2").val(selected).trigger("change");
                    }
                }
                if(lastchild=="true"){
                    $(".mt-repeater-item:last-child .dropdown-pegawai2").html(result);
                    if(selected != "") {
                      $(".mt-repeater-item:last-child .dropdown-pegawai2").val(selected).trigger("change");
                    }
                }
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

function getdatadropdownkelas_parent(selected = "", id_jurusan, index) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/master-data/ajax-kelas.html",
        data: {act:"listdropdownkelas", req: {"id_jurusan": id_jurusan}},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Kelas</option>";
                    result += resp.lsdt;
                
                $('.mt-repeater-item:nth-child('+index+') .dropdown-kelas').html(result);

                if(selected != "") {
                  $('.mt-repeater-item:nth-child('+index+') .dropdown-kelas').val(selected).trigger("change");
                }
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

function getdatadropdownhakakses(selected = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/administrator/ajax-hak-akses.html",
        data: {act:"listdropdown"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Hak Akses</option>";
                    result += resp.lsdt;
                
                $(".dropdown-hak-akses").html(result);

                if(selected != "") {
                  $(".dropdown-hak-akses").val(selected).trigger("change");
                }
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

function getdatadropdownhakakses2(selected = "", lastchild) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/administrator/ajax-hak-akses.html",
        data: {act:"listdropdown"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Hak Akses</option>";
                    result += resp.lsdt;
                if(lastchild!="true"){
                    $(".dropdown-hak-akses2").html(result);
                    if(selected != "") {
                      $(".dropdown-hak-akses2").val(selected).trigger("change");
                    }
                }
                if(lastchild=="true"){
                    $(".mt-repeater-item:last-child .dropdown-hak-akses2").html(result);
                    if(selected != "") {
                      $(".mt-repeater-item:last-child .dropdown-hak-akses2").val(selected).trigger("change");
                    }
                }
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

function getdatadropdownjurusan(selected = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/master-data/ajax-jurusan.html",
        data: {act:"listdropdownjurusan"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Jurusan</option>";
                    result += resp.lsdt;
                
                $(".dropdown-jurusan").html(result);

                if(selected != "") {
                  $(".dropdown-jurusan").val(selected).trigger("change");
                }
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

function getdatadropdownrekening(selected = "", lastchild) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/administrator/ajax-rekening.html",
        data: {act:"listdropdown"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.lsdt && resp.lsdt != "undefined") {
                var result  = "<option value=''>Pilih Bank</option>";
                    result += resp.lsdt;
                if(lastchild!="true"){
                    $(".dropdown-bank").html(result);
                    if(selected != "") {
                      $(".dropdown-bank").val(selected).trigger("change");
                    }
                }
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

function ParseGambar(url) {
    if(/(http|https)/.test(url)) {
        url = url.replace("https", "http");
        return url;
    } else {
        url = url.replace("2|", "");
        return cdn_url + "/sekolah/images/" + url;
    }
}

function empty(string) {
  return (string == undefined || string == "" || string == null);
}

function GetData(req = "", action = "", succsesfunc = "") {
    act = (action != "") ? action : "listdatahtml";

    $(".datatable tbody").html(loader(true));
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + pagename,
        data: {act:act, req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.paging.Total != undefined) {
                $(".datatable tbody").html(resp.lsdt);
                pagination(resp.paging);
                if(succsesfunc != "") {
                    getfunc = succsesfunc;
                    succsesfunc(resp);
                }
            } else {
                $(".datatable tbody").html(resp.lsdt);
                $(".pagination-layout").addClass("hidden");
                if(succsesfunc != "") {
                    getfunc = succsesfunc;
                    succsesfunc(resp);
                }
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

function SetGetData(req = "", action = "", succsesfunc = "", target) {
    act = (action != "") ? action : "listdatahtml";

    $(target).html(setloader(true));
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + pagename,
        data: {act:act, req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.paging.Total != undefined) {
                $(target).html(resp.lsdt);
                setpagination(resp.paging, target);
                if(succsesfunc != "") {
                    getfunc = succsesfunc;
                    succsesfunc(resp);
                }
                $(".content-modal").click(function() {
                    $(this).attr('style', "min-height:50px;")
                });
            } else {
                $(target).html(resp.lsdt);
                $(".set-pagination-layout").addClass("hidden");
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

function Login(selectorform, successfunc = "") {
    var captcha    = $("#g-recaptcha-response").val();
    var formdata   = $(selectorform).serialize() + "&captcha=" + captcha + "&act=login";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/ajax-login",
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            if(resp.IsError == false) {
                if(resp.lsdt == "success") window.location.href = base_url + "/beranda.html";
                if(resp.lsdt == "error") window.location.href = base_url + "/user/login.html";
            } else {
                $(".notifikasi").html(resp.lsdt);
                l.ladda("stop");
            }
            if(successfunc != "") {
                successfunc(resp);
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

function Register(selectorform, successfunc = "") {
    var captcha    = $("#g-recaptcha-response").val();
    var formdata   = $(selectorform).serialize() + "&captcha=" + captcha + "&act=register";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/ajax-login",
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                $(".notifikasi").html(resp.lsdt);
            } else {
                $(".notifikasi").html(resp.lsdt);
            }
            if(successfunc != "") {
                successfunc(resp);
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

function Forgot(selectorform, successfunc = "") {
    var captcha    = $("#g-recaptcha-response").val();
    var formdata   = $(selectorform).serialize() + "&captcha="+ captcha +"&act=forgot_password";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/ajax-login",
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                $(".notifikasi").html(resp.lsdt);
            } else {
                $(".notifikasi").html(resp.lsdt);
            }
            if(successfunc != "") {
                successfunc(resp);
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

function ResetPass(selectorform, successfunc = "") {
    var captcha    = $("#g-recaptcha-response").val();
    var formdata   = $(selectorform).serialize() + "&captcha=" + captcha + "&act=reset_password";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/ajax-login",
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                $(".notifikasi").html(resp.lsdt);
            } else {
                $(".notifikasi").html(resp.lsdt);
            }
            if(successfunc != "") {
                successfunc(resp);
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

function InsertAbsensi(data, action, func = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + action,
        data: data,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(!empty(func)) {
                func(resp);
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

function UpdateAbsensi(data, action, func = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + action,
        data: data,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(!empty(func)) {
                func(resp);
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

function AlertShow(msg, type) {
  return '<div class="custom-alerts alert alert-'+ type +' fade in col-md-12"><a role="button" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'+ msg +'</div>';
}

function InsertData(selectorform, successfunc = "") {
    var formdata   = $(selectorform).serialize() +"&act=insertdata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            if(resp.IsError == false) {
                toastrshow("success", "Data berhasil disimpan", "Success");
                $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", resp.ErrMessage, "Error");
            }
            l.ladda("stop");
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

function InsertDataAjax(selectorform, successfunc = "") {
    var formdata   = $(selectorform).serialize() +"&act=insertdata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                toastrshow("success", "Data berhasil disimpan", "Success");
                documentready();
                $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", resp.ErrMessage, "Error");
                documentnotready();
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(textstatus == "timeout") {
                this.tryCount++;
                if(this.tryCount <= this.retryLimit) {
                    $.ajax(this);
                }
            }
            documentnotready();
        }
    });
}

function InsertRepeaterData(data, action, func = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + action,
        data: data,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                if(!empty(func)) {
                    func(resp);
                }
            } else {
                toastrshow("error", resp.ErrMessage, "Error");
                if(!empty(func)) {
                    func(resp);
                }
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

function InsertRepeaterData2(data, action, func = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + action,
        data: data,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                toastrshow("success", "Data berhasil disimpan", "Success");
                if(!empty(func)) {
                    func(resp);
                }
            } else {
                toastrshow("error", resp.ErrMessage, "Error");
                if(!empty(func)) {
                    func(resp);
                }
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

function InsertRepeaterNoToaster(kat, data, action, func = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + action,
        data: data,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            console.log(data);
            if(resp.IsError == false) {
                if(!empty(func)) {
                    func(resp);
                }
            } else {
                var labelkat = "";
                if(!empty(func)) {
                    if(kat == "nip" || kat == "kelas" || kat == "nis" || kat == "id_tagihan"){
                        if(kat == "nip"){
                            kat = data.req.nip;
                            labelkat = "NIP";
                        }
                        if(kat == "kelas"){
                            kat = data.req.kelas;
                            labelkat = "Kelas";
                        }
                        if(kat == "nis"){
                            kat = data.req.nis;
                            labelkat = "NIS";
                        }
                        if(kat == "id_tagihan"){
                            kat = data.req.id_tagihan;
                            labelkat = "No. Tagihan";
                        }
                        $('.result-save-detil').append("<label class='text-danger'><b>"+labelkat+" "+kat+"</b> : "+resp.ErrMessage+"</label><br>");
                    }
                    if(!empty(func)) {
                        func(resp);
                    } else{
                        $('.result-save-detil').append("<label class='text-danger'><b>"+labelkat+" "+kat+"</b> : "+resp.ErrMessage+"</label><br>");
                    }
                }
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

function UpdateData(selectorform, successfunc = "") {
    var formdata   = $(selectorform).serialize() +"&act=updatedata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                toastrshow("success", "Data berhasil disimpan", "Success");
                $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", resp.ErrMessage, "Error");
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

function UpdateDataAjax(selectorform, successfunc = "") {
    var formdata   = $(selectorform).serialize() +"&act=updatedata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                toastrshow("success", "Data berhasil disimpan", "Success");
                documentready();
                $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                documentnotready();
                toastrshow("error", resp.ErrMessage, "Error");
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

function UpdatePassword(selectorform, successfunc = "") {
    var formdata   = $(selectorform).serialize() +"&act=updatepassword";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                toastrshow("success", "Data berhasil disimpan", "Success");
                $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", resp.ErrMessage, "Error");
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

function uploadfile(selectorform, successfunc = "", action) {
    var formdata = $(selectorform).serialize() +"&act=uploaddata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type : "post",
        url: base_url + "/ajax/" + formaction,
        data :formdata,
        cache : false,
        dataType: 'json',
        beforeSend: function() {
            l.ladda("start");
        },
        success : function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
              toastrshow("success", "File sukses upload", "Success");
              $(".responfilehidden").val(resp.Output);
                $("#FrmProsesExcel").submit();
            } else {
                toastrshow("warning", resp.Output, "Warning");
            }
        }
    });
}

function uploadfoto(ajaxtarget, base64, successfunc = "", action, old_path = "") {
    $.ajax({
        type : "post",
        url: base_url + "/ajax/"+ ajaxtarget,
        data : {act: action, req: {"Base64": base64, "OldPath": old_path}},
        cache : false,
        dataType: 'json',
        beforeSend: function() {
            l.ladda("start");
        },
        success : function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                // toastrshow("success", "File sukses diupload", "Success");
                $(".input-photo").val(resp.Output);
                successfunc(resp);
            } else {
                toastrshow("warning", "File gagal diupload", "Warning");
            }
        }
    });
}

function DeleteData(id_delete, page_name, successfunc = "") {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + page_name,
        data: {act:"deletedata", req: {"id": id_delete}},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            l.ladda("start");
        },
        success: function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                $(".modal-delete").modal("hide");
                toastrshow("success", "Data berhasil dihapus", "Success");
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", resp.ErrMessage, "Error");
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

function getdatabyid(id, successfunc) {
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/" + pagename,
        data: {"act":"getdatabyid", req:id},
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp == "nodata") {
                toastrshow("error", "Data tidak tersedia atau tidak ada", "Error");
            } else {
                resp = JSON.parse(resp);
                successfunc(resp);
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

function pagination(page) {
    var paginglayout = $(".pagination-layout");
    var infopage = page.InfoPage+" Records | "+page.JmlHalTotal+" Pages";
    
    paginglayout.removeClass("hidden");
    paginglayout.find("input[type='text']").val(page.HalKe);
    paginglayout.find("div.info").html(infopage);
    if(page.IsNext == true) {
        paginglayout.find(".btn.next").removeClass("disabled");
        paginglayout.find(".btn.last").removeClass("disabled");
        datanext = (page.HalKe + 1);
    } else {
        paginglayout.find(".btn.next").addClass("disabled");
        paginglayout.find(".btn.last").addClass("disabled");
        dataprev = 0;
    }
    if(page.IsPrev == true) {
        paginglayout.find(".btn.prev").removeClass("disabled");
        paginglayout.find(".btn.first").removeClass("disabled");
        dataprev = (page.HalKe - 1);
    } else {
        paginglayout.find(".btn.prev").addClass("disabled");
        paginglayout.find(".btn.first").addClass("disabled");
        dataprev = 0;
    }
}

function setpagination(page, target) {
    target = target.replace (/.list-group-/g, "", target);
    var paginglayout = $(".set-pagination-layout");
    var infopage = page.InfoPage+" Records | "+page.JmlHalTotal+" Pages";
    
    paginglayout.removeClass("hidden");
    paginglayout.find("input[type='text']").val(page.HalKe);
    paginglayout.find("div.info").html(infopage);
    if(page.IsNext == true) {
        paginglayout.find(".btn."+target+"next").removeClass("disabled");
        datanext = (page.HalKe + 1);
    } else {
        paginglayout.find(".btn."+target+"next").addClass("disabled");
        dataprev = 0;
    }
    if(page.IsPrev == true) {
        paginglayout.find(".btn."+target+"prev").removeClass("disabled");
        dataprev = (page.HalKe - 1);
    } else {
        paginglayout.find(".btn."+target+"prev").addClass("disabled");
        dataprev = 0;
    }
}

function loader(withtable = false) {
    var html  = '';
    if(withtable == true) html += "<tr><td colspan='10' class='text-center'>";
    html += '<img src="'+base_url+'/assets/img/loading_2.gif" alt="Loading ..." style="width: 30px;">';
    if(withtable == true) html += "</td><td>";
    return html;
}
function setloader(withtable = false) {
    var html  = '';
    if(withtable == true) html += "<div><div width='100%' class='text-center'>";
    html += '<img src="'+base_url+'/assets/img/loading_2.gif" alt="Loading ..." style="width: 30px;">';
    if(withtable == true) html += "</div><div>";
    return html;
}

function toastrshow(type, title, message = "") {
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        positionClass: "toast-top-right",
        timeOut: 4000,
        onclick: null,
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    }
    switch(type) {
        case "success" : toastr["success"](title, message);  break;
        case "info"    : toastr["info"](title, message);     break;
        case "warning" : toastr["warning"](title, message);  break;
        case "error"   : toastr["error"](title, message);    break;
        default        : toastr["info"](title, message);     break;
    }
}

function resetformvalue(selector) {
    $(selector).trigger("reset"); //Reset value di form. Kecuali Select2
    $(selector + " select").val("").trigger("change"); //Reset seluruh Select2 yang ada di form
}

function FormatAngka(angka) {
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    var prc     = 1;
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return rev2.split('').reverse().join('');
}

function CheckStrip(string) {
    return !empty(string)? string: "-";
}

function CheckMonth(string) {
    if(string == 1){ month = "Januari";}
    else if(string == 2){ month = "Februari";}
    else if(string == 3){ month = "Maret";}
    else if(string == 4){ month = "April";}
    else if(string == 5){ month = "Mei";}
    else if(string == 6){ month = "Juni";}
    else if(string == 7){ month = "Juli";}
    else if(string == 8){ month = "Agustus";}
    else if(string == 9){ month = "September";}
    else if(string == 10){ month = "Oktober";}
    else if(string == 11){ month = "November";}
    else if(string == 12){ month = "Desember";}
    return month;
}

$(".btn.next").click(function() {
    request["Page"] = datanext;;
    GetData(request, act, getfunc);
});

$(".btn.prev").click(function() {
    request["Page"] = dataprev;
    GetData(request, act, getfunc);
});

$(".btn.first").click(function() {
    request["Page"] = 1;
    GetData(request, act, getfunc);
});

$(".btn.last").click(function() {
    request["Page"] = "-1";
    GetData(request, act, getfunc);
});

$(".limit").change(function() {
    var limit = $(this).val();
    request["Limit"] = limit;
    GetData(request, act, getfunc);
});

$("#FrmGotoPage").submit(function() {
    var page = $(this).find("input[type='text']").val();
    request["Page"] = page;
    GetData(request, act, getfunc);
    return false;
});

$("#FrmSearch").submit(function() {
    var kywd = $(this).find(".kywd").val();
    request["Page"] = 1;
    request["filter"]["kywd"] = kywd;
    GetData(request, act, getfunc);
    return false;
});

//Fix Bug jQuery Validation in Select2
$(".select2-validate").on("select2:close", function (e) {  
    $(this).valid(); 
});


$(".copy-text").click(function() {
    $(this).select();
});

function empty(string) {
  return (string == undefined || string == "" || string == null);
}

function GetTotalChatUnread() {
    var pagename = document.location.pathname.match(/[^\/]+$/)[0];

    if(pagename != "chat.html" && pagename != "login.html") {
        $.ajax({
            type: "POST",
            url: base_url + "/ajax/chatting/ajax-chatting.html",
            data: {act:"totalunread", req: {}},
            dataType: "JSON",
            tryCount: 0,
            retryLimit: 3,
            success: function(resp){
                if(resp.IsError == false) {
                    var item = resp.Data[0];

                    if(item.total_unread > 0 && item.total_unread <= 10) {
                        $(".sidebar-chat .badge").removeClass("hidden");
                        $(".sidebar-chat .badge").html("<i class='fa fa-bell'></i> " + item.total_unread);
                    } else if(item.total_unread > 10) {
                        $(".sidebar-chat .badge").removeClass("hidden");
                        $(".sidebar-chat .badge").html("<i class='fa fa-bell'></i> 10+");
                    } else {
                        $(".sidebar-chat .badge").addClass("hidden");
                    }
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
    } else {
        clearInterval(interval_total_chat);
    }
}

$('.table-responsive').on('show.bs.dropdown', function () {
    $('.table-responsive').css( "overflow", "inherit" );
});

$('.table-responsive').on('hide.bs.dropdown', function () {
    $('.table-responsive').css( "overflow", "auto" );
});

//set set get
$("#SetFrmKelas").submit(function() {
    var kywd = $(this).find(".kywd").val();
    request["Page"] = 1;
    request["filter"]["kywd"] = kywd;
    SetGetData(request, act, getfunc, ".list-group-kelas");
    return false;
});
$("#SetFrmSiswa").submit(function() {
    var kywd = $(this).find(".kywd").val(), id_kelas = $(this).find(".kelas").val();
    request["Page"] = 1;
    request["filter"]["kywd"] = kywd;
    request["filter"]["kelas"] = id_kelas;
    SetGetData(request, act, getfunc, ".list-group-siswa");
    return false;
});
$("#SetFrmSiswa .kelas").change(function() {
    $("#SetFrmSiswa").submit();
});
$("#SetFrmTarif").submit(function() {
    var kywd = $(this).find(".kywd").val();
    request["Page"] = 1;
    request["filter"]["kywd"] = kywd;
    SetGetData(request, act, getfunc, ".list-group-tarif");
    return false;
});

$(".btn.kelasnext").click(function() {
    request["Page"] = datanext;
    SetGetData(request, act, getfunc, ".list-group-kelas");
});
$(".btn.siswanext").click(function() {
    request["Page"] = datanext;
    SetGetData(request, act, getfunc, ".list-group-siswa");
});
$(".btn.kelasprev").click(function() {
    request["Page"] = dataprev;
    SetGetData(request, act, getfunc, ".list-group-kelas");
});
$(".btn.siswaprev").click(function() {
    request["Page"] = dataprev;
    SetGetData(request, act, getfunc, ".list-group-siswa");
});
$(".btn.tarifprev").click(function() {
    request["Page"] = datanext;
    SetGetData(request, act, getfunc, ".list-group-tarif");
});
$(".btn.tarifnext").click(function() {
    request["Page"] = dataprev;
    SetGetData(request, act, getfunc, ".list-group-tarif");
});

function ResetRequest() {
    request = {"filter": {"kywd": ""}};
}

function validatedata(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

//{0: min, 1: sen, 2: sel, 3: rab, 4: kam, 5: jum, 6: sab}
function GetDateDayInMonth(bulan, tahun, hari) {
    var result = [];
        hari = hari.split(",");

    $.each(hari, function(index, item) {
        var day = item;

        var current = new Date(moment([tahun, bulan - 1]));
        var end     = new Date(moment(current).endOf("month"));
        current.setDate(current.getDate() + (day - current.getDay() + 7) % 7);
        while (current < end) {
            result.push(moment(new Date(+current)).format("YYYY-MM-DD"));
            current.setDate(current.getDate() + 7);
        }
    });
    
    return result;  
}

function in_array(search, array, column) {
    if(empty(column)) {
        column = "";
    }

    var length = array.length;
    for(var i = 0; i < length; i++) {
        if(!empty(column)) {
            if(array[i][column] == search) return true;
        } else {
            if(array[i] == search) return true;
        }
    }
    return false;
}

String.prototype.ucwords = function() {
    return this.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });
}
