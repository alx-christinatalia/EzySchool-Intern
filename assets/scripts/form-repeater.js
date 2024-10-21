var FormRepeater = function () {

    return {
        //main function to initiate the module
        init: function () {
            $('.mt-repeater').each(function(){
                $(this).repeater({
                    show: function () {
                        $(this).slideDown();
                        
                        $(".checkbox-bayar").change(function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            centangtempel(index);
                            total_formnominal = $(".mt-repeater-item").size();
                            var totalbayar = 0;
                            for (i = 1; i <= total_formnominal; i++) {
                                bayarperrow = $('.mt-repeater-item:nth-child('+i+') .formbayar').val();
                                bayarperrow = bayarperrow.replace (/\./g, "", bayarperrow);
                                parseInt(totalbayar);
                                parseInt(bayarperrow);
                                totalbayar = ((totalbayar*1)+(bayarperrow*1));
                            }
                            var totalbelumbayar = $('.total-tagihan').text();
                            totalbelumbayar = totalbelumbayar.replace (/\./g, "", totalbelumbayar);
                            totalbelumbayar = totalbelumbayar.replace (/Rp /g, "", totalbelumbayar);
                            parseInt(totalbelumbayar);
                            totalbelumbayar = ((totalbelumbayar*1)-(totalbayar*1));
                            var number_string = totalbayar.toString(), sisa  = number_string.length % 3, totalbayar  = number_string.substr(0, sisa), ribuan  = number_string.substr(sisa).match(/\d{3}/g); if (ribuan) { separator = sisa ? '.' : ''; totalbayar += separator + ribuan.join('.');}
                            var number_string = totalbelumbayar.toString(), sisa  = number_string.length % 3, totalbelumbayar  = number_string.substr(0, sisa), ribuan  = number_string.substr(sisa).match(/\d{3}/g); if (ribuan) { separator = sisa ? '.' : ''; totalbelumbayar += separator + ribuan.join('.');}
                            $('.total-bayar').text("Rp "+totalbayar);
                            $('.total-belum-bayar').text("Rp "+totalbelumbayar);
                        });

                        function centangtempel(index) {
                            var batasmaks = $(".mt-repeater-item:nth-child("+index+") .jumlah-tagihan").text();
                            batasmaks = batasmaks.replace (/\./g, "", batasmaks);
                            if($(".mt-repeater-item:nth-child("+index+") .checkbox-bayar").is(':checked')){
                                var number_string = batasmaks.toString(), 
                                sisa  = number_string.length % 3, 
                                batasmaks = number_string.substr(0, sisa), 
                                ribuan  = number_string.substr(sisa).match(/\d{3}/g); 
                                if (ribuan) { 
                                    separator = sisa ? '.' : ''; 
                                    batasmaks += separator + ribuan.join('.');
                                }
                                $(".mt-repeater-item:nth-child("+index+") .formbayar").val(batasmaks);
                            } else {
                                var disableddata = $(".mt-repeater-item:nth-child("+index+") .disableddata").val();
                                if(empty(disableddata)){
                                    $(".mt-repeater-item:nth-child("+index+") .formbayar").val("");
                                }
                            }
                        }

                        $(".delete-show-collapse").click(function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            if(index==1){
                                var total_data = $(".mt-repeater-item").size();
                                total_data = total_data + 1;
                                setTimeout(function() {
                                    $('.mt-repeater-item:first-child() .button-collapse').attr('rowspan', total_data);
                                    $('.mt-repeater-item:first-child() .button-collapse').removeClass("hidden");
                                    $('.mt-repeater-item:first-child() .button-collapse').attr('role', "button");
                                    $('.mt-repeater-item:first-child() .button-collapse').attr('onClick', "clickbuttoncollapse();");
                                }, 500);
                            }
                        });
                        $(".formbayar").focus(function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            var inputan = $(this).val();
                            inputan = inputan.replace (/\./g, "", inputan);
                            $(this).val(inputan);
                        });

                        $(".formbayar").blur(function(event){
                            event.stopPropagation();
                            event.stopImmediatePropagation();

                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;

                            var inputan = $(".mt-repeater-item:nth-child("+index+") .formbayar").val();
                            var batasmaks = $(".mt-repeater-item:nth-child("+index+") .jumlah-tagihan").text();
                            batasmaks = batasmaks.replace (/\./g, "", batasmaks);
                            inputan = parseInt(inputan);
                            batasmaks = parseInt(batasmaks);
                            if(inputan < batasmaks && inputan > 0){
                                var number_string = inputan.toString(), 
                                sisa  = number_string.length % 3, 
                                inputan = number_string.substr(0, sisa), 
                                ribuan  = number_string.substr(sisa).match(/\d{3}/g); 

                                if (ribuan) { 
                                    separator = sisa ? '.' : ''; 
                                    inputan += separator + ribuan.join('.');
                                }
                                $(this).val(inputan);
                                $('.mt-repeater-item:nth-child('+index+') .checkbox-bayar').prop("checked", false);
                            } else if(inputan >= batasmaks){
                                var number_string = batasmaks.toString(), 
                                sisa  = number_string.length % 3, 
                                batasmaks = number_string.substr(0, sisa), 
                                ribuan  = number_string.substr(sisa).match(/\d{3}/g); 

                                if (ribuan) { 
                                    separator = sisa ? '.' : ''; 
                                    batasmaks += separator + ribuan.join('.');
                                }
                                $(this).val(batasmaks);
                                $('.mt-repeater-item:nth-child('+index+') .checkbox-bayar').prop("checked", true);
                            } else if(inputan < 0){
                                $(this).val("");
                            }

                            //start hitung hasil
                            total_formnominal = $(".mt-repeater-item").size();
                            var totalbayar = 0;
                            for (i = 1; i <= total_formnominal; i++) {
                                bayarperrow = $('.mt-repeater-item:nth-child('+i+') .formbayar').val();
                                bayarperrow = bayarperrow.replace (/\./g, "", bayarperrow);
                                parseInt(totalbayar);
                                parseInt(bayarperrow);
                                totalbayar = ((totalbayar*1)+(bayarperrow*1));
                            }
                            var number_string = totalbayar.toString(), sisa  = number_string.length % 3, totalbayar  = number_string.substr(0, sisa), ribuan  = number_string.substr(sisa).match(/\d{3}/g); if (ribuan) { separator = sisa ? '.' : ''; totalbayar += separator + ribuan.join('.');}
                            $('.total-bayar').text("Rp "+totalbayar);
                        });

                        $(".hsiainput").on("change", function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            console.log(index);
                        });
                        $(".formnominal").change(function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            if($(".mt-repeater-item:nth-child("+index+") .formnominal").val() > 0){
                                $(".mt-repeater-item:nth-child("+index+") .formketerangan").removeAttr("disabled");
                            } else {
                                $(".mt-repeater-item:nth-child("+index+") .formketerangan").attr('disabled', "true");
                                $(".mt-repeater-item:nth-child("+index+") .formketerangan").val("");
                            }
                        });

                        $(".publish_check").on("change", function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            if ($(this).is(":checked")) {
                                $(".mt-repeater-item:nth-child("+index+") .publish_text").val(1);
                            } else {
                                $(".mt-repeater-item:nth-child("+index+") .publish_text").val(0);
                            }
                        });

                        $(".nom").blur(function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            if($(this).val() != 0){
                                var selection = window.getSelection().toString();
                                if ( selection !== '' ) {
                                    return;
                                }
                                if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                                    return;
                                }
                                var $this = $(this);
                                var input = $this.val();
                                var input = input.replace(/[\D\s\._\-]+/g, "");
                                    input = input ? parseInt( input, 10 ) : 0;

                                $this.val( function() {
                                    return (input === 0) ? "" : input.toLocaleString("id");
                                });
                            }
                            if($(this).val() == "" || $(this).val() <= 0 ){
                                $(this).val(0);
                            }
                            if($(".mt-repeater-item:nth-child("+index+") .nom").val() != 0){
                                //kosong
                            } else {
                                $(".mt-repeater-item:nth-child("+index+") .nomnom").val(0);
                            }
                        });
                        $(".nom").keyup(function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            if($(".mt-repeater-item:nth-child("+index+") .nom").val() != 0){
                                var value = $(this).val().replace(/\./g, "");
                                $(this).val(value);
                                $(".mt-repeater-item:nth-child("+index+") .nomnom").val($(".mt-repeater-item:nth-child("+index+") .min").val() + value);
                            } else {
                                $(".mt-repeater-item:nth-child("+index+") .nomnom").val(0);
                            }
                        });
                        $(".nom").focus(function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            if($(".mt-repeater-item:nth-child("+index+") .nom").val() != 0){
                                var value = $(this).val().replace(/\./g, "");
                                $(this).val(value);
                                $(".mt-repeater-item:nth-child("+index+") .nomnom").val($(".mt-repeater-item:nth-child("+index+") .min").val() + value);
                            } else {
                                $(".mt-repeater-item:nth-child("+index+") .nomnom").val(0);
                            }

                        });
                        $(".formnama").keyup(function() {
                            var value = $(this).val();
                                value = value.split(/\s+/).slice(0,1);

                            var index = $(this).parents(".mt-repeater-item").index();
                                index = (index + 1);
                            $(".mt-repeater-item:nth-child("+index+") .siswa-nama_pgl").val(value);
                        });

                        //IZUL ------------------------------------------------------------------------------------

                        $(".formpassword").change(function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            var password = $('.mt-repeater-item:nth-child('+parseInt(index)+') .formpassword').val();
                            $('.mt-repeater-item:nth-child('+parseInt(index)+') .formpassword2').val(password);
                        });
                        $(".formpassword").focusin(function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            $('.mt-repeater-item:nth-child('+parseInt(index)+') .formpassword').attr('type', "text");
                        });
                        $(".formpassword").focusout(function() {
                            var index = $(this).parents(".mt-repeater-item").index();
                            index = index + 1;
                            $('.mt-repeater-item:nth-child('+parseInt(index)+') .formpassword').attr('type', "password");
                        });

                    },
                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                        setTimeout(function(){
                            var tot_frm = $(".mt-repeater-item").size();
                            if(tot_frm == 0){
                                $(".btnTambah").click();
                            }
                        }, 1000);
                    },

                    ready: function (setIndexes) {

                    }

                });
            });
        }

    };

}();

jQuery(document).ready(function() {
    FormRepeater.init();
});
