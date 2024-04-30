<?php
session_start();


include("connection.php");
include("function.php");


$user_data = check_login($con);


// Assuming you have a database connection established

// Query to fetch tender data from the database
$query = "SELECT * FROM tenders";
$result = mysqli_query($con, $query);

$tenders = [];

// Fetching data from the database result and storing it in the $tenders array
while ($row = mysqli_fetch_assoc($result)) {
    $tenders[] = $row;
}


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

  <!---->
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
  rel="stylesheet"
/>
<link
  href="https://getbootstrap.com/docs/5.3/assets/css/docs.css"
  rel="stylesheet"
/>
</head>

<body class="sub_page">
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
    <!-- end header section -->
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

  <!-- end do section -->

 <!--body begins-->
<br> 


 <script>
  function displayTenders(tenders, startIndex, endIndex) {
    var tendersContainer = document.getElementById('tenders');
    tendersContainer.innerHTML = ''; // Clear the container

    for (var i = startIndex; i < endIndex; i++) {
      if (tenderList[i]) {
        var tender = tenderList[i];
        var tenderDiv = document.createElement('div');
        tenderDiv.className = 'col';
        tenderDiv.innerHTML = `
          <div class="p-3">
            <h6>${tender.name}</h6>
            <p>Visit: <a href="https://www.companywebsite.com" target="_blank">Company Website</a></p>
            <p>Tender: <a href="document.pdf" target="_blank">Documents</a></p>
            <p>Opening Date: ${tender.openingDate}</p>
            <p>Closing Date: ${tender.closingDate}</p>
            < class="submit-button" onclick="location.href='submit_bid.php'">Submit Bid</button>
          `;
        tendersContainer.appendChild(tenderDiv);
      }
    }
  }
</script>

    <style>
    /* Style for the tender row container */
.tender-row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

/* Style for each tender container */
.tender-container {
  width: calc(33.33% - 20px); /* Adjust width for 3 containers per row */
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
  background-color: #f9f9f9;
}

/* Style for the tender item */
.tender-item {
  margin-bottom: 10px;
}

/* Style for the tender name heading */
.tender-item h2 {
  color: #333;
  font-size: 1.2em;
}
p{

}
/* Style for links */
.tender-item a {
  color: ;
  text-decoration: none;
}

.tender-item a:hover {
  text-decoration: underline;
}

/* Style for paragraphs */
.tender-item p {
  margin: 5px 0;
  text-align:left;
}

/* Style for the submit bid button */
/* Style for the submit bid button */
.submit-button {
  background-color: #ccc; /* Grey background color */
  color: white;
  padding: 5px 10px;
  border: 2px solid #333; /* Dark outer cover */
  border-radius: 3px;
  text-decoration: none;
}

.submit-button:hover {
  background-color: #ccc; /* No hover color */
}


</style>
<div class="tender-row">

    <?php foreach ($tenders as $tender): ?>
        <div class="tender-container">
            <div class="tender-item">
                <h2><?= htmlspecialchars($tender['tender_name']); ?></h2>
                <p><a href="<?= htmlspecialchars($tender['tender_documents']); ?>" download>Tender Documents</a></p>
                <p><a href="<?= htmlspecialchars($tender['organization_website']); ?>" target="_blank">Organization Website</a></p>
                <p>Opening Date: <?= htmlspecialchars($tender['opening_date']); ?></p>
                <p>Closing Date: <?= htmlspecialchars($tender['closing_date']); ?></p>
            </div>
            <div class="tender-item">
                <a href="submit_bid.php" class="submit-button">Submit Bid</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
        <!-- tender list Code ends -->















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