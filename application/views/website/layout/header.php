<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Global Biz Setup</title>
  <!-- Required meta tags -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Notiflix for alert messages -->
  <link rel="stylesheet" href="<?php echo base_url() ?>adminAssets/notiflix/notiflix-2.4.0.min.css" />
  <script src="<?php echo base_url() ?>adminAssets/notiflix/notiflix-2.4.0.min.js"></script>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- PayU Money Scripts -->
  <!-- BOLT Sandbox/test //-->
  <script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt- color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>
  <!-- BOLT Production/Live //-->
  <!-- <script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script> -->
  <style>
    .checked {
      color: orange;
    }
  </style>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/') ?>index.css">
  <!-- baseUrl -->
  <script>
    const BASE_URL = '<?php echo base_url() ?>';
  </script>
  <!-- Ajax Post library -->
  <script src="<?php echo base_url() ?>adminAssets/js/MyScriptLibrary.js"></script>
</head>

<body>
  <!-- Header start -->
  <header id="header" class="container-fluid">
    <div class="col-sm-12">
      <nav class="navbar">
        <div class="logo">
          <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/') ?>image/logo.png" alt="ca.com"></a>
        </div>
        <div id="mainMenu-trigger">
          <a class="lines-button x" rel="nofollow"><span class="lines"></span></a>
        </div>
        <ul>
          <?php if (isset($categories)) {
            for ($i = 0; $i < count($categories); $i++) { ?>
              <li class="dropdown show">
                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $categories[$i]['category'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="left:-140px">
                  <div class="col-sm-12 row m-0">
                    <?php if (isset($gServices)) {
                      $subId = [];
                      foreach ($gServices as $key => $value) {
                        if ($categories[$i]['id'] == $value[0]['category_id']) {
                    ?>
                          <div class="col-sm-6 items p-0">
                            <?php for ($j = 0; $j < count($value); $j++) {
                              if ($categories[$i]['id'] == $value[$j]['category_id']) {
                                $sbId =  $value[$j]['sub_category'];
                            ?>
                                <?php if (!in_array($sbId, $subId)) {
                                  array_push($subId, $sbId);
                                ?>
                                  <span class="dropdown-item p-0"><?php echo ucwords($value[$j]['sub_cat_name']); ?></span>
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
          <li class="dropdown"><a class="btn" href="<?php echo base_url('Login') ?>">Sign in</a></li>
        </ul>
      </nav>
    </div>
  </header>