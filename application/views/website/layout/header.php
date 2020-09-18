<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Notiflix for alert messages -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminAssets/notiflix/notiflix-2.4.0.min.css" />
  <script src="<?php echo base_url() ?>adminAssets/notiflix/notiflix-2.4.0.min.js"></script>
  <style>
    .checked {
      color: orange;
    }
  </style>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/') ?>index.css">
  <title><?php echo $title; ?></title>
</head>

<body>
  <!-- Header start -->
  <header id="header" class="container-fluid">
    <div class="col-sm-12">
      <nav class="navbar">

        <div class="logo">
          <img src="<?php echo base_url('assets/') ?>image/logo.png" alt="ca.com">
        </div>
        <ul>

          <li class="dropdown show">
            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Business Startups
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>

          <li class="dropdown show">
            <a class="btn" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              GST Registration
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>

          <li class="dropdown show">
            <a class="btn" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Income Tax
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>

          <li class="dropdown show">
            <a class="btn" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Compliance
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>

          <!-- <li><a href="">Business Startups</a> </li>
          <li><a href="">GST Registration</a> </li> -->
          <!-- <li><a href="">Income Tax</a></li>
          <li><a href="">Compliance</a></li> -->
        </ul>
      </nav>
    </div>
  </header>