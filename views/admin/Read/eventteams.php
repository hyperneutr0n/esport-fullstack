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
                <th>ID Event</th>
                <th>ID Team </th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventTeams as $eventteam) { ?>

                <?php $idevent = $eventteam["idevent"];
                $idteam = $eventteam["idteam"] ?>

                <tr>
                    <th><?= $idevent ?></th>
                    <th><?= $idteam ?></th>
                    <td><a href="/admin/updateeventteams?idevent=<?= $idevent ?>&idteam=<?= $idteam ?>" class="action-link update-link">Update</a></td>
                    <td><a href="/process/deleteeventteams?idevent=<?= $idevent ?>&idteam=<?= $idteam ?>" class="action-link delete-link">Delete</a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>
</body>

</html>