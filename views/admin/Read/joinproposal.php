<?php require __DIR__ . '/../../components/header.php'; ?>

<table>
    <thead>
        <tr>
            <th>ID Proposal</th>
            <th>ID Member </th>
            <th>ID Team</th>
            <th>Description</th>
            <th>Status</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($joinProposals as $joinproposal) { ?>

            <?php $id = $joinproposal["idjoin_proposal"] ?>
            <tr>
                <th><?= $id ?></th>
                <th><?= $joinproposal["idmember"] ?></th>
                <th><?= $joinproposal["idteam"] ?></th>
                <th><?= $joinproposal["description"] ?></th>
                <th><?= $joinproposal["status"] ?></th>
                <td><a href="/admin/updatejoinproposal?id=<?= $id ?>">Update</a></td>
                <td><a href="/process/deletejoinproposal?id=<?= $id ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>

<?php require __DIR__ . '/../../components/footer.php'; ?>