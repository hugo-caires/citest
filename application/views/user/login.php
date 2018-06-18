<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- <div class="container"> -->
	<div class="row justify-content-lg-center">

        <div class="col col-lg-6">

            <div class="card">
                <h5 class="card-header">Login</h5>
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

                    <?= form_open('user/login', '', ['type' => 'main']) ?>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="lembrar" name="lembrar">
                            <label class="form-check-label" for="lembrar">
                                Lembrar password
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Login">
                            <a href="<?= base_url('index.php/user/register') ?>" role="button" class="btn btn-secondary">Recuperar password</a>
                            <a href="<?= base_url('index.php/user/register') ?>" role="button" class="btn btn-secondary">Registar novo utilizador</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        
	</div>
<!-- </div> -->