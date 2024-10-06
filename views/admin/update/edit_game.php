<?php require __DIR__ . '/../../components/header.php'; ?>

<div class="d-flex justify-content-center align-items-center mt-5">
    <h1>This is edit game form</h1>
</div>
<div class="d-flex justify-content-center align-items-center mb-5">

    <form action="/process/updategame" method="POST">
        <div>
            <label for="">ID Game:</label>
            <input type="text" id="idgames" name="idgames" disabled value="<?= $game["idgame"] ?>">
            <input type="hidden" id="idgame" name="idgame" value="<?= $game["idgame"] ?>">
        </div>
        <div>
            <label for="">Name:</label>
            <input type="text" id="name" name="name" value="<?= $game["name"] ?>" required>
        </div>

        <div>
            <label for="">Description</label>
            <input type="text" id="description" name="description" value="<?= $game["description"] ?>" required>
        </div>

        <input type="submit" id="submit" name="submit" class="btn-primary">
    </form>
</div>


<?php require __DIR__ . '/../../components/footer.php'; ?>