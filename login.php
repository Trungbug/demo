<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form in HTML and CSS</title>
    <link rel="stylesheet" href="styles_login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action= "" method = "get/post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder= "Username" name = "userName" required>
                <i class='bx bxs-user' ></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name = "password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>

            <div class="remeber-forgot">
                <label for="checkbox">
                    <input type="checkbox" checked> Remember me
                </label>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><br>Forgot password</a>
            </div>
            <button type="submit" class="btn" name = "login">
                Login
            </button>

            <div class="register-link">
                <p>Don't have an account?
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Register</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>