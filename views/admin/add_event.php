<?php require __DIR__ . '/../components/header.php'; ?>

<div>
    <h1>This is add game form</h1>

    <form action="/process/addevent" method="POST">
        <div>
            <label for="">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="">Date:</label>
            <input type="date" id="date" name="date" required>
        </div>

        <div>
            <label for="">Description:</label>
            <input type="text" id="description" name="description" required>
        </div>

        <input type="submit" id="submit" name="submit">
    </form>
</div>


<?php require __DIR__ . '/../components/footer.php'; ?>