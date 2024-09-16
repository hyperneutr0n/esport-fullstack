<table>
    <thead>
        <tr>
            <th>ID Team</th>
            <th>ID Game </th>
            <th>Name</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teams as $team) { ?>

            <tr>
                <?php $id = $team["idteam"] ?>
                <td><?= $id ?></td>
                <td><?= $team["idgame"] ?></td>
                <td><?= $team["name"] ?></td>
                <td><a href="/admin/updateteam?id=<?= $id ?>">Update</a></td>
                <td><a href="/process/deleteteam?id=<?= $id ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>