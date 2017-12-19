<main class="main">
    <div class="ui container">
        <h2><?= $title; ?></h2>

        <div class="ui blue padded segment">
        <div class="column container" style="margin:0 auto;width: 100%;">
        <div class="ui segment">
            <table class="ui single line table" id="tables" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Nama Course</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th >Unroll</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user->nama_course; ?></td>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->email; ?></td>
                        <td>
                            <div class="ui icon buttons">
                                <a class="ui red button" href="<?= site_url('lecture/enroll/delete/'.$user->id); ?>"><i class="trash icon"></i></a>
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
        </div>
    </div>
</main>