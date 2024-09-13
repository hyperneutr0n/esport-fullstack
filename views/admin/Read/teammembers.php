<table>
    <thead>
        <tr>
            <th>ID Team</th>
            <th>ID Member </th>
            <th>Description</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listTeamMembers as $teammember) { ?>
            <?php

            $idteam = $teammember["idteam"];
            $idmember = $teammember["idmember"];

            ?>
            <tr>
                <th><?= $idteam ?></th>
                <th><?= $idmember ?></th>
                <th><?= $teammember["description"] ?></th>
                <td><a href="process/updateteammembers?idteam=<?= $idteam ?>?idmember=<?= $idteam ?>">Update</a></td>
                <td><a href="process/deleteteammembers?idteam=<?= $idteam ?>?idmember=<?= $idteam ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>