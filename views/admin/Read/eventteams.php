<table>
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
                <td><a href="/admin/updateeventteams?idevent=<?= $idevent ?>&idteam=<?= $idteam ?>">Update</a></td>
                <td><a href="/process/deleteeventteams?idevent=<?= $idevent ?>&idteam=<?= $idteam ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>