<?php require __DIR__ . '/../../components/header.php'; ?>

<div>
    <h1>This is edit team members form</h1>

    <form action="/process/addteammembers" method="POST">
        <div>
            <label for="">Select ID Team: </label>
            <input type="hidden" value="<?= $teammember["idteam"] ?>" name="idteam_before">
            <select name="idteam_after" id="idteam" required value="<?= $teammember["idteam"] ?>">
                <?php foreach ($teams as $team) { ?>
                    <option value="<?= $team["idteam"] ?>"><?= $team["name"] ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="">Select ID Member: </label>
            <input type="hidden" name="idmember_before" value="<?= $teammember["idmember"] ?>">
            <select name="idmember_after" id="idmember_after" required value="<?= $teammember["idmember"] ?>">
                <?php foreach ($members as $member) { ?>
                    <option value="<?= $member["idmember"] ?>"><?= $member["username"] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Description:</label>
            <input type="text" id="description" name="description" required value="<?= $teammember["description"] ?>">
        </div>

        <input type="submit" id="submit" name="submit">
    </form>
</div>

<?php require __DIR__ . '/../../components/footer.php'; ?>