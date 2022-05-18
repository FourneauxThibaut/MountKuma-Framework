<div class="mt-16 mx-auto overflow-x-auto" style="width: 70%;">
  <table class="table table-compact w-full rounded">
    <thead>
      <tr>
        <th></th> 
        <th>Username</th> 
        <th>Email</th> 
        <th>Role</th>
      </tr>
    </thead> 
    <tbody>
        <?php
            foreach ($data['users'] as $user) {
        ?>
            <tr>
                <th><?= $user['id'] ?></th> 
                <td><a href="/user/<?= $user['id'] ?> "> <?= $user['name'] ?> </a></td> 
                <td><a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a></td> 
                <?php 
                    if( $user['access'] == 'guest'){
                        echo '<td>User</td>';
                    }
                    else{
                        echo '<td  class="text-cyan-600 capitalize">'.$user['access'].'</td>';
                    }
                ?>
            </tr>
        <?php
            }
        ?>
    </tbody> 
  </table>
</div>