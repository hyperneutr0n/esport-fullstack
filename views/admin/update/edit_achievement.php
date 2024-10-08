<?php require __DIR__ . '/../../components/header.php'; ?>

<h1>This is edit achievement form</h1>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <form action="/process/updateachievement" method="POST" id="addteamForm">
        <div>
            <label for="">ID Achievement:</label>
            <input type="text" name="id1" disabled value="<?= $achievement["idachievement"] ?>">
            <input type="hidden" name="id" value="<?= $achievement["idachievement"] ?>">
        </div>
        <div>
            <label for="">Select team: </label>
            <select name="idteam" id="idteam" required value="<?= $achievement["idteam"] ?>">
                <?php foreach ($teams as $team) { ?>
                    <?php

                    if ($team["idteam"] == $achievement["idteam"]) { ?>
                        <option value="<?= $team["idteam"] ?>" selected><?= $team["name"] ?></option>

                    <?php
                    } else { ?>
                        <option value="<?= $team["idteam"] ?>"><?= $team["name"] ?></option>

                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Name:</label>
            <input type="text" id="name" name="name" required value="<?= $achievement["name"] ?>">
        </div>

        <div>
            <label for="">Date:</label>
            <input type="date" id="date" name="date" required value="<?= $achievement["date"] ?>">
        </div>

        <div>
            <label for="">Description:</label>
            <input type="text" id="description" name="description" required value="<?= $achievement["description"] ?>">
        </div>

        <input type="submit" id="submit" name="submit" class="btn-primary">
    </form>
</div>

</body>

</html>