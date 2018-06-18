<?php if (isset($_SESSION['flash'])) { ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
        <?= $_SESSION['flash']['msg'] ?>
    </div>
<?php } ?>


home

