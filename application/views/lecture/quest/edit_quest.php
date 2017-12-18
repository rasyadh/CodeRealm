<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <a class="ui button" href="<?= site_url('lecture/quest'); ?>"><i class="angle left icon"></i>Back</a>
            <br/><br/>

            <?= form_open('lecture/quest/save_edit_quest', 'class="ui form"'); ?>
                <?= form_hidden('id', $quest['id']); ?>
                <div class="required field">
                    <label>Name</label>
                    <?= form_input('nama_course', $quest['nama_course'], array('placeholder'=>'Course Name', 'required'=>'')); ?>
                </div>
                <div class="required field">
                    <label>Description</label>
                    <?= form_textarea('keterangan', $quest['keterangan'], array('placeholder'=>'Description', 'required'=>'')); ?>
                </div>
                <div class="required field">
                    <label>Image URL</label>
                    <?= form_input('img', $quest['img']); ?>
                </div>
                <div class="required field">
                    <div class="ui selection dropdown dropq">
                        <input type="hidden" name="gender">
                        <i class="dropdown icon"></i>
                        <div class="default text">Status</div>
                        <div class="menu">
                            <div class="item" data-value="1">Show</div>
                            <div class="item" data-value="0">Hidden</div>
                        </div>
                    </div>
                </div>
                <?= form_submit('save_edit', 'Save Skills', 'class="ui fluid primary button"'); ?>
            <?= form_close(); ?>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.ui.dropdown')
            .dropdown()
        ;
        
        $('.dropq').dropdown('set selected', '<?=  $status ?>');
    });
</script>
</main>