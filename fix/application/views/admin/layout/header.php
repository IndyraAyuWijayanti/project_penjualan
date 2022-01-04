<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      
      <li class="nav-item d-none d-sm-inline-block">
        <font size="4px", color="white", face="Calibri">Pusat Penelitian Kopi dan Kakao Indonesia</font>
        </br><font size="4px", color="orange", face="Monotype Corsiva">Indonesian Coffee and Cocoa Research Institute </font>


      </li>
     
    </ul>

    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">

                

                <i class="fas fa-user-circle fa-fw"></i><?php echo 
                $this->session->userdata('nama');
                 ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('login/logout') ?>">Logout</a>
            </div>
      </li>
    </ul>
</nav>