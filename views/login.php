<?php require __DIR__ . '/components/header.php'; ?>

<div>
    <h1>This is login form</h1>

    <form action="/process/login" method="POST" id="loginForm">
        <div>
            <label for="">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>
            <label for="">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="">Show password</label>
            <input type="checkbox" id="showPassword" name="showPassword">
        </div>

        <input type="submit" id="submit" name="submit">

    </form>


</div>

<script>
    document.getElementById("showPassword").addEventListener("change", function() {
        const passwordInput = document.getElementById("password");

        if (this.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }

    });
</script>

<?php require __DIR__ . '/components/footer.php'; ?>