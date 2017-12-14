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
                        <th class="two wide">Skill Badge</th>
                        <th class="two wide">Name</th>
                        <th class="five wide">Description</th>
                        <th class="one wide">Enroll URL</th>
                        <th class="three wide">Created At</th>
                        <th >Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr></tr>
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
        <?= form_open_multipart('', 'class="ui form"'); ?>
            <div class="required field">
                <label>Name</label>
                <?= form_input('name', '', array('placeholder'=>'Name', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Description</label>
                <?= form_textarea('description', '', array('placeholder'=>'Description', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Enroll URL</label>
                <?= form_input('enroll_url', '', array('placeholder'=>'Enrol URL')); ?>
            </div>
            <div class="required field">
                <label>Skill Badge (type: png, jpg)</label>
                <?= form_upload('skill_badge', ''); ?>
            </div>
            <?= form_submit('add_skill', 'Save Skills', 'class="ui fluid primary button"'); ?>
        <?= form_close(); ?>
    </div>
</div>