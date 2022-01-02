<tr class="row-bayar">
    <td class="diskon">
        <?= $this->input->post('diskon') ?>
        <input type="number" name="diskon_hidden" id="diskon" oninput="hitungdiskon()" required
            oninvalid="this.setCustomValidity('Jika Diskon 0 maka disii 0')" oninput="setCustomValidity('')">
    </td>
    <td class="ongkir">
        <?= $this->input->post('ongkir') ?>
        <input type="number" name="ongkir_hidden" id="ongkir" oninput="hitungongkir()" required
            oninvalid="this.setCustomValidity('Jika Ongkir 0 maka disii 0')" oninput="setCustomValidity('')">
    </td>
    <td class="bayar">
        <?= $this->input->post('bayar') ?>
        <input type="number" name="bayar_hidden" id="bayarr" oninput="bayar()" required
            oninvalid="this.setCustomValidity('Jika bayar 0 maka disii 0')" oninput="setCustomValidity('')">
    </td>
    <td class="tanggal_pembayaran">
        <?= $this->input->post('tanggal_pembayaran') ?>
        <input type="date" name="tanggal_pembayaran" required>
    </td>
    <td class="bukti_bayar">
        <?= $this->input->post('bukti_bayar') ?>
        <input type="file" name="bukti_bayar_hidden">
    </td>
</tr>
<script>
document.getElementById("diskon").defaultValue = "0"
</script>
<script>
document.getElementById("ongkir").defaultValue = "0"
</script>
<script>
document.getElementById("bayarr").defaultValue = "0"
</script>
<script src="<?=base_url();?>assets/select2.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/select2.min.css">