<?php require __DIR__ . '/../../components/header.php'; ?>

<div>
    <h1>This is join proposal form</h1>

    <form action="/process/updatejoinproposal" method="POST" id="addteamForm">

        <div>
            <label for="">ID Join Proposal:</label>
            <input type="text" name="id1" value="<?= $joinproposal["idjoin_proposal"] ?>" disabled>
            <input type="hidden" name="id" value="<?= $joinproposal["idjoin_proposal"] ?>">
        </div>

        <div>
            <label for="">Select team: </label>
            <select name="idteam" id="idteam" required value="<?= $joinproposal["idteam"] ?>">
                <?php foreach ($teams as $team) { ?>
                    <option value="<?= $team["idteam"] ?>"><?= $team["name"] ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="">Select ID Member: </label>
            <select name="idmember" id="idmember" required value="<?= $joinproposal["idmember"] ?>">
                <?php foreach ($members as $member) { ?>
                    <option value="<?= $member["idmember"] ?>"><?= $member["username"] ?></option>
                <?php } ?>
            </select>
        </div>


        <div>
            <label for="">Description: </label>
            <input type="text" id="description" name="description" value="<?= $joinproposal["description"] ?>">
        </div>

        <div>
            <label for="">Status: </label>
            <select name="status" id="status">
                <option value="waiting">Waiting</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>

        <input type="submit" id="submit" name="submit">
    </form>
</div>

<?php require __DIR__ . '/../../components/footer.php'; ?>