<tr class="row-keranjang">
    <input type="hidden" name="id_jenis_pembayaran_hidden" value="<?= $this->input->post('id_jenis_pembayaran') ?>">
    </td>
    <input type="hidden" name="id_produk_hidden[]" value="<?= $this->input->post('id_produk') ?>">
    <td class="nama_produk">
        <?= $this->input->post('nama_produk') ?>
        <input type="hidden" name="nama_produk_hidden[]" value="<?= $this->input->post('nama_produk') ?>">
    </td>
    <td class="harga">
        <?= $this->input->post('harga') ?>
        <input type="hidden" name="harga_produk_hidden[]" id="harga" value="<?= $this->input->post('harga') ?>">
    </td>
    <td class="jumlah">
        <?= $this->input->post('jumlah') ?>
        <input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
    </td>
    <td class="sub_total">
        <?= $this->input->post('sub_total') ?>
        <input type="hidden" name="sub_total_hidden[]" value="<?= $this->input->post('sub_total') ?>">
    </td>
    <td class="aksi">
        <button type="button" class="btn btn-danger btn-sm" id="tombol-hapus"
            data-nama-produk="<?= $this->input->post('nama_produk') ?>"><i class="fa fa-trash"></i></button>
    </td>
</tr>