<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
$this->load->helper('form');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CodeIgniter</title>
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    </head>
    <body>

        <?php $this->load->view('template/header'); ?>
        <main role="main" class="container py-4">
            <?php $this->load->view($v, $data = []); ?>
        </main>
        <?php $this->load->view('template/footer'); ?>

        <script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    </body>
</html>