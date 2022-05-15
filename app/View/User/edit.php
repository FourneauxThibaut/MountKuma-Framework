<form action="/user/<?= $data['user']['id'] ?>/update" method="post" enctype="multipart/form-data">
    <?php
        if (! empty($_SESSION['auth']) && $_SESSION['auth']['access'] == 'admin') {
    ?>
        <div class="form-group">
            <label for="access">Access</label>
            <select name="access" id="access" class="form-control">
                <option value="admin" <?= $data['user']['access'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="user" <?= $data['user']['access'] == 'guest' ? 'selected' : '' ?>>User</option>
            </select>
        </div>
    <?php } ?>

    <div>
        <label for="username">Username</label>
        <input type="text" for="username" name="username" class="border" value="<?= $data['user']['name'] ?>">
    </div>
    <div>
        <label for="email">Email Address</label>
        <input type="email" for="email" name="email" class="border" value="<?= $data['user']['email'] ?>">
    </div>
    <div>
        <label for="old-password">Old Password</label>
        <input type="password" for="old-password" name="old-password" class="border">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" for="password" name="password" class="border">
    </div>
    <div>
        <label for="password-confirmation">Password Confirmation</label>
        <input type="password" for="password-confirmation" name="password-confirmation" class="border">
    </div>

    <div>
        <input type="submit" value="Update">
    </div>
</form>