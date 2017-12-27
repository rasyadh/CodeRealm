<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
            <table class="ui stackable structured table" id="tables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Lecture</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Enroll URL</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($quests as $quest) { ?>
                    <tr>
                        <td><?= $quest->id; ?></td>
                        <td><?= $quest->id_lecture; ?></td>
                        <td>
                            <img class="ui tiny image" src="<?= $quest->img; ?>" alt="<?= $quest->nama_course; ?>"/>
                        </td>
                        <td><?= $quest->nama_course; ?></td>
                        <td><?= $quest->keterangan; ?></td>
                        <td><?= $quest->enroll_url; ?></td>
                        <td>
                            <div class="ui icon buttons">
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