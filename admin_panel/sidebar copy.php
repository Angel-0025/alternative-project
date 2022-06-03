<aside class="left-sidebar bg-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="/index.html">
          <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"viewBox="0 0 30 33">
            <g fill="none" fill-rule="evenodd">
              <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
              <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
            </g>
          </svg>
          <span class="brand-name">Sleek Dashboard</span>
        </a>
      </div>
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
          <li  class="has-sub active expand">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
              <i class="mdi mdi-view-dashboard-outline"></i>
              <span class="nav-text">Dashboard</span> <b class="caret"></b>
            </a>
            <ul class="collapse show"  id="dashboard">
              <div class="sub-menu">      
                <li class="active">
                  <a class="sidenav-item-link sidenav-dashboard" href="index.php?page=dashboard">
                    <span class="nav-text">Ecommerce</span>
                  </a>
                </li>
                <li >
                  <a class="sidenav-item-link sidenav-analytics" href="index.php?page=analytics">
                    <span class="nav-text">Analytics</span>
                    <span class="badge badge-danger">new</span>  
                  </a>
                </li>    
              </div>
            </ul>
          </li>  
        </ul>  
      </div>
  </div>
</aside>
<script>
    $('.sidenav-item-link .nav-text').click(function(){
    console.log($(this).attr('href'))
	})
    $('.sidenav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
</script>

