<?php require __DIR__ . '/../components/header.php'; ?>

<div>
    <h1>This is add team members form</h1>

    <form action="/process/addteammembers" method="POST">
        <div>
            <label for="">Select ID Team: </label>
            <select name="idgame" id="idgame" required>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>

        <div>
            <label for="">Select ID Member: </label>
            <select name="idgame" id="idgame" required>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>
        <div>
            <label for="">Description:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <input type="submit" id="submit" name="submit">
    </form>
</div>

<?php require __DIR__ . '/../components/footer.php'; ?>