<?php
session_start();
include("connection.php");
include("function.php");

if (isset($_POST['submit'])) {
  // Get the form data
  $tender_name = isset($_POST['tender_name'])? mysqli_real_escape_string($con, $_POST['tender_name']) : '';
  $email = isset($_POST['email'])? mysqli_real_escape_string($con, $_POST['email']) : '';

  // Check if a file has been uploaded
  if (isset($_FILES['bid_document']) && $_FILES['bid_document']['error'] == UPLOAD_ERR_OK) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["bid_document"]["name"]);

    if (move_uploaded_file($_FILES["bid_document"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["bid_document"]["name"]). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
      exit;
    }

    $document_url = "http://" . $_SERVER['HTTP_HOST'] . $target_file;
    $bid_document_name = basename($_FILES["bid_document"]["name"]);
    $bid_document_type = $_FILES["bid_document"]["type"];
    $bid_document_size = $_FILES["bid_document"]["size"];

  } else {
    echo "<div class='message'>
            <p>Please select a bid document.</p>
          </div>";
    exit;
  }

  $bid_amount = mysqli_real_escape_string($con, $_POST['bid_amount']);

  // Check if the user has already submitted a bid for this tender
  $check_bid_query = "SELECT * FROM bids WHERE tender_name = '$tender_name' AND email = '$email'";
  $check_bid_result = mysqli_query($con, $check_bid_query);

  if (mysqli_num_rows($check_bid_result) > 0) {
    // Display an error message if the user has already submitted a bid for this tender
    echo "<div class='message'>
            <p>You have already submitted a bid for this tender.</p>
          </div>";
    exit;
  }

  // Insert the data into the bids table
  $query = "INSERT INTO bids (tender_name, email, bid_amount, bid_date)
            VALUES ('$tender_name', '$email', '$bid_amount', NOW())";

  mysqli_query($con, $query) or die("Query failed!");

  // Get the ID of the newly inserted bid
  $bid_id = mysqli_insert_id($con);

  // Insert the document data into the bid_documents table
  $bid_document_query = "INSERT INTO bid_documents (bid_id, document_url, document_name, document_type, document_size)
                          VALUES ($bid_id, '$document_url', '$bid_document_name', '$bid_document_type', '$bid_document_size')";

  mysqli_query($con, $bid_document_query) or die("Query failed!");

  // Redirect back to the bids page
  header("Location: tender.php");
  exit;
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
              
                
              </div>
            </div>
          </div>
        </nav>
      </div>
      </div>
      </section>
    </header>
    <!-- end header section -->
  </div>

<br><br>  
<!--body start-->

  <div class="container">

  
    <div class="contact-form">
    <form id="bid-form" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
  <div class="mb-3">
  <label for="tender_name">Tender  Name:</label><br>
    <input type="text" name="tender_name" id="tender_name" required>



    <label for="email">Organization Email:</label>
    <input type="email" name="email" id="email" required>



    <label for="bid_document">Bid Document:</label>
    <input type="file" name="bid_document" id="bid_document" required>

    <label for="bid_amount">Bid Amount:</label>
    <input type="number" name="bid_amount" id="bid_amount" step="0.01" required>

    

    
    <button type="submit" name="submit">Submit Bid</button>
  
  </div>

</form>
<br> <br>
<style>
  /* Style for the form container */
#bid-form {
  max-width: 900px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 5px;
}

/* Style for the form labels */
label {
  margin-top: 10px;
  display: block;
}

/* Style for the form inputs */
input[type="text"],
input[type="email"],
input[type="number"],
select,
textarea {
  width: 100%;
  padding: 10px;
  margin: 5px 0 20px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* Style for the submit button */
button[type="submit"] {
  background-color: #fec913;
  color: white;
  padding: 15px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

/* Style for the submit button on hover */


</style>


  </div>


  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
 
  <!-- End tender information Code -->









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