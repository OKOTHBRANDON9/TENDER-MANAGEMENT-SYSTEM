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
      <div class="container-fluid">
  <table class="table">
    <thead>
      <tr>
        <th>Bid ID</th>
        <th>Tender Name</th>
        <th>Organization Email</th>
        <th>Bid Document</th>
        <th>Bid Amount</th>
        <th>Bid Date</th>
        <th>Bid Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include("connection.php");
        include("function.php");

        $sql = "SELECT b.*, bd.* FROM bids b
                INNER JOIN bid_documents bd ON b.bid_id = bd.bid_id";
        $result = $con->query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
      ?>
      <tr>
        <td><?= htmlspecialchars($row["bid_id"]) ?></td>
        <td><?= htmlspecialchars($row["tender_name"]) ?></td>
        <td><?= htmlspecialchars($row["email"]) ?></td>
        <td>
          <?php
            $bid_id = $row['bid_id'];
            $query = "SELECT * FROM bid_documents WHERE bid_id = $bid_id";
            $result_docs = mysqli_query($con, $query);

            while ($bid_document = mysqli_fetch_assoc($result_docs)) {
              echo "<p><a href='" . $bid_document['document_url'] . "' target='_blank'>" . $bid_document['document_name'] . "</a></p>";
              echo "<p><a href='download.php?id=$bid_id' target='_blank'>Download</a></p>";
            }
          ?>
        </td>
        <td><?= htmlspecialchars($row["bid_amount"]) ?></td>
        <td><?= htmlspecialchars($row["bid_date"]) ?></td>
        <td><?= htmlspecialchars($row["bid_status"]) ?></td>
        <td>
    <button type="button" class="btn btn-success" style="height:40px">
    <a href="approve.php?bid_id=<?php echo $row['bid_id']; ?>" class="text-white">Approve</a>
</button>

                </td>
                <td> 
           
                <button type="button" class="btn btn-success" style="height:40px">
                <a href="reject.php?bid_id=<?php echo $row['bid_id']; ?>" class="text-white">reject</a>
  </button>
                    </td>

              
              </tr>
      <?php
            $count = $count + 1;
          }
        }
      ?>
    </tbody>
  </table>
</div>
      
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>