<footer class="bg-light pt-4 pb-4 mt-5" style="color:red;">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h5>ADDRESS</h5>
        <small class="text-muted">
          <b>Espoirsoft Pvt.Ltd</b><br>
            PLOT NO.-10, THIRD FLOOR, PREM NAGAR,<br> UTTAM NAGAR, Delhi - 110059 <br>
               8802931278,<br>
               ganeshmishra1997@gmail.com
        </small>
        </div>
        <div class="col-md-3">
        <h5> IMPORTENT LINKS </h5>
        <ul class="list-unstyled text-small">
          <li><a href="<?php echo base_url().'page/index';?>" class="text-muted">About Us </a></li>
            <li><a href="<?php echo base_url().'page/services';?>" class="text-muted">Services </a></li>
              <li><a href="<?php echo base_url().'blog/index';?>" class="text-muted">Blog </a></li>
                <li><a href="<?php echo base_url().'blog/categories';?>" class="text-muted">Categories</a></li>
        </ul>
          </div>
          <div class="col-md-3">
            <h5> MY ACCOUNT </h5>
            <ul class="list-unstyled text-small">
              <li><a href="#" class="text-muted">Login </a></li>
                <li><a href="#" class="text-muted">Registers </a></li>
                  <li><a href="#" class="text-muted">Articles </a></li>
                    <li><a href="#" class="text-muted">Categories</a></li>
            </ul>
            </div>

            <div class="col-md-3">
              <h5> SUPPORTS </h5>
              <ul class="list-unstyled text-small">
                <li><a href="<?php echo base_url().'page/contact';?>" class="text-muted">Contect us </a></li>

              </ul>
              </div>
  </div>
  </div>

</footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="<?php echo base_url('public/js/min.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js');?>"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
    <script>
    $("#heading").on({
    click:function(){
    $(this).css("background-color","red");
     },
    mouseenter: function(){
     $(this).css("background-color","green");
     },
      mouseleave: function(){
        $(this).css("background-color","white");
       },
      });

      $("#a").on({
        mouseenter: function(){
         $(this).css("background-color","green");
       }
       });
       $("#b").on({
         mouseenter: function(){
          $(this).css("background-color","red");
        }
        });
        $("#c").on({
          mouseenter: function(){
           $(this).css("background-color","yellow");
         }
         });
         $("#d").on({
           mouseenter: function(){
            $(this).css("background-color","blue");
          }
          });
          $("#e").on({
            mouseenter: function(){
             $(this).css("background-color","red");
           }
           });
           $("#f").on({
             mouseenter: function(){
              $(this).css("background-color","green");
            }
            });
            $("#a").on({
              mouseenter: function(){
               $(this).css("background-color","green");
             }
             });
             $("#a").on({
               mouseenter: function(){
                $(this).css("background-color","green");
              }
              });


    </script>
  </body>
</html>
