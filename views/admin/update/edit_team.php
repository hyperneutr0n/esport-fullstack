<?php require __DIR__ . '/../../components/header.php'; ?>

<h1>This is edit team form</h1>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <form action="/process/updateteam" method="POST" id="addteamForm">
        <div>
            <label for="">ID team:</label>
            <input type="text" name="ids" disabled value="<?= $team["idteam"] ?>">
            <input type="hidden" name="id" value="<?= $team["idteam"] ?>">
        </div>
        <div>
            <label for="">Select game: </label>
            <select name="idgame" id="idgame" required value="<?= $team["idgame"] ?>">
                <?php foreach ($games as $game) { ?>
                    <?php

                    if ($game["idgame"] == $team["idgame"]) { ?>
                        <option value="<?= $game["idgame"] ?>" selected><?= $game["name"] ?></option>

                    <?php
                    } else { ?>
                        <option value="<?= $game["idgame"] ?>"><?= $game["name"] ?></option>
                    <?php } ?>

                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Name:</label>
            <input type="text" id="name" name="name" required value="<?= $team["name"] ?>">
        </div>

        <input type="submit" id="submit" name="submit" class="btn-primary">
    </form>
</div>

</body>

</html>