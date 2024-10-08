<?php require __DIR__ . '/../../components/header.php'; ?>
<div class="d-flex justify-content-center align-items-center  mt-5">
    <h1>This is add team members form</h1>
</div>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <form action="/process/addteammembers" method="POST">
        <div>
            <label for="">Select ID Team: </label>
            <select name="idteam" id="idteam" required>
                <?php foreach ($teams as $team) { ?>
                    <option value="<?= $team["idteam"] ?>"><?= $team["name"] ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="">Select ID Member: </label>
            <select name="idmember" id="idmember" required>
                <?php foreach ($members as $member) { ?>
                    <option value="<?= $member["idmember"] ?>"><?= $member["username"] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Description:</label>
            <input type="text" id="description" name="description" required>
        </div>

        <input type="submit" id="submit" name="submit" class="btn-primary">
    </form>
</div>

</body>

</html>