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
                <th>ID Member </th>
                <th>Description</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teamMembers as $teammember) { ?>
                <?php

                $idteam = $teammember["idteam"];
                $idmember = $teammember["idmember"];

                ?>
                <tr>
                    <th><?= $idteam ?></th>
                    <th><?= $idmember ?></th>
                    <th><?= $teammember["description"] ?></th>
                    <td><a href="/admin/updateteammembers?idteam=<?= $idteam ?>&idmember=<?= $idmember ?>" class="action-link update-link">Update</a></td>
                    <td><a href="/process/deleteteammembers?idteam=<?= $idteam ?>&idmember=<?= $idmember ?>" class="action-link delete-link">Delete</a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>
</body>

</html>