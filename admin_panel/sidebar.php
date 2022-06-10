<aside class="left-sidebar bg-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
      <a href="/index.html">
        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
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
        <li class="has-sub">
          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
            <i class="mdi mdi-view-dashboard-outline"></i>
            <span class="nav-text">Dashboard</span> <b class="caret"></b>
          </a>
          <ul class="collapse"  id="dashboard" data-parent="#sidebar-menu">
            <div class="sub-menu">
              <li class="nav-dashboard">
                <a class="sidenav-item-link " href="index.php?page=dashboard">
                  <span class="nav-text">Ecommerce</span>
                </a>
              </li>
              <li class="nav-analytics">
                <a class="sidenav-item-link " href="index.php?page=analytics">
                  <span class="nav-text">Analytics</span>
                </a>
              </li>
              <li class="nav-test">
                <a class="sidenav-item-link " href="index.php?page=test">
                  <span class="nav-text">Invoice</span>
                </a>
              </li>
            </div>
          </ul>
        </li>
        <li class="has-sub">
          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#products" aria-expanded="false" aria-controls="products">
            <i class="mdi mdi-folder-multiple-outline"></i>
            <span class="nav-text">Products</span> <b class="caret"></b>
          </a>
          <ul class="collapse"  id="products" data-parent="#sidebar-menu">
            <div class="sub-menu">
              <li class="nav-upload_product">
                <a class="sidenav-item-link " href="index.php?page=upload_product">
                  <span class="nav-text">Upload New Product</span>
                </a>
              </li>
              <li class="nav-product_list">
                <a class="sidenav-item-link " href="index.php?page=product_list">
                  <span class="nav-text">Product List</span>
                </a>
              </li>
            </div>
          </ul>
        </li>
        <li class="has-sub">
          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#orders" aria-expanded="false" aria-controls="orders">
            <i class="mdi mdi-book-open-page-variant"></i>
            <span class="nav-text">Orders</span> <b class="caret"></b>
          </a>
          <ul class="collapse"  id="orders" data-parent="#sidebar-menu">
            <div class="sub-menu">
              <li class="nav-order_table">
                <a class="sidenav-item-link " href="index.php?page=order_table">
                  <span class="nav-text">Order Tables</span>
                </a>
              </li>
              <li class="nav-order_history">
                <a class="sidenav-item-link " href="index.php?page=order_history">
                  <span class="nav-text">Order Histories</span>
                </a>
              </li>
            </div>
          </ul>
        </li>
        <li  class="has-sub" >
          <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages">
            <i class="mdi mdi-image-filter-none"></i>
            <span class="nav-text">Pages</span> <b class="caret"></b>
          </a>
          <ul  class="collapse"  id="pages" data-parent="#sidebar-menu">
            <div class="sub-menu">
              <li class="nav-edit_info">
                <a class="sidenav-item-link" href="index.php?page=edit_info">
                  <span class="nav-text">Edit Account</span>
                </a>
              </li>
              <li class="nav-create_account">
                <a class="sidenav-item-link" href="index.php?page=create_account">
                  <span class="nav-text">Create Account</span>
                </a>
              </li>
              <li class="#">
                <a class="sidenav-item-link" href="#">
                  <span class="nav-text">Logout</span>
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
  $(document).ready(function () {
  $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
  });
</script>