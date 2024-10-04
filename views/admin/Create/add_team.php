<?php require __DIR__ . '/../../components/header.php'; ?>

<div>
    <h1>This is add team form</h1>

    <!-- buat nampilin alert notification -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= isset($_SESSION['message_type']) ? $_SESSION['message_type'] : 'info' ?>">
            <?= $_SESSION['message']; ?>
        </div>
        <?php
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
        ?>
    <?php endif; ?>


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

        <input type="submit" id="submit" name="submit">
    </form>
</div>

<?php require __DIR__ . '/../../components/footer.php'; ?>