<?php 
    function money_parser($data){
        $result = array();
        $datas = str_split($data);

        for ($i = strlen($data) - 1; $i >= 0; $i--){
            if (strcasecmp(".", $datas[$i])){
                array_push($result, $datas[$i]);
            }
        }

        $strHasil = "";
        $x = 1;

        for ($i = 0; $i < count($result); $i++){
            if ($x == 3 && $i != (count($result) -1)){
                $strHasil = ".".$result[$i].$strHasil;
                $x = 0;
            }
            else {
                $strHasil = $result[$i].$strHasil;
            }
            $x++;
        }

        return $strHasil;
    }
?>
<div class="ui padded segment">
    <div class="ui container">
        <h2><?= $title; ?></h2>
        <?= anchor('barang/input', 'INPUT DATA BARANG', 'class="ui primary button"'); ?>

        <table class="ui table">
            <thead>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th colspan="2">Actions</th>
            <thead>
            <tbody>
                <?php foreach ($barang as $data_barang){ ?>
                    <tr>
                        <td><?= $data_barang->kode_barang; ?></td>
                        <td><?= $data_barang->nama_barang; ?></td>
                        <td><?= "Rp ".money_parser($data_barang->harga); ?></td>
                        <td><?= anchor('barang/edit/'.$data_barang->kode_barang, 'EDIT', 'class="ui yellow button"'); ?></td>
                        <td><?= anchor('barang/delete/'.$data_barang->kode_barang, 'DELETE', 'class="ui red button"'); ?></td>
                    </tr>
                <?php } ?>
            <tbody>
        </table>
    </div>
</div>