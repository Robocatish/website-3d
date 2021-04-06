<?php include $_SERVER["DOCUMENT_ROOT"]. '/templates/header.php';?>
<br>
<div class="auth">
    <h1>Авторизация</h1>
    <form action="login.php" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="authInput"
            value="<?= $_SESSION['email'] ?? '' ?>">
        </div>
        <div>
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" class="authInput"
            value="<?= $_SESSION['password'] ?? ''?>">
        </div>
        <p><span class="error">
                <?= $_SESSION['errors']['auth']?>
            </span></p>
        <button type="submit" name="submit" class="enterInAccount">Войти</button>
    </form>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"]. '/templates/footer.php';?>
