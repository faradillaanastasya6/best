<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Poppin Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;800&display=swap"
        rel="stylesheet" />

    <!-- Feather Icon  -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- CSS  -->
    <link rel="stylesheet" href="/asset/style-login.css">
</head>

<body>
    <div class="login">
        <form action="/login/auth" method="post">
            <h1>Login</h1>
            <div class="input">
                <input name="username" type="text" placeholder="Username" required>
                <!-- <i data-feather="user"></i> -->
            </div>
            <div class="input">
                <input name="password" type="password" placeholder="Password" required>
                <!-- <i data-feather="lock"></i> -->
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <a href="#">
                <button type="submit" class="button">Login</button>
            </a>
        </form>
    </div>

    <!-- Feather Icon -->
    <script>
        feather.replace();
    </script>
</body>

</html>