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
            <table class="ui stackable structured table" id="tables">
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
                    <tr>
                        <td colspan="5">Empty</td>
                    </tr>
                </tbody>
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
        <?= form_open('skills/add', 'class="ui form"'); ?>
            <div class="required field">
                <label>Title Path</label>
                <?= form_input('title', '', array('placeholder'=>'Title Path', 'required'=>'')); ?>
            </div>
            <div class="required field">
                <label>Description</label>
                <?= form_input('description', '', array('placeholder'=>'Description', 'required'=>'')); ?>
            </div>
            <?= form_submit('submit', 'Save Path', 'class="ui fluid primary button"'); ?>
        <?= form_close(); ?>
    </div>
</div>