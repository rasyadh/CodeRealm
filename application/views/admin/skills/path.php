<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <div class="ui stackable grid">
                <div class="three wide column">
                    <img class="ui medium image" src="<?= $skill['skill_badge']; ?>">
                </div>
                <div class="thirteen wide column">
                    <h3><?= $skill['skill_name']; ?></h3>
                    <p><?= $skill['description']; ?></p>
                    <a><?= $skill['enroll_url']; ?></a>
                </div>
            </div>
            <br />

            <button class="ui primary button" id="add">Add New Path</button>
            <br /><br />

            <table class="ui stackable table" id="tables">
                <thead>
                    <tr>
                        <th>ID Path</th>
                        <th>Title Path</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_path as $path) { ?>
                    <tr>
                        <td><?= $path->id_skill_path; ?></td>
                        <td><?= $path->title_path; ?></td>
                        <td><?= $path->description; ?></td>
                        <td><?= $path->created_at; ?></td>
                        <td>
                            <div class="ui icon buttons">
                                <a class="ui green button" href="<?= site_url('admin/skills/path/course/'.$path->id_skill_path); ?>"><i class="info icon"></i></a>
                                <a class="ui yellow button" href="<?= site_url('admin/skills/path/edit/'.$path->id_skill_path); ?>"><i class="edit icon"></i></a>
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
        Add New Path
    </div>
    <div class="content">
        <?= form_open('admin/skills/add_path', 'class="ui form"'); ?>
            <?= form_hidden('id_skill', $skill['id_skill']); ?>
            <div class="required field">
                <label>Title Path</label>
                <?= form_input('title', '', array('placeholder'=>'Title Path', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Description</label>
                <?= form_textarea('description', '', array('placeholder'=>'Description', 'required'=>'')); ?>
            </div>
            <?= form_submit('add_path', 'Save Path', 'class="ui fluid primary button"'); ?>
        <?= form_close(); ?>
    </div>
</div>