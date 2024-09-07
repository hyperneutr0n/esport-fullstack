<?php require __DIR__ . '/components/header.php'; ?>

<div>
    <h1>This is login form</h1>

    <form action="/process/login" method="POST">
        <div>
            <label for="">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>
            <label for="">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <input type="submit" id="submit" name="submit">

    </form>


</div>

<?php require __DIR__ . '/components/footer.php'; ?>