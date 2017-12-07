<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <a class="ui button" href="<?= site_url('admin/skills/path/'.$this->uri->segment(5)); ?>"><i class="angle left icon"></i>Back</a>
            <br/><br/>

            <?= form_open('admin/skills/save_edit_path', 'class="ui form"'); ?>
                <?= form_hidden('id_skill_path', $path['id_skill_path']); ?>
                <?= form_hidden('id_skill', $path['id_skill']); ?>
                <div class="required field">
                    <label>Title Path</label>
                    <?= form_input('title', $path['title_path'], array('placeholder'=>'Title Path', 'required'=>'')); ?>
                </div>
                <div class="required field">
                    <label>Description</label>
                    <?= form_textarea('description', $path['description'], array('placeholder'=>'Description', 'required'=>'')); ?>
                </div>
                <?= form_submit('save_edit_path', 'Save Path', 'class="ui fluid primary button"'); ?>
            <?= form_close(); ?>
        </div>
    </div>
</main>