<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <h3>Javascript</h3>
            <p>Spend some time with this powerful scripting language and learn to build lightweight applications with enhanced user interfaces.</p>
            <br />

            <button class="ui primary button" id="add">Add New Course</button>
            <table class="ui stackable structured table" id="tables">
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
                    <tr>
                        <td colspan="7">Empty</td>
                    </tr>
                </tbody>
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
        <?= form_open('skills/add', 'class="ui form"'); ?>
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
                <?= form_input('course_url', '', array('placeholder'=>'Course URL', 'required'=>'')); ?>
            </div>
            <?= form_submit('submit', 'Save Course', 'class="ui fluid primary button"'); ?>
        <?= form_close(); ?>
    </div>
</div>