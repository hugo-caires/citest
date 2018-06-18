<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row justify-content-lg-center">
    <div class="col col-lg-6">

        <div class="card">
            <h5 class="card-header">Registar novo utilizador</h5>
            <div class="card-body">

                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors() ?>
                    </div>
                <?php } ?>
                
                <?php if (isset($data->error)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $data->error ?>
                    </div>
                <?php } ?>

                <?= form_open('user/register', '') ?>

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>

                    <div class="row">
                        <div class="col-md">

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>

                        </div>
                        <div class="col-md">

                            <div class="form-group">
                                <label for="password_repeat">Confirmar Password</label>
                                <input type="password" class="form-control" id="password_repeat" name="password_repeat" placeholder="Repita a password">
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Registar">
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>