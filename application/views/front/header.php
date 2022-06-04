<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css');?>" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>espoirsoft</title>
      <link rel="stylesheet" href="imageh/css/jquery.jqZoom.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <?=  link_tag("css/style.css"); ?>
        <?=  link_tag("css/yle.css"); ?>
  </head>
  <body>
  <header class="bg-light">
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light pt-3 pb-3">
    <div class="container-fluid">
    <div id="ll">
      <a class="navbar-brand" href="" id="heading"><b style=" font-size: 30px; color:blue;"><b>Welcome to </b>Espoirsoft Pvt.Ltd</b></a>
    </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">

      </button>
      <div  id="navbarColor01">

        <ul class="navbar-nav ml-auto">


          <li class="nav-item"id="a">
            <a class="nav-link active" href="<?php echo base_url().'home/index';?>">HOME
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item" id="b">
            <a class="nav-link" href="<?php echo base_url().'page/index';?>">ABOUT US</a>
          </li>
          <li class="nav-item" id="c">
            <a class="nav-link" href="<?php echo base_url().'page/services';?>">SERVICES</a>
          </li>
          <li class="nav-item" id="d">
            <a class="nav-link" href="<?php echo base_url().'blog/index';?>">BLOG</a>
          </li>
          <li class="nav-item" id="e">
            <a class="nav-link" href="<?php echo base_url().'blog/categories';?>">CATEGORIES</a>
          </li>
          <li class="nav-item" id="f">
            <a class="nav-link" href="<?php echo base_url().'page/contact';?>">CONTACT US</a>
          </li>


        </ul>

      </div>
    </div>
  </nav>
</div>
</header>
