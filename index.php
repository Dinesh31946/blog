<?php

  session_start();
  error_reporting(0);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fontawesome file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- Custom Css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Technical Dinesh</title>
  </head>
  <body onload="myFunction()">

    <div id="loading">
      
    </div>

    <header>
      <div class="btn-left float-left">
        <div class="left-btn">
          <button class="btn btn-dark modal_btn text-white m-3" data-target="#subscribe_modal" data-toggle="modal">Subscribe</button>

          <div class="modal" id="subscribe_modal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="text-center text-dark">Subscribe</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <div class="container">
                    <form>
                      <div class="form-group m-5">
                        <input type="email" class="form-control p-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      </div>
                      <div class="form-group m-5">
                        <input type="password" class="form-control p-3" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-primary top_btn mb-3 mt-2 ml-5">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="btn-left float-right">
        <!-- <div class="left-btn">
          <button class="btn btn-dark modal_btn text-white m-3" data-target="#login_modal" data-toggle="modal">Login</button>

          <div class="modal" id="login_modal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="text-center text-dark">Subscribe</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <div class="container">
                    <form id="login">
                      <div class="form-group m-5">
                        <input type="text" class="form-control p-3" id="email" name="email" placeholder="Enter email">
                      </div>
                      <div class="form-group m-5">
                        <input type="password" class="form-control p-3" id="password" name="password" placeholder="Password">
                      </div>
                      <button type="submit" id="submit" name="submit" class="btn btn-primary top_btn mb-3 mt-2 ml-5">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- <a href="members/login.php" class="btn btn-dark modal_btn text-white m-3">Login</a> -->
        <?php 

          if($_SESSION['Login'] == 'yes'){
        ?>
          <a href="members/login.php" class="btn btn-dark modal_btn collapsed text-white m-3" href="#submenu2" data-toggle="collapse" data-target="#submenu2"><?php echo $_SESSION['name']; ?></a>
          <div class="collapse" id="submenu2" aria-expanded="false">
            <a href="members/logout.php" class="btn btn-dark modal_btn collapsed text-white m-3">Logout</a>
          </div> 
        <?php 

          }
          else{
        ?>
          <a href="members/login.php" class="btn btn-dark modal_btn text-white m-3">Login</a>


        <?php
          }

        ?>
      </div>

      <div class="main_header">
        <div class="d-flex justify-content-center align-items-center flex-column py-5">
          <h1 class="main_heading">TECHNICAL DINESH</h1>
          <p class="main_heading__para">Welcome to my <span class="text-capitalize bg-dark text-white py-2 px-3">World Of Blog</span> </p>
        </div>
      </div>

      <!-- The main images -->
      <div class="main_header__div d-flex align-items-start justify-content-center flex-column shadow">
        <p>Technical Dinesh</p>
        <h2 class="animateWord">
          <span>He is </span>
          <div>
            <ul class="flip">
              <li>a Programmer</li>
              <li>a Designer</li>
              <li>a Freelancer</li>
              <li>Awesome</li>
            </ul>
          </div>
        </h2>

        <button class="text-uppercase">subscribe</button>
      </div>
    </header>

    <!-- header ends here -->

    <!-- two sided div start here -->

    <div class="container-fluid">
      <div class="row">

        <!-- to get the left and right side div space -->
        <div class="col-xl-10 col-lg-10 col-md-11 col-11 mx-auto my-5">
          <div class="row gx-5 mx-sm-auto">
            
            <!-- to get the left side div space -->
            <div class="col-lg-8 col-md-11 col-11 mx-auto">
              <div class="row gy-5">
                <!-- first post code -->
                <div class="col-12 card -4 shadow blog_left__div">
                <?php

                include('members/db/connection.php');

                $page=isset($_GET['page']) ? $_GET['page'] : '';

                if ($page=="" || $page=="1") {
                    $page1=0;
                }

                else{
                    $page1=($page*3)-3;
                }

                $query=mysqli_query($con,"select * from posts where is_active=1 limit $page1,3");
                while ($row=mysqli_fetch_array($query)) {
                ?>

                  <div class="d-flex justify-content-center align-items-center flex-column pt-3 pb-5" >
                    <h1><?php echo $row['title']; ?></h1>
                    <p class="blog_title"><span class="font-weight-bolder"><?php echo $row['title_description']; ?>, </span> <?php echo date('d/m/Y',strtotime($row['title'])); ?></p>
                  </div>

                  <figure class="right_side__img mb-5">
                    <img src="images/<?php echo $row['thumbnail']; ?>" class="img-fluid shadow">
                  </figure>
                  <p><span class="font-weight-bolder"><?php echo $row['added_by']; ?></span>
                    <?php echo $row['description']; ?>
                  </p>
                  <p>The Dell might be more expensive simply because it is more expensive overall in your country. There is much more to a computer than just the configuration.</p>

                  <div class="d-flex justify-content-between mb-3 left_div_btns">
                    <div>
                      <button class="left_div__like" id="like_btn">
                        <i class="far fa-thumbs-up"></i> Like
                      </button>
                    </div>
                    <div>
                      <button class="left_div__reply" onclick="reply('reply1')">
                         Reply <badge class="bg-white text-dark p-2">1</badge>
                      </button>
                    </div>
                  </div>
                  <hr style="margin: 64px 0;">
                <?php } ?>
                </div>
                <ul class="pagination">
                  <li class="page-item text-center " style="font-size: 18px; width: 13%;">
                  <a class="page-link" href="#" onclick="window.history.go(-1);">Previous</a>
                </li>

                  <?php
                  include('members/db/connection.php');

                    $sql=mysqli_query($con,"select * from posts where is_active=1");
                    $count=mysqli_num_rows($sql);
                    $a=$count/2;
                    ceil($a);

                  for ($b=1; $b <=$a ; $b++) { 
                  ?>

                  <li class="page-item text-center" style="font-size: 18px; width: 10%;"><a class="page-link" href="index.php?page=<?php echo $b;?>"><?php echo $b;?></a></li>

                  <?php } ?>

                  <li class="page-item text-center disabled" style="font-size: 18px; width: 10%;">
                    <a class="page-link" href="#">Next</a>
                  </li>

                </ul>
              </div>
            </div>

            <!-- to get the right side div space -->
            <div class="col-lg-3 col-md-7 col-11 justify-content-end m-lg-0 m-auto">
              <div class="row gy-5 right_div">
                <!-- about me part -->
                <div class="col-12 about_me_div img-fluid shadow">
                  <p class="text-left">Dinesh Gosavi</p>
                  <p>﻿Award-winning web developer and instructor with 1+ years’ of well-rounded experience in Web development.</p>
                </div>

                <!-- popular posts -->
                <div class="popular_post">
                  <div class="right_div_title py-4 pl-2">
                    <h2>Popular Posts</h2>
                  </div>
                  <div class="right_sub_div shadow">
                    <div class="row">
                      <div class="col-3 popular_post__img1 py-2 pl-2">
                        
                      </div>
                      <div class="col-8">
                        <h3>Mark Zukerberg</h3>
                        <p>CEO Facebook</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3 popular_post__img2 py-2 pl-2">
                        
                      </div>
                      <div class="col-8">
                        <h3>Bill Gates</h3>
                        <p>CEO Microsoft</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3 popular_post__img3 py-2 pl-2">
                        
                      </div>
                      <div class="col-8">
                        <h3>Jeff Bezos</h3>
                        <p>CEO Amazon</p>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- advertise part div -->
                <div class="right_div_post">
                  <div class="right_div_title py-4 pl-2">
                    <h2>Advertise</h2>
                  </div>
                  <div class="right_sub_div">
                    <div class="advertise_img bg-light shadow">
                      <p>Ads goes here</p>
                    </div>
                  </div>
                </div>

                <!-- Tags part div -->
                <div class="right_div_post">
                  <div class="right_div_title py-4 pl-2">
                    <h2>Tags</h2>
                  </div>
                  <div class="tags_main right_sub_div">
                    <a href="#" class="badge shadow text-capitalize"> html </a>
                    <a href="#" class="badge shadow text-capitalize"> cSS </a>
                    <a href="#" class="badge shadow text-capitalize"> mySql </a>
                    <a href="#" class="badge shadow text-capitalize"> JS </a>
                    <a href="#" class="badge shadow text-capitalize"> jQuery </a>
                    <a href="#" class="badge shadow text-capitalize"> php </a>
                    <a href="#" class="badge shadow text-capitalize"> react </a>
                    <a href="#" class="badge shadow text-capitalize"> node </a>
                  </div>
                </div>

                <!-- inspiration part div -->
                <div class="right_div_post">
                  <div class="right_div_title py-4 pl-2">
                    <h2>Inspiration</h2>
                  </div>
                  <div class="right_sub_div">
                    <div class="row gy-3">
                      <div class="col-6">
                        <figure>
                          <img src="images/inspiration1.jpg" class="img-fluid shadow">
                        </figure>
                      </div>
                      <div class="col-6">
                        <figure>
                          <img src="images/inspiration2.jpg" class="img-fluid shadow">
                        </figure>
                      </div>
                      <div class="col-6">
                        <figure>
                          <img src="images/inspiration3.jpg" class="img-fluid shadow">
                        </figure>
                      </div>
                      <div class="col-6">
                        <figure>
                          <img src="images/inspiration1.jpg" class="img-fluid shadow">
                        </figure>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- follow me part div -->
                <div class="right_div_post">
                  <div class="right_div_title py-4 pl-2">
                    <h2>Follow Me</h2>
                  </div>
                  <div class="right_sub_div d-flex justify-content-around">
                    <a href="#"><i class="fab fa-facebook-square fa-3x"></i></a>
                    <a href="#"><i class="fab fa-instagram-square fa-3x"></i></a>
                    <a href="#"><i class="fab fa-github-square fa-3x"></i></a>
                    <a href="#"><i class="fab fa-twitter-square fa-3x"></i></a>
                    <a href="#"><i class="fab fa-linkedin-square fa-3x"></i></a>
                  </div>
                </div>

                <!-- subscribe news letter part div -->
                <div class="right_div_post">
                  <div class="right_div_title py-4 pl-2">
                    <h2>Subscribe</h2>
                  </div>
                  <div class="right_sub_div">
                    <form>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Enteryour email below and get notified of the latest blog posts.</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@gmail.com">
                      </div>                      
                      <button type="submit" class="subs_btn d-block">Submit</button>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- back to top button -->

    <div class="scrolltop float-right">
      <i class="fa fa-arrow-up" onclick="topFunction()" id="myBtn"></i>
    </div>

    <!-- two sided div ends here -->


    <!-- footer part ends here -->

    <footer>
      <p class="text-center py-4 bg-light">Copyrights @2021 All rights reserved | This Website is made with <span style="color: red;">❤️</span> by <strong>Technical DInesh</strong></p>
    </footer>

    <!-- footer part ends here -->


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Gsap ScrollTrigger CDN File -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollTrigger.min.js"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <script>
      // ************* preloader js starts file *************

      var preloader = document.getElementById('loading');

      function myFunction(){
        preloader.style.display = 'none';
      }

      // ************* preloader js file ends *************


      const reply = (res) => {
        var res = document.getElementById(res);
        if(res.className == "replies"){
          res.className = "reply_show";
        }
        else if(res.className == "reply_show"){
          res.className = "replies";
        }
      }

      // ************* scrolltop btn js starts file *************

      //Get the Button:
      mybutton = document.getElementById('myBtn');

      //When the user scrolls down 50px from the top of the document show the button:
      window.onscroll = function() {scrollFunction()};

      function scrollFunction(){
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50){
          mybutton.style.display = "block";
        }
        else{
          mybutton.style.display = "none"
        }
      };

      //When the user clicks on the scroll button, scroll to the top of the document:
      function topFunction(){
        document.body.scrolltop = 0; //for Safari
        document.documentElement.scrollTop = 0; //for Chrome, Firefox, IE and Opera
      };

      // ************* scrolltop btn js ends file *************

      // gsap.timeline({
      //   ScrollTrigger: {
      //     trigger: ".blog_left__div",
      //     start: "center center",
      //     end: "bottom top",
      //     markers: true,
      //     scrub: true,
      //     pin: true
      //   }
      // })
      // .from(".right_side__img", {x : innerWidth = 1})

      // Contact form Ajax function
      jQuery('#login').on('submit', function(e){
        jQuery('#success_msg').html('');
        jQuery('#submit').html('Please Wait');
        jQuery('#submit').attr('disabled',true);
        jQuery.ajax({
          url : 'members/login.php',
          type : 'post',
          data : jQuery('#login').serialize(),
          success : function(result){
            
          }
        });
        e.preventDefault();
      });
      
    </script>
    
  </body>
</html>