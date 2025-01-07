<?php require __DIR__ . '/components/header.php'; ?>

<?php if (isset($_GET["message"])) {

    $message = $_GET["message"];
    echo "<script>";
    echo 'alert(' . json_encode($message) . ')';
    echo "</script>";
} ?>

<div class="d-flex justify-content-center align-items-center mt-5">

    <form action="/process/login" method="POST" id="loginForm">
        <label for="">Username:</label>
        <div>
            <input type="text" id="username" name="username" required>
        </div>

        <label for="">Password:</label>
        <div>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="">Show password</label>
            <input type="checkbox" id="showPassword" name="showPassword">
        </div>


        <div class="d-flex mt-5" style="justify-content:space-between">
            <a href="/member/register">Register</a>

            <input type="submit" id="submit" name="submit" value="Login" class="btn-primary">
        </div>

    </form>
</div>




<script>
    $("#showPassword").click(function() {
        const passwordInput = $("#password");
        if (this.checked) {
            passwordInput.attr("type", "text");
        } else {
            passwordInput.attr("type", "password");
        }
    });
</script>

</body>

</html>