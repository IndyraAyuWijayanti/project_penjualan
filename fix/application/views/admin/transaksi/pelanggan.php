<tr class="row-pelanggan" id="contentt" data-url="<?= base_url('admin/transaksi') ?>">
    <td>
        <?= $this->input->post('nomor_spk') ?>
        <input type="text" name="nomor_spk_hidden" required>
    </td>
    <td class="nama_pelanggan">
        <select name="id_pelanggan" id="id_pelanggan" class="id_pelanggan form-control">
            <option disabled="disabled" selected="selected">Pilih Pelanggan</option>
            <?php foreach ($pelanggan as $viewpelanggan): ?>
            <option value="<?= $viewpelanggan->id_pelanggan ?>"><?= $viewpelanggan->nama_pelanggan ?></option>
            <?php endforeach ?>
        </select>
    </td>
    <td class="alamat_pengiriman">
        <?= $this->input->post('alamat_pengiriman') ?>
        <input type="text" id="alamat_pengiriman" name="alamat_pengiriman_hidden" class="form-control">
    </td>
    <td class="nama_bank">

        <select name="id_bank_hidden" class="form-control">
            <option value="1">Tunai</option>
            <option value="2">BRI</option>
            <option value="3">Mandiri</option>

        </select>
    </td>
</tr>

<script src="<?=base_url();?>assets/select2.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/select2.min.css">
<script>
$(document).ready(function() {
    $('.id_pelanggan').select2();
});
</script>
<script>
$('#id_pelanggan').on('change', function() {

    if ($(this).val() == '') reset()
    else {
        const url_get_all_pelanggan = $('#contentt').data('url') + '/get_all_pelanggan'
        $.ajax({
            url: url_get_all_pelanggan,
            type: 'POST',
            dataType: 'json',
            data: {
                id_pelanggan: $(this).val()
            },
            success: function(data) {
                $('input[name="alamat"]').val(data.alamat)
            }
        })
    }
})
</script>