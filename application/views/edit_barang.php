<div class="ui padded segment">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <?= form_open('barang/save_edit', 'class="ui form"'); ?>
        <?= form_hidden('id', $this->uri->segment(3)); ?>
        <div class="required field">
            <label>Kode Barang</label>
            <?= form_input('kode_barang', $product['kode_barang'], array('placeholder'=>'Kode Barang', 'required')); ?>
        </div>
        <div class="required field">
            <label>Nama Barang</label>
            <?= form_input('nama_barang', $product['nama_barang'], array('placeholder'=>'Nama Barang')); ?>
        </div>
        <div class="required field">
            <label>Harga Barang</label>
            <?= form_input('harga_barang', $product['harga'], array('placeholder'=>'Harga Barang')); ?>
        </div>
        <?= form_submit('SUBMIT', 'Simpan Data', 'class="ui primary button"'); ?>
        <?= anchor('barang', 'Kembali', 'class="ui button"'); ?>
        <?= form_close(); ?>
    </div>
</div>