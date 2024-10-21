<div class="modal fade modal-edit-konfirmasi" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi Pembayaran</h4>
            </div>
            <form id="FrmEditKonfirmasi" action="keuangan/ajax-kategori-tagihan.html" role="form">
                <div class="modal-body">
                    <p style="margin: 0px;">Apakah anda yakin ingin <span class="is_batal"></span> konfirmasi pembayaran untuk tagihan ini ?</p>
                    <div class="form-group" style="margin-bottom: 0px">
                        <textarea class="form-control keterangan" placeholder="Masukkan keterangan ..." style="margin-top: 7px;" autofocus></textarea>
                    </div>
                </div>
                <ul class="content-detail list-group">
                    <li class="list-group-item"> 
                        <div class="profile-desc-link">
                            <div class="row">
                                <div class="col-sm-3 col-xs-4 bold font-15">No Ref</div>
                                <div class="col-sm-9 col-xs-8 text-noref">: -</div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item"> 
                        <div class="profile-desc-link">
                            <div class="row">
                                <div class="col-sm-3 col-xs-4 bold font-15">Nama Tagihan</div>
                                <div class="col-sm-9 col-xs-8">: <a role="button" class="text-namatagihan" target="_blank">-</a></div>
                            </div>
                        </div>
                    </li>
                     <li class="list-group-item"> 
                        <div class="profile-desc-link">
                            <div class="row">
                                <div class="col-sm-3 col-xs-4 bold font-15">Bank Tujuan</div>
                                <div class="col-sm-9 col-xs-8 text-banktujuan">: -</div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item"> 
                        <div class="profile-desc-link">
                            <div class="row">
                                <div class="col-sm-3 col-xs-4 bold font-15">No Rek Tujuan</div>
                                <div class="col-sm-9 col-xs-8 text-norektujuan">: -</div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item"> 
                        <div class="profile-desc-link">
                            <div class="row">
                                <div class="col-sm-3 col-xs-4 bold font-15">No Rek Asal</div>
                                <div class="col-sm-9 col-xs-8 text-norekasal">: -</div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item"> 
                        <div class="profile-desc-link">
                            <div class="row">
                                <div class="col-sm-3 col-xs-4 bold font-15">Total Bayar</div>
                                <div class="col-sm-9 col-xs-8">: 
                                    <span class="text-totalbayar"></span>
                                    (<a role="button" class="text-bukti" data-bukti="" target="_blank">Lihat Bukti Pembayaran</a>)
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item"> 
                        <div class="profile-desc-link">
                            <div class="row">
                                <div class="col-sm-3 col-xs-4 bold font-15">Untuk Siswa</div>
                                <div class="col-sm-9 col-xs-80">: <a role="button" class="text-siswa" target="_blank">Nama Siswa</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item"> 
                        <div class="profile-desc-link">
                            <div class="row">
                                <div class="col-sm-3 col-xs-4 bold font-15">Tgl Bayar</div>
                                <div class="col-sm-9 col-xs-8 text-tglbayar">: -</div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item"> 
                        <div class="profile-desc-link">
                            <div class="row">
                                <div class="col-sm-3 col-xs-4 bold font-15">Tgl Konfirmasi</div>
                                <div class="col-sm-9 col-xs-8 text-tglkonfirmasi">: -</div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="modal-footer">
                    <input type="hidden" class="hidden-idupdate" value="">
                    <input type="hidden" class="hidden-no_pemb" value="">
                    <input type="hidden" class="hidden-reg_id" value="">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-danger ladda-button ladda-button-submit BtnSimpan" data-style="slide-up" data-status="">Ya, Konfirmasi Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>