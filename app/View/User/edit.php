<div class="mx-10 my-4 text-sm breadcrumbs">
    <ul>
        <li><a href="/">Home</a></li> 
        <li><a href="/users">Users</a></li> 
        <li><a href="/user/<?= $data['user']['id'] ?>">Profile</a></li>
        <li class="text-cyan-500">Edit</li>
    </ul>
</div>

<form action="/user/<?= $data['user']['id'] ?>/update" method="post" enctype="multipart/form-data">
    <div class="w-full lg:w-4/12 px-4 mx-auto">
        <div class="px-6">
            <div class="mt-10">
                <div class="w-full px-4 flex justify-center">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar h-32 w-32">
                        <div class="rounded-full">
                            <img src="https://api.lorem.space/image/face?hash=33791" />
                        </div>
                    </label>
                </div>
                <div class="mt-10 overflow-x-auto w-full">
                    <table class="table w-full bg-base-200 p-8">
                        <tbody>
                        <!-- row 1 -->
                        <tr>
                            <td>
                                <label for="username">Username</label>
                            </td>
                            <td>
                                <input type="text" for="username" name="username" class="input input-bordered input-info w-full max-w-xs" value="<?= $data['user']['name'] ?>">
                            </td>
                        </tr>
                        <!-- row 2 -->
                        <tr>
                            <td>
                                <label for="email">Email Address</label>
                            </td>
                            <td>
                                <input type="email" for="email" name="email" class="input input-bordered input-info w-full max-w-xs" value="<?= $data['user']['email'] ?>">
                            </td>
                        </tr>
                        <!-- row 3 -->
                        <?php
                            if (! empty($_SESSION['auth']) && $_SESSION['auth']['access'] == 'admin') {
                        ?>
                            <tr>
                                <td>
                                    <label for="access">Access</label>
                                </td>
                                <td>
                                    <select name="access" id="access" class="select select-info w-full max-w-xs">
                                        <option value="admin" <?= $data['user']['access'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="user" <?= $data['user']['access'] == 'guest' ? 'selected' : '' ?>>User</option>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
                        <!-- row 4 -->
                        <tr>
                            <td>
                                <label for="email">Email Address</label>
                            </td>
                            <td>
                                <input type="email" for="email" name="email" class="input input-bordered input-info w-full max-w-xs" value="<?= $data['user']['email'] ?>">
                            </td>
                        </tr>
                        <!-- row 5 -->
                        <tr>
                            <td>
                                <label for="old-password">Old Password</label>
                            </td>
                            <td>
                                <input type="password" for="old-password" name="old-password" class="input input-bordered input-info w-full max-w-xs">
                            </td>
                        </tr>
                        <!-- row 6 -->
                        <tr>
                            <td>
                                <label for="password">New Password</label>
                            </td>
                            <td>
                                <input type="password" for="password" name="password" class="input input-bordered input-info w-full max-w-xs">
                            </td>
                        </tr>
                        <!-- row 6 -->
                        <tr>
                            <td>
                                <label for="password-confirmation">Password Confirmation</label>
                            </td>
                            <td>
                                <input type="password" for="password-confirmation" name="email" class="input input-bordered input-info w-full max-w-xs">
                            </td>
                        </tr>
                        <!-- row 7 -->
                        <tr>
                            <td></td>
                            <td>
                                <input class="w-full btn text-white bg-cyan-600 hover:bg-cyan-700" type="submit" value="Update">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>