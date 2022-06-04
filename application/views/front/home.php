<?php $this->load->view('front/header');?>


 <div id="CarouselExampleControls" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner" style="height:380px;">
        <div class="carousel-item active">
      <img src="
      <?php echo base_url('public/images/slide1.jpg');?>" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="
      <?php echo base_url('public/images/slide2.jpg');?>" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="
      <?php echo base_url('public/images/slide3.jpg');?>" class="d-block w-100" alt="">
    </div>
  </div>
  <a class="carousel-control-prev" href="#CarouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
  <a class="carousel-control-next" href="#CarouselExampleControls" role="button"  data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
  </div>
 <div class="container pt-4 pb-4">
<h3 class="pb-3">About Company</h3>

<p class="text-muted">
  Espoir Soft Private Limited in Uttam Nagar, Delhi<br>
  Espoir Soft Private Limited in Delhi is one of the leading businesses in the Android Training Institutes. Also known for Computer Training Institutes, Computer Training Institutes For Website Designing, Computer Software Training Institutes, Computer Training Institutes For Java, Android Training Institutes, Computer Training Institutes For Java++, Computer Training Institutes For Core Java, Computer Training Institutes For Advanced Java and much more. Find Address, Contact Number, Reviews & Ratings, Photos, Maps of Espoir Soft Private Limited, Delhi.
</p>
<p class="text-muted">
  Espoir Soft Private Limited in Uttam Nagar has a wide range of products and / or services to cater to the varied requirements of their customers. The staff at this establishment are courteous and prompt at providing any assistance. They readily answer any queries or questions that you may have. Pay for the product or service with ease by using any of the available modes of payment, such as Cash, Cheques. This establishment is functional from 10:00 - 19:00.


</p>
</div>

<div class="container bg-light">
  <h3 class="pb-3 pt-4">OUR SERVICES</h3>
  <div class="row">
<div class="col-md-3">
  <div class="card h-100">
  <img src="<?php echo base_url('public/images/box1.jpg');?>" class="card-img-top" alt="">
  <div class="card-body">
    <h5 class="card-title">Website Development</h5>
    <p class="card-text">Whatever the Service You're Looking For, We'll Help You Find a Professional For the Job. Search Thousands Of Professionals To Find the Right One For Your Needs. Over 5m Customers. Types: e-Commerce Sites, Small business sites, Responsive site design.</p>

  </div>
</div>
</div>

<div class="col-md-3">
  <div class="card h-100">
  <img src="<?php echo base_url('public/images/box2.jpg');?>" class="card-img-top" alt="">
  <div class="card-body">
    <h5 class="card-title">Digital Marketing</h5>
    <p class="card-text">Generate More Leads And Boost Your Revenue with India's #1 Digital Marketing Agency. Espor Softs Digital Marketing Services Help You Take Your Business To The Next Level.</p>

  </div>
</div>
</div>

<div class="col-md-3">
  <div class="card h-100">
  <img src="<?php echo base_url('public/images/box3.jpg');?>" class="card-img-top" alt="">
  <div class="card-body">
    <h5 class="card-title">Mobile App <br>Development</h5>
    <p class="card-text">We offer custom Mobile mobile application development & maintenance services, remote/dedicated App development teams to Startups, SMEs, and Enterprises across the globe.
.</p>

  </div>
</div>
</div>

<div class="col-md-3">
  <div class="card h-100">
  <img src="<?php echo base_url('public/images/box4.jpg');?>" class="card-img-top" alt="">
  <div class="card-body">
    <h5 class="card-title">IT Consulting Services</h5>
    <p class="card-text">Trusted results for It Support Services Uk. Check Visymo Search for the best results! Unlimited Access. Always Facts. Privacy Friendly. The Best Resources. Results & Answers. Services: Best Results, Explore Now, New Sources, Best in Search..</p>

  </div>
</div>
</div>

  </div>

</div>

 <?php if(!empty($articles)){?>
<div class="pb-4 pt-4">
  <div class="container">
    <h3 class="pb-3 pt-4"> LATEST BLOG </h3>

    <div class="row">
      <?php foreach ($articles as $article) { ?>

  <div class="col-md-3">
    <div class="card h-100">
       <a href="<?php echo base_url('blog/detail/'.$article['id'])?>">
      <?php if(file_exists('./public/uploads/articles/thumb_admin/'.$article['image'])){ ?>

        <img src="<?php echo base_url('public/uploads/articles/thumb_admin/'.$article['image'])?>" class="card-img-top" alt="">

      <?php } ?>
    </a>


    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text"><?php echo $article['title']?></p>

         <a  class="btn btn-primary btn-sm" href="<?php echo base_url('blog/detail/'.$article['id'])?>">Read More</a>
      <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
    </div>
  </div>
  </div>
<?php } ?>
<!--  <div class="col-md-3">
    <div class="card">
    <img src="<?php echo base_url('public/images/box2.jpg');?>" class="card-img-top" alt="">
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
  </div>

  <div class="col-md-3">
    <div class="card">
    <img src="<?php echo base_url('public/images/box3.jpg');?>" class="card-img-top" alt="">
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
  </div>

  <div class="col-md-3">
    <div class="card">
    <img src="<?php echo base_url('public/images/box4.jpg');?>" class="card-img-top" alt="">
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
  </div>
-->
    </div>
  </div>

</div>
<?php } ?>
<?php $this->load->view('front/footer');?>
