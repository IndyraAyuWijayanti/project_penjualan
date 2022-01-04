<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
    <form action="<?= base_url('admin/transaksi/proses_tambahangsuran/'.  $transaksi->kode_transaksi) ?>" method="post"
        enctype="multipart/form-data">

        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- /.row -->
                <div class="row"><?= $this->session->flashdata('pesan') ?>
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input class="form-control" type="hidden" value="<?= $bb + 1 ?>"
                                        name="kode_angsuran">
                                    <div class="form-group">
                                        <label>Kode Transaksi</label>
                                        <input class="form-control" type="text" id="kode_transaksi"
                                            name="kode_transaksi" value="<?=  $transaksi->kode_transaksi ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Angsuran Ke</label>
                                        <input class="form-control" type="text" id="angsuran_ke" name="angsuran_ke"
                                            value="<?= $bb + 1 ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Sisa Tagihan</label>
                                        <input class="form-control" type="text" id="sisa_tagihan" name="sisa_tagihan"
                                            value="<?= $transaksi->total - $transaksi->totalbayar ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Bayar</label>
                                        <input class="form-control" type="text" id="bayar" name="bayar_hidden">
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Bank</label>
                                        <select name="id_bank_hidden" class="form-control">
                                            <option value="1">Tunai</option>
                                            <option value="2">BRI</option>
                                            <option value="3">Mandiri</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bukti Bayar</label>
                                        <input class="form-control" type="file" id="bukti_bayar"
                                            name="bukti_bayar_hidden">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input class="form-control" type="date" id="tanggal" name="tanggal" required>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        <span class="text">Kirim Data</span>
                                    </button>
                                    <a href="<?= base_url('admin/transaksi/detail/'. $transaksi->kode_transaksi) ?>"
                                        class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-reply"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card -->

</div>

<!-- /.container-fluid -->
</form>