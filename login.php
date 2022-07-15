<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "log">
    <form action="index.php" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Введите логин" required>
        <label>Password</label>
        <input type="password" name="password" placeholder="Введите пароль" required>
        <label>Date of birth</label>
        <input type="date" name="date" placeholder="Введите дату рождения">
        <input type="hidden" name="time_input" value=<?=time();?>>
        <button type="submit">Войти</button>
        </form>
    </div> 
</body>
</html>




