<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="<?= base_url() ?>">Navbar</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= (!$this->uri->segment(1) || $this->uri->segment(1) == 'home' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url() ?>">Início <span class="sr-only">(current)</span></a>
                </li>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
                    <li class="nav-item <?= ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == 'userlist' ? 'active' : '') ?>">
                        <a class="nav-link" href="<?= base_url('index.php/user/userlist') ?>">Utilizadores</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item <?= ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == 'register' ? 'active' : '') ?>">
                        <a class="nav-link" href="<?= base_url('index.php/user/register') ?>">Registar</a>
                    </li>
                <?php } ?>
            </ul>
            <div class="dropdown">
                <a class="nav-link navbar-text dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
                        <?= $_SESSION['nome'] ?>
                    <?php } else { ?>  
                        Login
                    <?php } ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>

                        <a class="dropdown-item" href="<?= base_url('index.php/user/perfil') ?>">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('index.php/user/logout') ?>">Sair</a>

                    <?php } else { ?>

                        <?= form_open('user/login', ['class' => 'px-3 py-2'], ['type' => 'header']) ?>
                            <div class="form-group">
                                <label for="header_email">Email</label>
                                <input type="email" class="form-control" id="header_email" name="header_email" placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label for="header_password">Password</label>
                                <input type="password" class="form-control" id="header_password" name="header_password" placeholder="Your password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="header_lembrar" name="header_lembrar">
                                <label class="form-check-label" for="header_lembrar">
                                    Lembrar password
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default" value="Login">
                            </div>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('index.php/user/register') ?>">Registar novo utilizador</a>
                        <a class="dropdown-item" href="#">Recuperar password</a>

                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</nav>