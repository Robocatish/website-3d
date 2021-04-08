<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';?>
<br>
    <div>
        <h1>Регистрация</h1>
        <form action="register.php" method="post">
                <div>
                    <label for="nickname">Никнейм:</label>
                    <input type="text" id="nickname" name="nickname"
                            value="<?=$_SESSION['nickname'] ?? ''?>">
                    <span class="error" style="display: <?= $_SESSION['errors']['nickname'] ? 'block':'none'?>">
                        <?=$_SESSION['errors']['nickname']?>
                    </span>
                </div>
                <div>
                    <label for="email">Электронная почта</label>
                    <input type="text" id="email" name="email"
                           value="<?=$_SESSION['email'] ?? ''?>">
                    <span class="error" style="display: <?=$_SESSION['errors']['email'] ? 'block':'none'?>">
                        <?=$_SESSION['errors']['email']?>
                    </span>
                </div>
                <div>
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password"
                           value="<?=$_SESSION['password'] ?? ''?>">
                    <span class="error" style="display: <?=$_SESSION['errors']['password'] ? 'block':'none'?>">
                        <?=$_SESSION['errors']['password']?>
                    </span>
                </div>
                <p><span class="error" style="display: <?=$_SESSION['errors']['register'] ? 'block':'none'?>">
                        <?=$_SESSION['errors']['register'] ?? '' ?>
                    </span></p>
            <button type="submit" name="submit">Зарегестрироваться</button>
        </form>
    </div>
<?php include $_SERVER['DOCUMENT_ROOT']. '/templates/footer.php'; ?>