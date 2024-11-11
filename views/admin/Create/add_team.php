<?php require __DIR__ . '/../../components/header.php'; ?>

<div class="d-flex justify-content-center align-items-center  mt-5">
    <h1>This is add team form</h1>
</div>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <form action="/process/addteam" method="POST" id="addteamForm">
        <div>
            <label for="">Select game: </label>
            <select name="idgame" id="idgame" required>
                <?php foreach ($games as $game) { ?>
                    <option value="<?= $game["idgame"] ?>"><?= $game["name"] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <input type="submit" id="submit" name="submit" class="btn-primary">
    </form>
</div>

</body>

</html>