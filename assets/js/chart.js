function LoadChart(bulan = "", tahun = "", nis = "") {
    GetChart("listchart", bulan, tahun, nis, function(resp){
        if(resp.IsError) {
            var string = "<span class='label label-md label-warning'>"+ resp.ErrMessage +"</span>";
            $("#chart-1, #chart-2").removeAttr("style").html(string);
            return;
        }

        var ChartMetodePembayaran = resp.ChartMetodePembayaran;
        if(empty(ChartMetodePembayaran.IsError)) {
            $("#chart-1").html("");
            if(empty(ChartMetodePembayaran)) {
                var string = "<span class='label label-md label-warning'>Tidak Ada Data</span>";
                $("#chart-1").removeAttr("style").html(string);
            } else {
                $("#chart-1").css("height", "200px");
                Morris.Donut({
                    element: "chart-1",
                    data: ChartMetodePembayaran,
                    colors: [
                        "#f36a5a",
                        "#2ab4c0",
                        "#5C9BD1",
                        "#8877a9"
                    ]
                });
            }
        } else {
            var string = "<span class='label label-md label-warning'>"+ ChartMetodePembayaran.ErrMessage +"</span>";
            $("#chart-1").removeAttr("style").html(string);
        }

        var ChartPembayaranBulanan = resp.ChartPembayaranBulanan;
        if(empty(ChartPembayaranBulanan.IsError)) {
            $("#chart-2").html("");
            if(empty(ChartPembayaranBulanan)) {
                var string = "<span class='label label-md label-warning'>Tidak Ada Data</span>";
                $("#chart-2").removeAttr("style").html(string);
            } else {
                $("#chart-2").css("height", "200px");
                var line = new Morris.Line({
                    element: "chart-2",
                    resize: true,
                    data: ChartPembayaranBulanan,
                    xkey: "y",
                    ykeys: ["a"],
                    //xLabels: "day",
                    parseTime: false,
                    labels: ["Pembayaran"],
                    lineColors: ["#3c8dbc", "#99ccff"],
                    hideHover: "auto",
                    xLabelAngle: 30,
                    smooth: false,
                    yLabelFormat: function(y) {
                        return "Rp " + FormatAngka(y.toString())
                    },
                    xLabelFormat: function(x) {
                        var value = x.src.y;
                            parse = value.split("-");

                        if(parse.length == 2) { //Jika format YYYY-MM
                            return moment(value, "YYYY-MM").format("MMM YYYY");
                        } else if(parse.length == 3) { //Jika format YYYY-MM-DD
                            return moment(value, "YYYY-MM-DD").format("DD MMM YYYY");
                        }
                    }
                }).on("click", function(i, row){
                    Chart2Click(i, row);
                });
            }
        } else {
            var string = "<span class='label label-md label-warning'>"+ ChartPembayaranBulanan.ErrMessage +"</span>";
            $("#chart-2").removeAttr("style").html(string);
        }
    });
}

function LoadTotal(bulan = "", tahun = "",  nis = "") {
    GetChart("listtotal", bulan, tahun, nis, function(resp){
        if(resp.IsError) {
            $(".widget-1, .widget-2, .widget-3").html("0");
            return;
        }
        var item = resp.Data[0];
        var jml_aktif = parseInt(item.jml) - parseInt(item.jml_bayar);

        $(".widget-1").html(FormatAngka2(jml_aktif, 2));
        $(".widget-2").html(FormatAngka2(item.jml_bayar, 2));
        $(".tooltip1").attr("title", "Total Tagihan (Aktif) : "+FormatAngka(jml_aktif));
        $(".tooltip2").attr("title", "Total Pembayaran : "+FormatAngka(item.jml_bayar));

        $('.tooltip1, .tooltip2').tooltip({
            trigger: 'hover',
            placement: 'bottom'
        });
    });

    if(empty(nis)) {
        GetChart("listtotalezypay", bulan, tahun, "", function(resp){
            if(resp.IsError) {
                $(".widget-4").html("0");
                toastrshow("error", "Akun EzyPay : "+resp.ErrMessage, "Error");
                return;
            }
            var item = resp.Data;

            $(".widget-4").html(FormatAngka2(item.ezypay_jml, 2));
            $(".tooltip4").attr("title", "Total Saldo EzyPay : "+FormatAngka(item.ezypay_jml));
            $(".detil-ezypay").html(item.ezypay_nama + " ("+ item.ezypay_nohp +")");

            $('.tooltip4').tooltip({
                trigger: 'hover',
                placement: 'bottom'
            });
        });
    }
}

function LoadLogPembayaran(bulan  = "", tahun  = "", search = "") {
    if(empty(bulan)) bulan = $(".bulan").val();
    if(empty(tahun)) tahun = $(".tahun").val();
    pagename = "keuangan/ajax-pembayaran.html";

    request["filter"]["kywd"]  = search;
    request["filter"]["bulan"] = bulan;
    request["filter"]["tahun"] = tahun;
    request["Page"] = 1;
    GetData(request, "listdatalog");
}

function GetChart(action, bulan = "", tahun = "", nis = "", func = "") {
    if(empty(bulan)) bulan = $(".bulan").val();
    if(empty(tahun)) tahun = $(".tahun").val();
    $.ajax({
        type: "POST",
        url: base_url + "/ajax/dashboard/ajax-keuangan.html",
        data: {act: action, req: {"bulan": bulan, "tahun": tahun, "nis": nis}},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            $("#chart-1, #chart-2").html(loader());
            $(".widget-1, .widget-2, .widget-3, .widget-4").html(loader());
        },
        success: function(resp){
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

function FormatAngka2(angka, percision) {
    isNegative = false
    if (angka < 0) {
        isNegative = true
    }
    if(angka == 0) {
        return angka;
    }
    angka = Math.abs(angka)
    if (angka >= 1000000000) {
        formattedNumber = (angka / 1000000000).toFixed(percision).replace(/\.0$/, '') + ' M';
    } else if (angka >= 1000000) {
        formattedNumber =  (angka / 1000000).toFixed(percision).replace(/\.0$/, '') + ' JT';
    } else  if (angka >= 1000) {
        formattedNumber =  (angka / 1000).toFixed(percision).replace(/\.0$/, '') + ' Rb';
    } else {
        formattedNumber = angka;
    }   
    formattedNumber = formattedNumber.toString();
    formattedNumber = formattedNumber.replace(".", ",");

    if(isNegative) { formattedNumber = '-' + formattedNumber }
    return formattedNumber;
}

$("#FrmSearchLog").submit(function() {
    var value = $(this).find("input[type=text]").val();
    var bulan = $(".bulan").val(), tahun = $(".tahun").val();
    
    LoadLogPembayaran(bulan, tahun, value);
    return false;
});