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
          <?php if (isset($categories)) {
            for ($i = 0; $i < count($categories); $i++) { ?>
              <li class="dropdown show">
                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $categories[$i]['category'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="left:<?php echo ($i * -7) . 'rem' ?>">
                <div class="col-sm-12 row">
                  <?php if (isset($gServices)) {
                    $subId = [];
                    foreach ($gServices as $key => $value) {
                      if ($categories[$i]['id'] == $value[0]['category_id']) {
                  ?>
                        <div class="col-sm-4">
                          <?php for ($j = 0; $j < count($value); $j++) {
                            if ($categories[$i]['id'] == $value[$j]['category_id']) {
                              $sbId =  $value[$j]['sub_category'];
                          ?>
                              <?php if (!in_array($sbId, $subId)) {
                                array_push($subId, $sbId);
                              ?>
                                <span class="dropdown-item"><?php echo ucwords($value[$j]['sub_cat_name']); ?></span>
                              <?php } ?>

                              <a class="dropdown-item" href="<?php echo base_url('ControlUnit/service/') . base64_encode($value[$j]['serviceId']) ?>"><?php echo $value[$j]['service_name'] ?></a>

                          <?php
                            }
                          } ?>
                        </div>
                  <?php    }
                    }
                  } ?>
                </div>
                </div>
              </li>

          <?php
            }
          } ?>
        </ul>
      </nav>
    </div>
  </header>