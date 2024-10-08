<?php require __DIR__ . '/../../components/header.php'; ?>

<h1>This is edit event teams form</h1>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <form action="/process/updateeventteams" method="POST" id="addteamForm">

        <div>
            <label for="">Select event: </label>
            <input type="hidden" name="idevent_before" value="<?= $eventteam["idevent"] ?>">
            <select name="idevent_after" id="idevent_after" required value="<?= $eventteam["idevent"] ?>">
                <?php foreach ($events as $event) { ?>

                    <?php
                    if ($event["idevent"] == $eventteam["idevent"]) { ?>
                        <option value="<?= $event["idevent"] ?>" selected><?= $event["name"] ?></option>
                    <?php
                    } else { ?>
                        <option value="<?= $event["idevent"] ?>"><?= $event["name"] ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="">Select team: </label>
            <input type="hidden" name="idteam_before" value="<?= $eventteam["idteam"] ?>">
            <select name="idteam_after" id="idteam" required value="<?= $eventteam["idteam"] ?>">
                <?php foreach ($teams as $team) { ?>

                    <?php
                    if ($team["idteam"] == $eventteam["idteam"]) { ?>
                        <option value="<?= $team["idteam"] ?>" selected><?= $team["name"] ?></option>

                    <?php
                    } else { ?>
                        <option value="<?= $team["idteam"] ?>"><?= $team["name"] ?></option>

                    <?php } ?>
                <?php } ?>
            </select>
        </div>

        <input type="submit" id="submit" name="submit" class="btn-primary">
    </form>
</div>

</body>

</html>