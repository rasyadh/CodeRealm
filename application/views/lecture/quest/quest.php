<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <button class="ui primary button" id="add">Add New Quest</button>
            <br />
            <br />
            <table class="ui stackable table" id="tables">
                <thead>
                    <tr>
                        <th class="one wide">ID</th>
                        <th class="two wide">Name</th>
                        <th class="five wide">Description</th>
                        <th class="three wide">Status</th>
                        <th >Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_quest as $quest) { ?>
                    <tr>
                        <td><?= $quest->id; ?></td>
                        <td><?= $quest->nama_course; ?></td>
                        <td><?= $quest->keterangan; ?></td>
                        <td><?= $quest->status; ?></td>
                        <td>
                            <div class="ui icon buttons">
                                <a class="ui green button" href="<?= site_url('lecture/quest/path/'.$quest->id); ?>"><i class="info icon"></i></a>
                                <a class="ui yellow button" href="<?= site_url('lecture/quest/edit/'.$quest->id); ?>"><i class="edit icon"></i></a>
                                <a class="ui red button" href="<?= site_url('lecture/quest/delete/'.$quest->id); ?>"><i class="trash icon"></i></a>
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
        Add New Quest
    </div>
    <div class="content">
        <?= form_open_multipart('lecture/quest/add_quest', 'class="ui form"'); ?>
            <div class="required field">
                <label>Course Name</label>
                <?= form_input('name', '', array('placeholder'=>'Name', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Description</label>
                <?= form_textarea('description', '', array('placeholder'=>'Description', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Image URL</label>
                <?= form_input('url', '', array('placeholder'=>'Image URL', 'required'=>'')); ?>
            </div>
            <div class="required field">
            <label>Status</label>
                    <div class="ui selection dropdown dropq" >
                    
                        <input type="hidden" name="status">
                        <i class="dropdown icon"></i>
                        <div class="default text">Status</div>
                        <div class="menu">
                            <div class="item" data-value="1">Show</div>
                            <div class="item" data-value="0">Hidden</div>
                        </div>
                    </div>
            </div>
            
            <?= form_submit('add_quest', 'Save Skills', 'class="ui fluid primary button"'); ?>
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