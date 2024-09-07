<form action="<?= LOGOUT_FILE ?>">
    <input type="hidden" name="token" value="<?= $auth['token'] ?>">
    <button type="submit" name='logout'>Выход</button>
</form>