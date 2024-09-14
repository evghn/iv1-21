<form action="<?= $_SESSION['post_action'] ?>" method="post">
    <?php if (empty($_SESSION['login'])): ?>        
        <input type="text" name="login">
        <button type="submit" name="sign-in">Войти</button>
    <?php else: ?>
        <div>User: <?= $_SESSION['login']?></div>
        <button type="submit" name="logout">Выйти</button>
    <?php endif ?>
</form>
