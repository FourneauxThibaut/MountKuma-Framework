<div class="w-full lg:w-4/12 px-4 mx-auto mt-32">
    <div class="px-6">
        <div class="mt-10">
            <div class="w-full px-4 flex justify-center">
                 <label tabindex="0" class="btn btn-ghost btn-circle avatar h-32 w-32">
                    <div class="rounded-full">
                        <img src="https://api.lorem.space/image/face?hash=33791" />
                    </div>
                </label>
            </div>
            <div class="mt-20 overflow-x-auto w-full">
                <table class="table w-full bg-base-200">
                    <tbody>
                    <!-- row 1 -->
                    <tr>
                        <td>
                            ID
                        </td>
                        <td>
                            <?= $data['user']['id']; ?>
                        </td>
                    </tr>
                    <!-- row 2 -->
                    <tr>
                        <td>
                            User Name
                        </td>
                        <td>
                            <?= $data['user']['name'] ?>
                        </td>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                        <td>
                            Email Address
                        </td>
                        <td>
                            <?= $data['user']['email'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Role
                        </td>
                        <td>
                            <?php 
                                if ($data['user']['access'] == 'guest') {
                                    echo 'User';
                                }else{
                                    echo $data['user']['access'];
                                }                    
                            ?>
                        </td>
                    </tr>
                    <!-- row 4 -->
                    <tr>
                        <td>
                            Creation date
                        </td>
                        <td>
                            <?= $data['user']['creation_date']; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>