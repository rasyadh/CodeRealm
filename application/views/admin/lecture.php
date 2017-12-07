<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <table class="ui stackable table" id="tables">
                <thead>
                    <tr>
                        <th>ID Lecture</th>
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
                        <td><?= $lecture->name; ?></td>
                        <td><?= $lecture->email; ?></td>
                        <td><?= $lecture->created_at; ?></td>
                        <td>
                            <a class="ui red button"><i class="trash icon"></i></a>
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