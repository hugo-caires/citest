<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="card">
    <h5 class="card-header">Utilizadores</h5>
    <div class="card-body">

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Registo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['users'] as $k => $user) { ?>
                    <tr <?=($_SESSION['user_id'] == $user['id'] ? 'class="table-info"' : '')?>>
                        <th scope="row"><?=$k+1?></th>
                        <td><?=$user['nome']?></td>
                        <td><?=$user['email']?></td>
                        <td><?=$user['criacao']?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>