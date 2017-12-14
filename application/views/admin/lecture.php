<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <button class="ui primary button" id="add">Add New Lecture</button>
            <br />
            <br />
            <table class="ui stackable table" id="tables">
                <thead>
                    <tr>
                        <th>ID Lecture</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_lectures as $lecture) { ?>
                    <tr>
                        <td><?= $lecture->id_lecture; ?></td>
                        <td><img class="ui tiny image" src="<?= $lecture->photo_url; ?>"></td>
                        <td><?= $lecture->name; ?></td>
                        <td><?= $lecture->email; ?></td>
                        <td><?= $lecture->created_at; ?></td>
                        <td>
                            <div class="ui icon buttons">
                                <a class="ui yellow button" href="<?= site_url('admin/lecture/edit/'.$lecture->id_lecture); ?>"><i class="edit icon"></i></a>
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
        Add New Lecture
    </div>
    <div class="content">
        <?= form_open_multipart('admin/lecture/add_lecture', 'class="ui form"'); ?>
            <div class="required field">
                <label>Name</label>
                <?= form_input('name', '', array('placeholder'=>'Name', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Email</label>
                <?= form_input(array('type'=>'email', 'name'=>'email'), '', array('placeholder'=>'Email', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Password</label>
                <?= form_password('password', '', array('placeholder'=>'Password', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Photo (type: jpg)</label>
                <?= form_upload('photo_url', ''); ?>
            </div>
            <?= form_submit('add_lecture', 'Save Lecture', 'class="ui fluid primary button"'); ?>
        <?= form_close(); ?>
    </div>
</div>