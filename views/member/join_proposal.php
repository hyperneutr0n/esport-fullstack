<?php require __DIR__ . '/../components/header.php'; ?>

<div>
    <h1>This is join proposal form</h1>

    <form action="/process/joinproposal" method="POST" id="addteamForm">

        <div>
            <label for="">Select team: </label>
            <select name="idteam" id="idteam" required>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
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