<?php require __DIR__ . '/../../components/header.php'; ?>

<div>
    <h1>This is add team form</h1>

    <form action="/process/addteam" method="POST" id="addteamForm">
        <div>
            <label for="">ID team:</label>
            <input type="text" name="id" disabled value="<?= $team["idteam"] ?>">
        </div>
        <div>
            <label for="">Select game: </label>
            <select name="idgame" id="idgame" required value="<?= $team["idgame"] ?>">
                <?php foreach ($games as $game) { ?>
                    <option value="<?= $game["idgame"] ?>"><?= $game["name"] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Name:</label>
            <input type="text" id="name" name="name" required value="<?= $team["name"] ?>">
        </div>

        <input type="submit" id="submit" name="submit">
    </form>
</div>

<?php require __DIR__ . '/../../components/footer.php'; ?>