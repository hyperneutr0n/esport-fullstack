<table>
    <thead>
        <tr>
            <th>ID Member</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Profile</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listMembers as $member) { ?>
            <tr>
                <?php $id = $member["idmember"] ?>
                <th><?= $id ?></th>
                <th><?= $member["fname"] ?></th>
                <th><?= $member["lname"] ?></th>
                <th><?= $member["username"] ?></th>
                <th><?= $member["password"] ?></th>
                <th><?= $member["profile"] ?></th>
                <td><a href="process/updateteam?id=<?= $id ?>">Update</a></td>
                <td><a href="process/deleteteam?id=<?= $id ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>