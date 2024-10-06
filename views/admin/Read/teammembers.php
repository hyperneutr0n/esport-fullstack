<?php require __DIR__ . '/../../components/header.php'; ?>
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
                    <td><a href="/admin/updateteammembers?idteam=<?= $idteam ?>&idmember=<?= $idmember ?>">Update</a></td>
                    <td><a href="/process/deleteteammembers?idteam=<?= $idteam ?>&idmember=<?= $idmember ?>">Delete</a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>
<?php require __DIR__ . '/../../components/footer.php'; ?>