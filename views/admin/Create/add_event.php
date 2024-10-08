<?php require __DIR__ . '/../../components/header.php'; ?>

<div class="d-flex justify-content-center align-items-center  mt-5">
    <h1>This is add event form</h1>
</div>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5">

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

        <input type="submit" id="submit" name="submit" class="btn-primary">
    </form>
</div>


</body>

</html>