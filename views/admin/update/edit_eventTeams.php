<?php require __DIR__ . '/../../components/header.php'; ?>

<div>
    <h1>This is add event teams form</h1>

    <form action="/process/addeventteams" method="POST" id="addteamForm">

        <div>
            <label for="">Select event: </label>
            <select name="idevent" id="idevent" required>
                <?php foreach ($events as $event) { ?>
                    <option value="<?= $event["idevent"] ?>"><?= $event["name"] ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="">Select team: </label>
            <select name="idteam" id="idteam" required>
                <?php foreach ($teams as $team) { ?>
                    <option value="<?= $team["idteam"] ?>"><?= $team["name"] ?></option>
                <?php } ?>
            </select>
        </div>

        <input type="submit" id="submit" name="submit">
    </form>
</div>

<?php require __DIR__ . '/../../components/footer.php'; ?>