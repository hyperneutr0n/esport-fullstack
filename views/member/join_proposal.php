<?php require __DIR__ . '/../components/header.php'; ?>

<div class="d-flex justify-content-center align-items-center mt-5">
    <h1>This is join proposal form</h1>
</div>
<div class="d-flex justify-content-center align-items-center-mt-5 mb-5">

    <form action="/process/addjoinproposal" method="POST" id="addteamForm">

        <div>
            <label for="">Select team: </label>
            <select name="idteam" id="idteam" required>
                <?php foreach ($teams as $team) { ?>
                    <option value="<?= $team["idteam"] ?>"><?= $team["name"] ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="">Select ID Member: </label>
            <select name="idmember" id="idmember" required>
                <option value="<?= $member["idmember"] ?>"><?= $member["username"] ?></option>
            </select>
        </div>


        <div>
            <label for="">Description: </label>
            <input type="text" id="description" name="description">
        </div>

        <input type="submit" id="submit" name="submit">
    </form>
</div>

<?php require __DIR__ . '/../components/footer.php'; ?>