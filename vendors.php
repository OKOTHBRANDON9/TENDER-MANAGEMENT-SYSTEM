<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <h2>TMS</h2>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Components</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./vendors.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Vendors</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./tenders.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Tenders</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./bids.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Bids</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./contact.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">contact</span>
              </a>
            </li>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Reports</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <button onclick="printTenderList()">Print Tender List</button>
<div id="print-area">
  <!-- Tender list content goes here -->
</div>

      <div class="container-fluid">
        <div class="container-fluid">
        <button onclick="printTenderList()">Print vendor List</button>
<div id="print-area">
  <!-- Tender list content goes here -->
</div>

<script>
  function printTenderList() {
    // Get the print area element
    var printArea = document.getElementById("print-area");

    // Print the contents of the print area
    window.print(printArea.innerHTML);
  }

  function downloadTenderList() {
    var printArea = document.getElementById("print-area");
    var printContent = printArea.outerHTML;

    // Create a new anchor element
    var a = document.createElement("a");
    a.href = "data:text/html;charset=utf-8," + encodeURIComponent(printContent);
    a.download = "tender_list.html"; // Set the desired file name here

    // Trigger the download
    a.click();
  }
</script>
        <table class="table">
        <thead>
              <tr>
                
                
                <th>User Name</th>
                <th>Organization Name</th>
                <th>Email</th>
                <th>Password</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php          
                  include("connection.php");
                  include("function.php");
                  
                  $sql="SELECT * from vendor_register";
                  $result=$con-> query($sql);
                  $count=1;
                  if ($result-> num_rows > 0){
                  while ($row=$result-> fetch_assoc()) {
  
              ?>
              <tr>
                
              
                <td><?=$row["user_name"]?></td>
                <td><?=$row["organization_name"]?></td>
                <td><?=$row["email"]?></td>
                <td><?=$row["password"]?></td>
                <td>
                <button type="button" class="btn btn-success" style="height:40px"><a href="edit.php?veditid=<?php echo $row['user_id']?>" class="text-white">
                  Edit
                  </a>
                </button>
                </td>
                <td> 
                <button type="button" class="btn btn-danger" style="height:40px"><a href="delete.php?deletevendor=<?php echo $row['user_id']?>" class="text-white">
                  Delete
                  </a>
                </button>
                </td>

              <?php
                    $count=$count+1;
                    
                }
                }
              ?>
              </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#Modal">Add Vendor</button>
        
        <!-- Modal -->
        <div class="modal fade" id="Modal" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">New Vendor</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <form  enctype='multipart/form-data' method="POST">
                            
                            <div class="form-group">
                            <label for="lname">User Name:</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" required>
                            </div>
                            <div class="form-group">
                            <label for="organization_name">Organization Name:</label>
                            <input type="text" class="form-control" id="organization_name" name="organization_name" required>
                            </div>
                            <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" class="form-control" id="password" name="password" required>
                            </div>                            
                            <br>
                            <div class="form-group">
                            <input type="submit" class="btn btn btn-primary" name="add" id="add" value="Add Vendor">
                            <!-- <button type="submit" class="btn btn btn-primary" name="upload" id="upload" style="height:40px">Add Item</button> -->
                            </div>
                        </form>

                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal" style="height:40px">Close</button>
                        </div>
                    </div>
                    
                    </div>
              </div>
<!--
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$insert = mysqli_query($conn, "INSERT INTO student (Student_ID, First_Name, Last_Name, Password, Email_Address, Meal_plan, Phone_Number) 
VALUES ('$id', '$fname', '$lname', '$hashed_password', '$email', '$mealplan', '$phonenumber')");
$password = $_POST['password'];
$hashed_password = $row['Password'];

if (password_verify($password, $hashed_password)) {
  // password is valid
} else {
  // password is not valid
}
Note that the password_hash() function generates a different hash value for each call, even for the same input. 
Therefore, you cannot compare the hash value directly with the original password. 
Instead, you should use the password_verify() function to compare the original password with the hash value.

-->

<script>
	function downloadTenderList() {
		var printArea = document.getElementById("print-area");
		var printContent = printArea.outerHTML;

		// Create a new anchor element
		var a = document.createElement("a");
		a.href = "data:text/html;charset=utf-8," + encodeURIComponent(printContent);
		a.download = "tender_list.html"; // Set the desired file name here

		// Trigger the download
		a.click();
	}
</script>
                <?php
                    
                  
                    if(isset($_POST['add']))
                    {
                        
                        $name = mysqli_real_escape_string($con,$_POST['user_name']);
                        $organization_name = mysqli_real_escape_string($con,$_POST['organization_name']);
                        $email = mysqli_real_escape_string($con,$_POST['email']);
                        $password = mysqli_real_escape_string($con,$_POST['password']);
                        
                        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                       
                        
                        $insert = mysqli_query($con,"INSERT INTO vendor_register
                        (user_name,organization_name,email,password) 
                        VALUES ('$name','$organization_name','$email','$hashed_password')");
                
                        if(!$insert)
                        {
                            echo mysqli_error($con);
                        }
                        else
                        {  
                                          
                              echo '<script> alert("Successful") </script>';
                        }                           
                    }    
                    
                         
                ?>

        </div>
      </div>
    </div>
  </div>


  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>