<link rel="stylesheet" href="css/style.css"/>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <nav id="sidebar">
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Name sa system</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Name sa system</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="sdashboard.php" class="nav-link">
              <i class="uil uil-dashboard icon"></i>

                <span class="link">Dashboard</span>
              </a>
            </li>
            <li class="list">
              <a href="createbill.php" class="nav-link">
                <i class="uil uil-receipt icon"></i>
                <span class="link">Create Billings</span>
              </a>
            </li>
            <li class="list">
              <a href="billingstaff.php" class="nav-link">
                  <i class="uil uil-analysis icon"></i>
                <span class="link">Billings</span>
              </a>
            </li>
           
            <li class="list">
              <a href="onlinebills.php" class="nav-link">
                <i class="uil uil-receipt icon"></i>
                <span class="link">Online Payments</span>
              </a>
            </li>
            <li class="list">
              <a href="staffpenalty.php" class="nav-link">
              <i class="uil uil-user-exclamation icon"></i>
                <span class="link">Penalty Accouts</span>
              </a>
            </li>
            <li class="list">
              <a href="inactives.php" class="nav-link">
              <i class="uil uil-user-times icon"></i>
                <span class="link">Inactive Accounts</span>
              </a>
            </li>
          </ul>

        </div>
</div>
</nav>










<script>
      const navBar = document.querySelector("nav"),
        menuBtns = document.querySelectorAll(".menu-icon"),
        overlay = document.querySelector(".overlay");

      menuBtns.forEach((menuBtn) => {
        menuBtn.addEventListener("click", () => {
          navBar.classList.toggle("open");
        });
      });
      overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
      });
      
</script>