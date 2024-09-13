<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Team</th>
            <th>Name</th>
            <th>Date</th>
            <th>Description</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listAchievements as $achievement) { ?>

            <?php $id = $achievement["id"] ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $achievement["name"] ?></td>
                <td><?= $achievement["date"] ?></td>
                <td><?= $achievement["description"] ?></td>
                <td><a href="process/updateachievement?id=<?= $id ?>">Update</a></td>
                <td><a href="process/deleteachievement?id=<?= $id ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>