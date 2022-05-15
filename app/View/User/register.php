<form action="/user/create" method="post" enctype="multipart/form-data">
    <div>
        <label for="username">Username</label>
        <input type="text" for="username" name="username" class="border">
    </div>
    <div>
        <label for="email">Email Address</label>
        <input type="email" for="email" name="email" class="border">
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
        <input type="submit" value="Register">
    </div>
</form>