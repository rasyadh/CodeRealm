<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <a class="ui button" href="<?= site_url('admin/skills'); ?>"><i class="angle left icon"></i>Back</a>
            <br/><br/>

            <?= form_open('admin/skills/save_edit', 'class="ui form"'); ?>
                <?= form_hidden('id_skill', $skill['id_skill']); ?>
                <div class="required field">
                    <label>Name</label>
                    <?= form_input('name', $skill['skill_name'], array('placeholder'=>'Name', 'required'=>'')); ?>
                </div>
                <div class="required field">
                    <label>Description</label>
                    <?= form_textarea('description', $skill['description'], array('placeholder'=>'Description', 'required'=>'')); ?>
                </div>
                <div class="required field">
                    <label>Enroll URL</label>
                    <?= form_input('enroll_url', $skill['enroll_url'], array('placeholder'=>'Enrol URL')); ?>
                </div>
                <?= form_submit('save_edit', 'Save Skills', 'class="ui fluid primary button"'); ?>
            <?= form_close(); ?>
        </div>
    </div>
</main>