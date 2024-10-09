<?php require __DIR__ . '/../../components/header.php'; ?>

<h1>This is join proposal form</h1>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <form action="/process/updatejoinproposal" method="POST" id="addteamForm">

        <div>
            <label for="">ID Join Proposal:</label>
            <input type="text" name="id1" value="<?= $joinproposal["idjoin_proposal"] ?>" disabled>
            <input type="hidden" name="id" value="<?= $joinproposal["idjoin_proposal"] ?>">
        </div>

        <div>
            <label for="">Select team: </label>
            <input type="hidden" id="idteam" name="idteam" value="<?= $joinproposal['idteam'] ?>">
            <select name="idteam2" id="idteam2" required value="<?= $joinproposal["idteam"] ?>" disabled>
                <?php foreach ($teams as $team) { ?>

                    <?php

                    if ($team["idteam"] == $joinproposal["idteam"]) { ?>
                        <option value="<?= $team["idteam"] ?>" selected><?= $team["name"] ?></option>
                    <?php
                    } else { ?>
                        <option value="<?= $team["idteam"] ?>"><?= $team["name"] ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="">Select ID Member: </label>
            <input type="hidden" name="idmember" id="idmember" value="<?= $joinproposal["idmember"] ?>">
            <select name="idmember2" id="idmember2" required value="<?= $joinproposal["idmember"] ?>" disabled>
                <?php foreach ($members as $member) { ?>

                    <?php

                    if ($member["idmember"] == $joinproposal["idmember"]) { ?>
                        <option value="<?= $member["idmember"] ?>" selected><?= $member["username"] ?></option>
                    <?php
                    } else { ?>
                        <option value="<?= $member["idmember"] ?>"><?= $member["username"] ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>


        <div>
            <label for="">Description: </label>
            <input type="text" id="description2" name="description" value="<?= $joinproposal["description"] ?>" disabled>
            <input type="hidden" id="description" name="description" value="<?= $joinproposal["description"] ?>">
        </div>

        <div>
            <label for="">Status: </label>
            <select name="status" id="status">
                <?php if ($joinproposal["status"] == "waiting") { ?>
                    <option value="waiting" selected>Waiting</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>

                <?php } else if ($joinproposal["status"] == "approved") { ?>
                    <option value="waiting" disabled>Waiting</option>
                    <option value="approved" selected disabled>Approved</option>
                    <option value="rejected" disabled>Rejected</option>

                <?php } else if ($joinproposal["status"] == "rejected") { ?>
                    <option value="waiting" disabled>Waiting</option>
                    <option value="approved" disabled>Approved</option>
                    <option value="rejected" selected disabled>Rejected</option>
                <?php } ?>

            </select>
        </div>

        <input type="submit" id="submit" name="submit" class="btn-primary">
    </form>
</div>

</body>

</html>