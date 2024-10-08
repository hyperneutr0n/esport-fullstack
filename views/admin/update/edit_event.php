<?php require __DIR__ . '/../../components/header.php'; ?>

<h1>This is edit event form</h1>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

    <form action="/process/updateevent" method="POST">
        <div>
            <label for="">ID:</label>
            <input type="text" id="idevent1" name="idevent1" value="<?= $event["idevent"] ?>" required disabled>
            <input type="hidden" id="idevent" name="idevent" value="<?= $event["idevent"] ?>" required>
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

        <input type="submit" id="submit" name="submit" class="btn-primary">
    </form>
</div>


</body>

</html>