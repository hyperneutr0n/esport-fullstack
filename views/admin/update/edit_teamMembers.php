<?php require __DIR__ . '/../../components/header.php'; ?>

<div class="d-flex justify-content-center align-items-center">
    <h1>This is edit team members form</h1>
</div>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <form action="/process/updateteammembers" method="POST">
        <div>
            <label for="">Select ID Team: </label>
            <input type="hidden" value="<?= $teammember["idteam"] ?>" name="idteam_before">
            <select name="idteam_after" id="idteam" required value="<?= $teammember["idteam"] ?>">
                <?php foreach ($teams as $team) { ?>
                    <?php

                    if ($team["idteam"] == $teammember["idteam"]) { ?>
                        <option value="<?= $team["idteam"] ?>" selected><?= $team["name"] ?></option>
                    <?php
                    } else { ?>
                        <option value="<?= $team["idteam"] ?>"><?= $team["name"] ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="">Select ID Member: </label>
            <input type="hidden" name="idmember_before" value="<?= $teammember["idmember"] ?>">
            <select name="idmember_after" id="idmember_after" required value="<?= $teammember["idmember"] ?>">
                <?php foreach ($members as $member) { ?>

                    <?php

                    if ($member["idmember"] == $teammember["idmember"]) { ?>
                        <option value="<?= $member["idmember"] ?>" selected><?= $member["username"] ?></option>

                    <?php
                    } else { ?>
                        <option value="<?= $member["idmember"] ?>"><?= $member["username"] ?></option>

                    <?php } ?>

                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Description:</label>
            <input type="text" id="description" name="description_after" required value="<?= $teammember["description"] ?>">
        </div>

        <input type="submit" id="submit" name="submit" class="btn-primary">
    </form>
</div>

</body>

</html>