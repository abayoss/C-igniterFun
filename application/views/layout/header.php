<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/lux/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="<?php echo base_url() ?>">CI-blog-TM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <?php $first_part = basename($_SERVER['PHP_SELF'], ".php"); ?>
                <li class="nav-item <?= $first_part == "posts" ? "active" : ""; ?>">
                    <a class="nav-link" href="<?= base_url() ?>posts">Posts</a>
                </li>
                <li class="nav-item <?= $first_part == "about" ? "active" : ""; ?>">
                    <a class="nav-link" href="<?= base_url() ?>about">About</a>
                </li>
            </ul>
            <?php if (!$this->session->userdata('logged_in')) : ?>
                <ul class="navbar-nav">
                    <li class="nav-item <?= $first_part == "auth/login" ? "active" : ""; ?>">
                        <a class="nav-link" href="<?php echo base_url(); ?>auth/login">Login</a>
                    </li>
                    <li class="nav-item <?= $first_part == "auth/register" ? "active" : ""; ?>">
                        <a class="nav-link" href="<?php echo base_url(); ?>auth/register">Register</a>
                    </li>
                </ul>
            <?php endif; ?>
            <?php if ($this->session->userdata('logged_in')) : ?>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>auth/logout">Logout</a></li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>posts/submit" class="nav-link">New Post</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container pt-3 pb-5 mb-5">
        <!-- Flash messages -->
        <div>
            <?php if ($this->session->flashdata('user_registered')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('post_created')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_created') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('post_updated')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_updated') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('category_created')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_created') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('post_deleted')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_deleted') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('login_failed')) : ?>
                <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('user_loggedin')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('user_loggedout')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
            <?php endif; ?>

            <?php if ($this->session->flashdata('category_deleted')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_deleted') . '</p>'; ?>
            <?php endif; ?>
        </div>
        <!-- end flash messages -->
        <h1>
            <?= $title ?>
        </h1>