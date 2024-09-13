<table>
    <thead>
        <tr>
            <th>ID Proposal</th>
            <th>ID Member </th>
            <th>ID Team</th>
            <th>Description</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($joinProposals as $joinproposal) { ?>

            <?php $id = $joinproposal["id"] ?>
            <tr>
                <th><?= $id ?></th>
                <th><?= $joinproposal["idmember"] ?></th>
                <th><?= $joinproposal["idteam"] ?></th>
                <th><?= $joinproposal["description"] ?></th>
                <td><a href="process/updatejoinproposal?id=<?= $id ?>">Update</a></td>
                <td><a href="process/deletejoinproposal?id=<?= $id ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>