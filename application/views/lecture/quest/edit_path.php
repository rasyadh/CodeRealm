<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <a class="ui button" href="<?= site_url('lecture/quest/path/'.$this->uri->segment(5)); ?>"><i class="angle left icon"></i>Back</a>
            <br/><br/>

            <?= form_open('lecture/quest/save_edit_path', 'class="ui form"'); ?>
                <?= form_hidden('id', $quest_path['id']); ?>
                <?= form_hidden('id', $quest_path['id_course']); ?>
                <div class="required field">
                    <label>Course Name</label>
                    <?= form_input('nama_detail', $quest_path['nama_detail'], array('placeholder'=>'Course Name', 'required'=>'')); ?>
                </div>
                <div class="required field">
                    <label>Description</label>
                    <?= form_textarea('keterangan', $quest_path['keterangan'], array('placeholder'=>'keterangan', 'required'=>'')); ?>
                </div>
                <div class="required field">
                    <label>Image URL</label>
                    <?= form_input('img', $quest_path['img']); ?>
                </div>
                <div class="required field">
                    <label>Point</label>
                    <?= form_input('point', $quest_path['point'], array('placeholder'=>'point', 'required'=>'')); ?>
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
                <?= form_submit('save_edit_path', 'Save Path', 'class="ui fluid primary button"'); ?>
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