<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <div class="ui stackable grid">
                <div class="three wide column">
                    <img class="ui medium image" src="<?= $course_detail['img']; ?>">
                </div>
                <div class="thirteen wide column">
                    <h3><?= $course_detail['nama_course']; ?></h3>
                    <p><?= $course_detail['keterangan']; ?></p>
                </div>
            </div>
            <br />

            <button class="ui primary button" id="add">Add New Path</button>
            <br /><br />

            <table class="ui stackable table" id="tables">
                <thead>
                    <tr>
                        <th>ID Course</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Point</th>
                        <th>Edit</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_path as $path) { ?>
                    <tr>
                        <td><?= $path->id_course; ?></td>
                        <td><?= $path->nama_detail; ?></td>
                        <td><?= $path->keterangan; ?></td>
                        <td><?= $path->point; ?></td>
                        <td><?= $path->status; ?></td>
                        <td>
                            <div class="ui icon buttons">
                                
                                <a class="ui yellow button" href="<?= site_url('lecture/quest/path/edit/'.$path->id); ?>"><i class="edit icon"></i></a>
                                <a class="ui red button" href="<?= site_url('lecture/quest/path/'. $path->id_course .'/delete/'.$path->id); ?>"><i class="trash icon"></i></a>
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
        <?= form_open('lecture/quest/add_path', 'class="ui form"'); ?>
            <?= form_hidden('id_course', $course_detail['id']); ?>
            <div class="required field">
                <label>Course Name</label>
                <?= form_input('nama_detail', '', array('placeholder'=>'Course Name', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Description</label>
                <?= form_textarea('keterangan', '', array('placeholder'=>'keterangan', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Point</label>
                <?= form_input('point', '', array('placeholder'=>'point', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Image URL</label>
                <?= form_input('img', '', array('placeholder'=>'img', 'required'=>'')); ?>
            </div>
            <div class="required field">
                    <div class="ui selection dropdown" id="dropdown">
                        <input type="hidden" name="status">
                        <i class="dropdown icon"></i>
                        <div class="default text">Status</div>
                        <div class="menu">
                            <div class="item" data-value="1">Show</div>
                            <div class="item" data-value="0">Hidden</div>
                        </div>
                    </div>
            </div>
           

            <?= form_submit('add_path', 'Save Path', 'class="ui fluid primary button"'); ?>
        <?= form_close(); ?>
    </div>
    <script>
    $(document).ready(function() {
        $('.ui.dropdown')
            .dropdown()
        ;
    });
</script>
</div>