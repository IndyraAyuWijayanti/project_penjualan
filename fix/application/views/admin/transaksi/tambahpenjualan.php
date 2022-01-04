<div id="content" data-url="<?= base_url('admin/transaksi') ?>">
    <?= $this->session->flashdata('pesan') ?>

    <form action="<?= base_url('admin/transaksi/proses_tambah') ?>" id="form-tambah" method="POST"
        enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-2 mr-3">
                <label>No. Penjualan</label>
                <input type="text" name="kode_transaksi" value="<?= $kode?>" readonly class="form-control">
            </div>
            <div class="form-group col-2">
                <label>Tanggal Penjualan</label>
                <input type="text" name="tanggal_transaksi" value="<?= date('d/m/Y') ?>" readonly class="form-control">
            </div>
        </div>
        <h5>Data Transaksi Penjualan</h5>
        <hr>
        <div class="form-row">
            <div class="form-group col-3">
                <label for="id_produk">Nama Produk</label>
                <select name="id_produk" id="id_produk" class="id_produk form-control">
                    <option disabled="disabled" selected="selected">Pilih Produk</option>
                    <?php foreach ($produk as $viewproduk): ?>
                    <option value="<?= $viewproduk->id_produk ?>"><?= $viewproduk->nama_produk ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <input type="hidden" name="nama_produk" value="" readonly class="form-control">
            <input type="hidden" name="id_produk" value="" readonly class="form-control">
            <div class="form-group col-3">
                <label for="id_jenis_pembayaran">Pembayaran</label>
                <select name="id_jenis_pembayaran" id="id_jenis_pembayaran" class="id_jenis_pembayaran form-control">
                    <option disabled="disabled" selected="selected">Pilih Pembayaran</option>
                    <option value='1'>Cash</option>
                    <option value='2'>Angsuran</option>
                </select>
            </div>
            <div class="form-group col-2">
                <label>Lama Angsuran </label>
                <input type="number" name="lama_angsuran" value="" readonly class="form-control">
            </div>
            <div class="form-group col-2">
                <label>Harga </label>
                <input type="number" id="harga" name="harga" value="" readonly class="form-control">
            </div>
            <div class="form-group col-2 ">
                <label>Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" value="" class="form-control" readonly min='1'>
            </div>
            <div class="form-group col-2">
                <label>Sub Total</label>
                <input type="number" id="sub_total" name="sub_total" value="" class="form-control" readonly>
            </div>
            <div class="form-group col-3">
                <label for="">&nbsp;</label>
                <button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i
                        class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="keranjang">
            <h5>Detail Penjualan</h5>
            <hr>
            <table class="table table-bordered table-responsive" id="keranjang">
                <thead>
                    <tr>
                        <td width="30%">Nama Produk</td>
                        <td width="30%">Harga</td>
                        <td width="20%">Jumlah</td>
                        <td width="20%">Sub Total</td>
                        <td width="20%">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <table class="table table-bordered table-responsive" id="pelanggan">
            <thead>
                <tr>
                    <td width="20%">Nomor SPK</td>
                    <td width="30%">Nama Pelanggan</td>
                    <td width="20%">Alamat Pengiriman</td>
                    <td width="20%">Bank</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <table class="table table-bordered table-responsive" id="bayar">
            <thead>
                <tr>
                    <td width="15%">Diskon</td>
                    <td width="15%">Ongkir</td>
                    <td width="20%">Bayar</td>
                    <td width="30%">Tanggal Bayar</td>
                    <td width="40%">Bukti Bayar</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" align="right"><strong>SubTotal : </strong></td>
                    <td>
                        <div name="total" id="total">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="right"><strong>Diskon : </strong></td>
                    <td>
                        <div name="diskonn" id="diskonn">

                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="right"><strong>Ongkir : </strong></td>
                    <td>
                        <div name="ongkirr" id="ongkirr">

                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="right"><strong>Total : </strong></td>
                    <td>
                        <div name="grandtotal" id="grandtotal">

                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="right"><strong>Bayar : </strong></td>
                    <td>
                        <div name="bayarrin" id="bayarrin">

                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="right">
                        <input type="hidden" name="total_hidden" id="total_hidden" value="">
                        <input type="hidden" name="max_hidden" value="">
                        <!-- <input type="text" name="diskonn" id="diskonn" value=""> -->
                        <input type="hidden" name="totaldiskon" id="totaldiskon" value="" placeholder="diskon">
                        <input type="hidden" name="grandtotal" id="grandtotal" value="" placeholder="ongkir">
                        <button type="submit" class="btn btn-primary"><i
                                class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>

<!-- /.container-fluid -->


<script>
function hitungdiskon() {
    var Total = parseInt(document.getElementById("total_hidden").value) - parseInt($(
            'input[name="diskon_hidden"]')
        .val());

    document.getElementById("totaldiskon").innerHTML = Total;
    $('input[name="totaldiskon"]').val(Total);

    document.getElementById("diskonn").innerHTML = $('input[name="diskon_hidden"]').val();
}
</script>

<script>
function hitungongkir() {
    var gTotal = parseInt(document.getElementById("totaldiskon").value) + parseInt($(
            'input[name="ongkir_hidden"]')
        .val());

    document.getElementById("grandtotal").innerHTML = gTotal;
    $('input[name="grandtotal"]').val(gTotal);
    document.getElementById("ongkirr").innerHTML = $('input[name="ongkir_hidden"]').val();

}
</script>
<script>
function bayar() {
    var gTotal = parseInt($('input[name="bayar_hidden"]').val());

    document.getElementById("bayarrin").innerHTML = gTotal;
    $('input[name="bayarrin"]').val(gTotal);
    // document.getElementById("bayar").innerHTML = $('input[name="ongkir_hidden"]').val();

}
</script>
<script>
$(document).ready(function() {
    $('tfoot').hide()

    $(document).keypress(function(event) {
        if (event.which == '13') {
            event.preventDefault();
        }
    })

    $('#id_produk').on('change', function() {

        if ($(this).val() == '') reset()
        else {
            const url_get_all_produk = $('#content').data('url') + '/get_all_produk'
            $.ajax({
                url: url_get_all_produk,
                type: 'POST',
                dataType: 'json',
                data: {
                    id_produk: $(this).val()
                },
                success: function(data) {
                    $('input[name="nama_produk"]').val(data.nama_produk)
                    $('input[name="jumlah"]').val(0)
                    $('input[name="max_hidden"]').val(data.stok)
                    $('input[name="jumlah"]').prop('readonly', false)
                    $('input[name="harga"]').val(data.harga)

                    var hargatotal = parseInt(document.getElementById("harga").value) *
                        parseInt($('input[name="jumlah"]').val());
                    // $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * total)
                    document.getElementById("sub_total").value = hargatotal;

                    $('input[name="jumlah"]').on('keydown keyup change blur', function() {
                        // $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga"]').val())

                        var hargatotal = parseInt(document.getElementById("harga")
                            .value) * parseInt($('input[name="jumlah"]').val());
                        // $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * total)
                        document.getElementById("sub_total").value = hargatotal;
                    })
                }
            })
        }
    })

    $('#id_jenis_pembayaran').on('change', function() {

        if ($(this).val() == '') reset()
        else {
            const url_get_all_pembayaran = $('#content').data('url') + '/get_all_pembayaran'
            $.ajax({
                url: url_get_all_pembayaran,
                type: 'POST',
                dataType: 'json',
                data: {
                    id_jenis_pembayaran: $(this).val()
                },
                success: function(data) {
                    $('input[name="lama_angsuran"]').val(data.lama_angsuran)
                    $('button#tambah').prop('disabled', false)

                }
            })
        }
    })

    //keranjang
    $(document).on('click', '#tambah', function(e) {
        const url_keranjang_produk = $('#content').data('url') + '/keranjang_produk'
        const data_keranjang = {
            id_produk: $('select[name="id_produk"]').val(),
            id_jenis_pembayaran: $('select[name="id_jenis_pembayaran"]').val(),
            nama_produk: $('input[name="nama_produk"]').val(),
            jumlah: $('input[name="jumlah"]').val(),
            harga: $('input[name="harga"]').val(),
            sub_total: $('input[name="sub_total"]').val(),
        }
        if (parseInt($('input[name="max_hidden"]').val()) < parseInt(data_keranjang.jumlah)) {
            alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]')
                .val()))
        } else {
            $.ajax({
                url: url_keranjang_produk,
                type: 'POST',
                data: data_keranjang,
                success: function(data) {
                    if ($('select[name="id_produk"]').val() == data_keranjang
                        .nama_produk) $('option[value="' + data_keranjang.nama_produk +
                        '"]').hide()
                    reset()

                    $('table#keranjang tbody').append(data)
                    $('tfoot').show()

                    $('#total').html('<strong>' + hitung_total() + '</strong>')
                    $('input[name="total_hidden"]').val(hitung_total())
                    document.getElementById("diskonn").defaultValue = "0"
                    $('input[name="diskonn"]').val(0)
                    document.getElementById("ongkirr").defaultValue = "0"
                    $('input[name="ongkirr"]').val(0)
                }
            })
        }

    })


    //id pelanggan
    $(document).ready(function(e) {
        const url_pelanggan_transaksi = $('#content').data('url') + '/pelanggan_transaksi'
        const data_pelanggan = {
            id_produk: $('select[name="id_produk"]').val(),
            id_jenis_pembayaran: $('select[name="id_jenis_pembayaran"]').val(),
            id_pelanggan: $('input[name="id_pelanggan"]').val(),
            alamat_pengiriman: $('input[name="alamat_pengiriman"]').val(),
            nama_bank: $('input[name="nama_bank"]').val(),
        }
        $.ajax({
            url: url_pelanggan_transaksi,
            type: 'POST',
            data: data_pelanggan,
            success: function(data) {
                if ($('select[name="id_produk"]').val() == data_pelanggan
                    .id_jenis_pembayaran) $('option[value="' + data_pelanggan
                    .id_jenis_pembayaran + '"]').hide()
                reset()
                $('table#pelanggan tbody').append(data)
                $('tfoot').show()

                // $('#total').html('<strong>' + hitung_total() + '</strong>')
                // $('input[name="total_hidden"]').val(hitung_total())
            }
        })

    })

    //id bayar
    $(document).ready(function(e) {
        const url_bayar_produk = $('#content').data('url') + '/bayar_produk'
        const data_bayar = {
            id_produk: $('select[name="id_produk"]').val(),
            id_jenis_pembayaran: $('select[name="id_jenis_pembayaran"]').val(),
            diskon: $('input[name="diskon"]').val(),
            ongkir: $('input[name="ongkir"]').val(),
            bayar: $('input[name="bayar"]').val(),
            tanggal_pembayaran: $('input[name="tanggal_pembayaran"]').val(),
            bukti_bayar: $('input[name="bukti_bayar"]').val(),
        }
        $.ajax({
            url: url_bayar_produk,
            type: 'POST',
            data: data_bayar,
            success: function(data) {
                if ($('select[name="id_produk"]').val() == data_bayar
                    .id_jenis_pembayaran) $('option[value="' + data_bayar
                    .id_jenis_pembayaran + '"]').hide()
                reset()
                $('table#bayar tbody').append(data)
                $('tfoot').show()
            }
        })

    })

    $(document).on('click', '#tombol-hapus', function() {
        $(this).closest('.row-keranjang').remove()

        $('#total').html('<strong>' + hitung_total() + '</strong>')
        $('input[name="total_hidden"]').val(hitung_total())
        // document.getElementById("diskon_hidden").defaultValue = "0"
        // $('input[name="diskon_hidden"]').val(0)
        // document.getElementById("ongkir_hidden").defaultValue = "0"
        // $('input[name="ongkir_hidden"]').val(0)

        $('option[value="' + $(this).data('nama-produk') + '"]').show()

        if ($('tbody').children().length == 0) $('tfoot').hide()
    })

    $('button[type="submit"]').on('click', function() {
        $('select[name="id_produk"]').prop('disabled', true)
        $('select[name="id_jenis_pembayaran"]').prop('disabled', true)
        // $('input[name="id_produk"]').prop('disabled', true)
        $('input[name="harga"]').prop('disabled', true)
        $('input[name="jumlah"]').prop('disabled', true)
        $('input[name="sub_total"]').prop('disabled', true)
    })

    function hitung_total() {
        let total = 0;
        $('.sub_total').each(function() {
            total += parseInt($(this).text())
        })

        return total;
    }

    function reset() {

        $('#id_jenis_pembayaran').val('')
        $('input[name="tambah_harga"]').val('')
        $('input[name="lama_angsuran"]').val('')
        $('#id_produk').val('')
        $('input[name="id_produk"]').val('')
        $('input[name="harga"]').val('')
        $('input[name="jumlah"]').val('')
        $('input[name="sub_total"]').val('')
        $('input[name="jumlah"]').prop('readonly', true)
        $('button#tambah').prop('disabled', true)
    }
})
</script>
<script src="<?=base_url();?>assets/select2.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/select2.min.css">

<script>
$(document).ready(function() {
    $('.id_produk').select2();
    $('.id_jenis_pembayaran').select2();
    $('.id_pelanggan').select2();
    $('.id_bank').select2();
    $('.id_produk').change(function() {
        let id_produk = this.value;
        $.ajax({
            url: '<?= base_url() ?>admin/Transaksi/getDateAjax',
            method: 'post',
            data: {
                id_produk: id_produk
            },
            success: function(result) {}
        });
    });
});
</script>