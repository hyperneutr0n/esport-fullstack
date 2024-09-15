<?php require __DIR__ . '/../../components/header.php'; ?>

<div>
    <h1>This is edit event form</h1>

    <form action="/process/addevent" method="POST">
        <div>
            <label for="">ID:</label>
            <input type="text" id="idevent" name="idevent" value="<?= $event["idevent"] ?>" required disabled>
        </div>
        <div>
            <label for="">Name:</label>
            <input type="text" id="name" name="name" value="<?= $event["name"] ?>" required>
        </div>

        <div>
            <label for="">Date:</label>
            <input type="date" id="date" name="date" value="<?= $event["date"] ?>" required>
        </div>

        <div>
            <label for="">Description:</label>
            <input type="text" id="description" name="description" value="<?= $event["description"] ?>" required>
        </div>

        <input type="submit" id="submit" name="submit">
    </form>
</div>


<?php require __DIR__ . '/../../components/footer.php'; ?>