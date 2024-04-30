<?php
session_start();


include("connection.php");
include("function.php");


$user_data = check_login($con);


?>


<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>TMS</title>

  <!-- slider stylesheet -->
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="home.php">
            <span>
              TMS
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tender.php"> Tenders </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="trainingpage.php"> E-Resource </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact</a>
                </li>
              </ul>
              <div class="user_option">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="images/user.png" alt="">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="login-vendor.php">Login</a>
                        <a class="dropdown-item" href="register-vendor.php">Rgister</a>
                    </div>
                </div>
                
                <div class="search-area">
        <div class="search-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="GET" class="d-md-flex justify-content-between">                    
                            <input type="text" placeholder="Search Keyword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'" id="search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; }?>" required>
                            <button type="submit" class="template-btn">search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

                

              
            </div>
            
            </div>
          </div>
          
        </nav>
      </div>
    </header>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="./main.js"></script>   
    
    
    <!-- end header section -->
    
    
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"  ></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
                 
            <div class="carousel-item active">
              <div class="row">
                <div class="col">
                  <div class="detail-box">
                    <div>
                      <h2>
                        WELCOME TO

                      </h2>
                      <h1>
                        TENDER MANAGEMENT SYSTEM
                      </h1>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="carousel-item ">
              <div class="row">
                <div class="col">
                  <div class="detail-box">
                    <div>
                      <p>
                        To get started, click on the 'View Tenders' button below. Here, you will find information about available tenders and be able to register your interest in participating.
                                      <!-- Hello, <?php // echo $user_data['user_name']; ?> !<br /> -->
</p>
                     <div class=""> <a href="tender.php"> view tenders </a> </div> 
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col">
                  <div class="detail-box">
                    <div>
                      
                      <p>To get more information the tendering process and what it is all about, click on the 'Tender E-Resource' button below.</p>

                      <div class="">
                        <a href="trainingpage.php">
                          E-Resource
                        </a>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <script>
        document.getElementById('viewTendersButton').addEventListener('click', function() {
            window.location.href = 'tender.php';
        });
        
        document.getElementById('onlineResourceButton').addEventListener('click', function() {
            window.location.href = 'trainingpage.php';
        });
        </script>
        </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- do section -->
<!--

<section class="do_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          What we do
        </h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna
        </p>
      </div>
      <div class="do_container">
        <div class="box arrow-start arrow_bg">
          <div class="img-box">
            <img src="images/d-1.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Marketing
            </h6>
          </div>
        </div>
        <div class="box arrow-middle arrow_bg">
          <div class="img-box">
            <img src="images/d-2.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Development
            </h6>
          </div>
        </div>
        <div class="box arrow-middle arrow_bg">
          <div class="img-box">
            <img src="images/d-3.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Html5
            </h6>
          </div>
        </div>
        <div class="box arrow-end arrow_bg">
          <div class="img-box">
            <img src="images/d-4.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Css
            </h6>
          </div>
        </div>
        <div class="box ">
          <div class="img-box">
            <img src="images/d-5.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Wordpress
            </h6>
          </div>
        </div>
      </div>
    </div>
  </section>


-->
<?php
// search bar

if(isset($_GET['search']))
{
    $filtervalues = $_GET['search'];
    $query = "SELECT * FROM tenders WHERE CONCAT(tender_name, organization_website, tender_documents, opening_date, closing_date) LIKE '%$filtervalues%'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        while($items = mysqli_fetch_assoc($query_run))
        {
            ?>
            <div class="single-job mb-4 d-lg-flex justify-content-between">
                <div class="job-text">
                    <h4><?php echo $items['tender_name']; ?></h4>
                    <ul class="mt-4">
                        <li class="mb-3"><h5><i class="fa fa-map-marker"></i> <?php echo $items['organization_website'].' '.$items['tender_documents']; ?></h5></li>
                        <li class="mb-3"><h5><i class="fa fa-clock-o"></i> <?php echo $items['opening_date'].' '.$items['closing_date']; ?></h5></li>
                    </ul>
                </div>
                
                <div class="job-btn align-self-center">
                    <!-- <a href="#" class="third-btn job-btn1">full time</a> -->
                    <a href="tender.php?id=<?php echo $items['tender_id']; ?>" class="third-btn">More Details</a>
                </div>
            </div>
            <?php
        }
    }
    else {
        ?>
        <div class="single-job mb-4 d-lg-flex justify-content-between">
            <div class="job-text">
                <h4>No Record Found</h4>
            </div>
        </div>
        <?php
    }
}
?>

  <!-- end do section -->


  <!-- who section -->

  <!--
    <section class="who_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="img-box">
            <img src="images/who-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                WHO WE ARE?
              </h2>
            </div>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum dolor sit amet, consectetur
              adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
              veniam, quis nostrud
            </p>
            <div>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  -->

  <!-- end who section -->


  <!-- work section -->
  <!--
     <section class="work_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          CREATIVE WORKS
        </h2>
        <p>
          consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
          minim veniam, quis nostrud exercitation
        </p>
      </div>
      <div class="work_container layout_padding2">
        <div class="box b-1">
          <img src="images/w-1.png" alt="">
        </div>
        <div class="box b-2">
          <img src="images/w-2.png" alt="">

        </div>
        <div class="box b-3">
          <img src="images/w-3.png" alt="">

        </div>
        <div class="box b-4">
          <img src="images/w-4.png" alt="">

        </div>
      </div>
    </div>
  </section>
  -->
 

  <!-- end work section -->
  
  
<br><br>
  <!-- client section -->
  <section class="client_section">
    <div class="container">
      <div class="heading_container">
        <h2>
          WHAT CUSTOMERS SAY
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Excellent experience<br>
                  <span>
annette                  </span>
                </h5>
                <img src="" alt="">
                <p>
                I was impressed by the professionalism and dedication of the team. They delivered beyond my expectations.
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Streamlined Processes<br>
                  <span>
collins                  </span>
                </h5>
                <img src="" alt="">
                <p>
                Using the system was a breeze. The seamless integration and user-friendly interface made managing tasks effortless.
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Enhanced Efficiency<br>
 <br>
                  <span>
donald                  </span>
                </h5>
                <img src="images/quote.png" alt="">
                <p>
                My experience with the system has been fantastic. It has significantly enhanced our team's efficiency and productivity.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- target section -->
  <section class="target_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              2024
            </h2>
            <h5>
              EASTABLISHD
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              30+
            </h2>
            <h5>
              Projects Delivered
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              50+
            </h2>
            <h5>
              Satisfied Customers
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              10+
            </h2>
            <h5>
              PROFFESIONAL  EXPERTS ON BOARD
            </h5>
          </div>
        </div>
      </div>
    </div>
     
  </section>

  <!-- end target section -->


  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container">

      <div class="heading_container">
        <h2>
          Request A Call Back
        </h2>
      </div>
      <div class="">
        <div class="">
          <div class="row">
            <div class="col-md-9 mx-auto">
              <div class="contact-form">
                <form action="">
                  <div>
                    <input type="text" placeholder="Full Name ">
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number">
                  </div>
                  <div>
                    <input type="email" placeholder="Email Address">
                  </div>
                  <div>
                    <input type="text" placeholder="Message" class="input_message">
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn_on-hover">
                      Send
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="map_img-box">
        <img src="images/map-img.png" alt="">
      </div>
    </div>
  </section>


  <!-- end contact section -->


  <!-- info section -->
  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Shop
            </h5>
      <div>
        <div class="img-box">
          <img src="images/location-white.png" width="18px" alt="">
        </div>
        <p>
          Address: 123 MAGADI ROAD, RONGAI - KAJIADO, KENYA 
        </p>
      </div>
      <div>
        <div class="img-box">
          <img src="images/telephone-white.png" width="12px" alt="">
        </div>
        <p>
          +254 716543589
        </p>
      </div>
      <div>
        <div class="img-box">
          <img src="images/envelope-white.png" width="18px" alt="">
        </div>
        <p>
        TMS@gmail.com
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="info_info">
      <h5>
        Information
      </h5>
      <p>
        Welcome to our Tender Management System. We provide efficient solutions for managing and processing tenders.
      </p>
    </div>
  </div>

  <div class="col-md-3">
    <div class="info_insta">
      <h5>
        Connect with Us
      </h5>
      <div class="insta_container">
        <div>
          <a href="https://www.instagram.com">
            <div class="insta-box b-1">
              <img src="images/insta.png" alt="">
            </div>
          </a>
          <a href="https://www.instagram.com">
            <div class="insta-box b-2">
              <img src="images/insta.png" alt="">
            </div>
          </a>
        </div>

        <div>
          <a href="https://www.instagram.com">
            <div class="insta-box b-3">
              <img src="images/insta.png" alt="">
            </div>
          </a>
          <a href="https://www.instagram.com">
            <div class="insta-box b-4">
              <img src="images/insta.png" alt="">
            </div>
          </a>
        </div>
        <div>
          <a href="https://www.instagram.com">
            <div class="insta-box b-3">
              <img src="images/insta.png" alt="">
            </div>
          </a>
          <a href="https://www.instagram.com">
            <div class="insta-box b-4">
              <img src="images/insta.png" alt="">
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="info_form ">
      <h5>
        Newsletter
      </h5>
      <form action="">
        <input type="email" placeholder="Enter your email">
        <button>
          Subscribe
        </button>
      </form>
      <div class="social_box">
        <a href="https://www.facebook.com">
          <img src="images/fb.png" alt="">
        </a>
        <a href="https://www.twitter.com">
          <img src="images/twitter.png" alt="">
        </a>
        <a href="https://www.linkedin.com">
          <img src="images/linkedin.png" alt="">
        </a>
        <a href="https://www.youtube.com">
          <img src="images/youtube.png" alt="">
        </a>
      </div>
    </div>
  </div>
</div>
</DIV>

    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
        <p class="copyright">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Tender Management System
          </p>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- owl carousel script 
    -->
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 0,
      navText: [],
      center: true,
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        1000: {
          items: 3
        }
      }
    });
  </script>
  <!-- end owl carousel script -->
    <?php  ?>
</body>
</html>