<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form method="post" action="../controllers/Signup.php">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="text" id="password" name="password">
            </li>
            <li>
                <label for="repassword">Password (retype)</label>
                <input type="text" id="repassword" name="repassword">
            </li>

            <input type="submit" value="Sign up">
        </ul>

    </form>
</body>
</html>