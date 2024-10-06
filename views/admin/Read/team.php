<?php require __DIR__ . '/../../components/header.php'; ?>

<?php if (isset($_GET["message"])) {

    $message = $_GET["message"];
    echo "<script>";
    echo 'alert(' . json_encode($message) . ')';
    echo "</script>";
} ?>


<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <table border="1">
        <thead>
            <tr>
                <th>ID Team</th>
                <th>Name</th>
                <th>ID Game </th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $team) { ?>

                <tr>
                    <?php $id = $team["idteam"] ?>
                    <td><?= $id ?></td>
                    <td><?= $team["name"] ?></td>
                    <td><?= $team["idgame"] ?></td>
                    <td>
                        <a href="/admin/updateteam?id=<?= $id ?>" class="action-link update-link">
                            Update
                        </a>
                    </td>
                    <td>
                        <a href="/process/deleteteam?id=<?= $id ?>" class="action-link delete-link">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>
</body>

</html>