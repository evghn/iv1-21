<form action="<?= LOGOUT_FILE . '?token=' . $auth['token'] ?>" method="post">
    <!-- <input type="hidden" name="token" value="<?= $auth['token'] ?>"> -->
    <button type="submit" name='logout'>Выход</button>
</form>