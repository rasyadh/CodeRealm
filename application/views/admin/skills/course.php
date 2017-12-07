<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <h3><?= $path['title_path']; ?></h3>
            <p><?= $path['description']; ?></p>

            <button class="ui primary button" id="add">Add New Course</button>
            <br /><br />

            <table class="ui stackable table" id="tables">
                <thead>
                    <tr>
                        <th>ID Course</th>
                        <th>Course Badge</th>
                        <th>Name Course</th>
                        <th>Description</th>
                        <th>Course URL</th>
                        <th>Created At</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_course as $course) { ?>
                    <tr>
                        <td><?= $course->id_skill_course; ?></td>
                        <td><img class="ui tiny image" src="<?= $course->skill_course_badge; ?>" /></td>
                        <td><?= $course->name_course; ?></td>
                        <td><?= $course->description; ?></td>
                        <td><?= $course->skill_course_url; ?></td>
                        <td><?= $course->created_at; ?></td>
                        <td>
                            <div class="ui icon buttons">
                                <a class="ui yellow button" href="<?= site_url('admin/skills/path/course/edit/'.$course->id_skill_course); ?>"><i class="edit icon"></i></a>
                                <a class="ui red button"><i class="trash icon"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr></tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>

<div class="ui modal add">
    <i class="close icon"></i>
    <div class="header">
        Add New Course
    </div>
    <div class="content">
        <?= form_open_multipart('admin/skills/add_course', 'class="ui form"'); ?>
            <?= form_hidden('id_skill_path', $path['id_skill_path']); ?>
            <div class="required field">
                <label>Name Course</label>
                <?= form_input('name', '', array('placeholder'=>'Name Course', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Description</label>
                <?= form_input('description', '', array('placeholder'=>'Description', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Course URL</label>
                <?= form_input('skill_course_url', '', array('placeholder'=>'Course URL', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Course Badge (type: png, jpg)</label>
                <?= form_upload('skill_course_badge', ''); ?>
            </div>
            <?= form_submit('add_course', 'Save Course', 'class="ui fluid primary button"'); ?>
        <?= form_close(); ?>
    </div>
</div>