<?php require __DIR__ . '/../components/header.php'; ?>

<div>
    <h1>This is add event teams form</h1>

    <form action="/process/addeventteams" method="POST" id="addteamForm">

        <div>
            <label for="">Select team: </label>
            <select name="idevent" id="idevent" required>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>

        <div>
            <label for="">Select team: </label>
            <select name="idteam" id="idteam" required>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>

        <input type="submit" id="submit" name="submit">
    </form>
</div>

<?php require __DIR__ . '/../components/footer.php'; ?>