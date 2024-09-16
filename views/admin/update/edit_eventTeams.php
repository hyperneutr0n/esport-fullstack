<?php require __DIR__ . '/../../components/header.php'; ?>

<div>
    <h1>This is edit event teams form</h1>

    <form action="/process/updateeventteams" method="POST" id="addteamForm">

        <div>
            <label for="">Select event: </label>
            <input type="hidden" name="idevent_before" value="<?= $eventteam["idevent"] ?>">
            <select name="idevent_after" id="idevent_after" required value="<?= $eventteam["idevent"] ?>">
                <?php foreach ($events as $event) { ?>
                    <option value="<?= $event["idevent"] ?>"><?= $event["name"] ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="">Select team: </label>
            <input type="hidden" name="idteam_before" value="<?= $eventteam["idteam"] ?>">
            <select name="idteam_after" id="idteam" required value="<?= $eventteam["idteam"] ?>">
                <?php foreach ($teams as $team) { ?>
                    <option value="<?= $team["idteam"] ?>"><?= $team["name"] ?></option>
                <?php } ?>
            </select>
        </div>

        <input type="submit" id="submit" name="submit">
    </form>
</div>

<?php require __DIR__ . '/../../components/footer.php'; ?>