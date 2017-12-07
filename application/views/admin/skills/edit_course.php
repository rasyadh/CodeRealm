<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <a class="ui button" href="<?= site_url('admin/skills/path/course/'.$this->uri->segment(6)); ?>"><i class="angle left icon"></i>Back</a>
            <br/><br/>

            <?= form_open('admin/skills/save_edit_course', 'class="ui form"'); ?>
                <?= form_hidden('id_skill_course', $course['id_skill_course']); ?>
                <?= form_hidden('id_skill_path', $course['id_skill_path']); ?>
                <div class="required field">
                    <label>Name Course</label>
                    <?= form_input('name', $course['name_course'], array('placeholder'=>'Name Course', 'required'=>'')); ?>
                </div>
                <div class="required field">
                    <label>Description</label>
                    <?= form_textarea('description', $course['description'], array('placeholder'=>'Description', 'required'=>'')); ?>
                </div>
                <div class="required field">
                    <label>Course URL</label>
                    <?= form_input('skill_course_url', $course['skill_course_url'], array('placeholder'=>'Course URL', 'required'=>'')); ?>
                </div>
                <?= form_submit('save_edit_course', 'Save Course', 'class="ui fluid primary button"'); ?>
            <?= form_close(); ?>
        </div>
    </div>
</main>