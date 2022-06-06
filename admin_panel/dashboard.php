<div class="content">						 
  <!-- Top Statistics -->
  <div class="row">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini mb-4">
        <div class="card-body">
          <h2 class="mb-1">71,503</h2>
          <p>Regiatered Accounts</p>
          <div class="chartjs-wrapper">
            <canvas id="barChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini  mb-4">
        <div class="card-body">
          <h2 class="mb-1">9,503</h2>
          <p>New Orders</p>
          <div class="chartjs-wrapper">
            <canvas id="dual-line"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini mb-4">
        <div class="card-body">
          <h2 class="mb-1">71,503</h2>
          <p>Monthly Total Order</p>
          <div class="chartjs-wrapper">
            <canvas id="area-chart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini mb-4">
        <div class="card-body">
          <h2 class="mb-1">9,503</h2>
          <p>Total Revenue</p>
          <div class="chartjs-wrapper">
           <canvas id="line"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
   <!-- Sales and Sales per categories -->
  <div class="row">
	  <div class="col-xl-8 col-md-12">
      <!-- Sales Graph -->
      <div class="card card-default" data-scroll-height="675">
        <div class="card-header">
          <h2>Sales Of The Year</h2>
        </div>
        <div class="card-body">
          <canvas id="linechart" class="chartjs"></canvas>
        </div>
        <div class="card-footer d-flex flex-wrap bg-white p-0">
          <div class="col-6 px-0">
            <div class="text-center p-4">
              <h4>$6,308</h4>
              <p class="mt-2">Total orders of this year</p>
            </div>
          </div>
          <div class="col-6 px-0">
            <div class="text-center p-4 border-left">
              <h4>$70,506</h4>
              <p class="mt-2">Total revenue of this year</p>
            </div>
          </div>
        </div>
      </div>
    </div>
	  <div class="col-xl-4 col-md-12">
      <!-- Top Sell Table -->
      <div class="card card-table-border-none" data-scroll-height="675">
        <div class="card-header justify-content-between">
          <h2>Sold by Units</h2>
          <div>
            <button class="text-black-50 mr-2 font-size-20"><i class="mdi mdi-cached"></i></button>
            <div class="dropdown show d-inline-block widget-dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-units" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-units">
                <li class="dropdown-item"><a  href="#">Action</a></li>
                <li class="dropdown-item"><a  href="#">Another action</a></li>
                <li class="dropdown-item"><a  href="#">Something else here</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body slim-scroll py-0">
          <table class="table ">
            <tbody>
                <tr>
                  <td class="text-dark">Backpack</td>
                  <td class="text-center">9</td>
                  <td class="text-right">33% <i class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i> </td>
                </tr>
                <tr>
                  <td class="text-dark">T-Shirt</td>
                  <td class="text-center">6</td>
                  <td class="text-right">150% <i class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i> </td>
                </tr>
                <tr>
                  <td class="text-dark">Coat</td>
                  <td class="text-center">3</td>
                  <td class="text-right">50% <i class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i> </td>
                </tr>
                <tr>
                  <td class="text-dark">Necklace</td>
                  <td class="text-center">7</td>
                  <td class="text-right">150% <i class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i> </td>
                </tr>
                <tr>
                  <td class="text-dark">Jeans Pant</td>
                  <td class="text-center">10</td>
                  <td class="text-right">300% <i class="mdi mdi-arrow-down-bold text-danger pl-1 font-size-12"></i> </td>
                </tr>
                <tr>
                  <td class="text-dark">Shoes</td>
                  <td class="text-center">5</td>
                  <td class="text-right">100% <i class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i> </td>
                </tr>
                <tr>
                  <td class="text-dark">T-Shirt</td>
                  <td class="text-center">6</td>
                  <td class="text-right">150% <i class="mdi mdi-arrow-up-bold text-success pl-1 font-size-12"></i> </td>
                </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer bg-white py-4">
          <a href="#" class="btn-link py-3 text-uppercase">View Report</a>
        </div>
      </div>
    </div>
  </div>
   <!-- Recent orders table -->
  <div class="row">
	  <div class="col-12"> 
      <!-- Recent Order Table -->
      <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
          <h2>Recent Orders</h2>
          <div class="date-range-report ">
            <span></span>
          </div>
        </div>
        <div class="card-body pt-0 pb-5">
          <table class="table card-table table-responsive table-responsive-large" style="width:100%">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th class="d-none d-md-table-cell">Units</th>
                <th class="d-none d-md-table-cell">Order Date</th>
                <th class="d-none d-md-table-cell">Order Cost</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td >24541</td>
                <td >
                  <a class="text-dark" href=""> Coach Swagger</a>
                </td>
                <td class="d-none d-md-table-cell">1 Unit</td>
                <td class="d-none d-md-table-cell">Oct 20, 2018</td>
                <td class="d-none d-md-table-cell">$230</td>
                <td >
                  <span class="badge badge-success">Completed</span>
                </td>
                <td class="text-right">
                  <div class="dropdown show d-inline-block widget-dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                      <li class="dropdown-item">
                        <a href="#">View</a>
                      </li>
                      <li class="dropdown-item">
                        <a href="#">Remove</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td >24541</td>
                <td >
                  <a class="text-dark" href=""> Toddler Shoes, Gucci Watch</a>
                </td>
                <td class="d-none d-md-table-cell">2 Units</td>
                <td class="d-none d-md-table-cell">Nov 15, 2018</td>
                <td class="d-none d-md-table-cell">$550</td>
                <td >
                  <span class="badge badge-warning">Delayed</span>
                </td>
                <td class="text-right">
                  <div class="dropdown show d-inline-block widget-dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                      <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order2">
                        <li class="dropdown-item">
                          <a href="#">View</a>
                        </li>
                        <li class="dropdown-item">
                          <a href="#">Remove</a>
                        </li>
                      </ul>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- TOp products and Notifications  -->
  <div class="row">
    <div class="col-xl-5">
      <!-- Notification Table -->
      <div class="card card-default" data-scroll-height="580">
                                <div class="card-header justify-content-between ">
                            <h2>Latest Notifications</h2>
                            <div>
                                <button class="text-black-50 mr-2 font-size-20"><i class="mdi mdi-cached"></i></button>
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-notification">
                                      <li class="dropdown-item"><a  href="#">Action</a></li>
                                      <li class="dropdown-item"><a  href="#">Another action</a></li>
                                      <li class="dropdown-item"><a  href="#">Something else here</a></li>
                                    </ul>
                                  </div>
                            </div>

                          </div>
                          <div class="card-body slim-scroll">
                            <div class="media pb-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                <i class="mdi mdi-cart-outline font-size-20"></i>
                              </div>
                              <div class="media-body pr-3 ">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New Order</a>
                                <p >Selena has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </div>

                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                                <i class="mdi mdi-email-outline font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New Enquiry</a>
                                <p >Phileine has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 9 AM</span>
                            </div>


                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                <i class="mdi mdi-stack-exchange font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">Support Ticket</a>
                                <p >Emma has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </div>

                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                <i class="mdi mdi-cart-outline font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New order</a>
                                <p >Ryan has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </div>

                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                                <i class="mdi mdi-calendar-blank font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="">Comapny Meetup</a>
                                <p >Phileine has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </div>

                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                <i class="mdi mdi-stack-exchange font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">Support Ticket</a>
                                <p >Emma has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </div>

                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                                <i class="mdi mdi-email-outline font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New Enquiry</a>
                                <p >Phileine has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 9 AM</span>
                            </div>

                          </div>
                          <div class="mt-3"></div>
                        </div>
    </div>
    <div class="col-xl-7">
        <!-- Top Products -->
      <div class="card card-default" data-scroll-height="580">
                    <div class="card-header justify-content-between mb-4">
                      <h2>Top Products</h2>
                      <div>
                          <button class="text-black-50 mr-2 font-size-20"><i class="mdi mdi-cached"></i></button>
                          <div class="dropdown show d-inline-block widget-dropdown">
                              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-product" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                              </a>
                              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-product">
                                <li class="dropdown-item"><a  href="#">Update Data</a></li>
                                <li class="dropdown-item"><a  href="#">Detailed Log</a></li>
                                <li class="dropdown-item"><a  href="#">Statistics</a></li>
                                <li class="dropdown-item"><a  href="#">Clear Data</a></li>
                              </ul>
                            </div>
                      </div>

                    </div>
                    <div class="card-body py-0">
                      <div class="media d-flex mb-5">
                        <div class="media-image align-self-center mr-3 rounded">
                          <a href="#"><img src="assets/img/products/p1.jpg" alt="customer image"></a>
                        </div>
                        <div class="media-body align-self-center">
                          <a href="#"><h6 class="mb-3 text-dark font-weight-medium"> Coach Swagger</h6></a>
                          <p class="float-md-right"><span class="text-dark mr-2">20</span>Sales</p>
                          <p class="d-none d-md-block">Statement belting with double-turnlock hardware adds “swagger” to a simple.</p>
                          <p class="mb-0">
                            <del>$300</del>
                            <span class="text-dark ml-3">$250</span>
                          </p>
                        </div>
                      </div>

                      <div class="media d-flex mb-5">
                        <div class="media-image align-self-center mr-3 rounded">
                          <a href="#"><img src="assets/img/products/p2.jpg" alt="customer image"></a>
                        </div>
                        <div class="media-body align-self-center">
                          <a href="#"><h6 class="mb-3 text-dark font-weight-medium"> Coach Swagger</h6></a>
                          <p class="float-md-right"><span class="text-dark mr-2">20</span>Sales</p>
                          <p class="d-none d-md-block">Statement belting with double-turnlock hardware adds “swagger” to a simple.</p>
                          <p class="mb-0">
                            <del>$300</del>
                            <span class="text-dark ml-3">$250</span>
                          </p>
                        </div>
                      </div>

                      <div class="media d-flex mb-5">
                        <div class="media-image align-self-center mr-3 rounded">
                          <a href="#"><img src="assets/img/products/p3.jpg" alt="customer image"></a>
                        </div>
                        <div class="media-body align-self-center">
                          <a href="#"><h6 class="mb-3 text-dark font-weight-medium"> Gucci Watch</h6></a>
                          <p class="float-md-right"><span class="text-dark mr-2">10</span>Sales</p>
                          <p class="d-none d-md-block">Statement belting with double-turnlock hardware adds “swagger” to a simple.</p>
                          <p class="mb-0">
                            <del>$300</del>
                            <span class="text-dark ml-3">$50</span>
                          </p>
                        </div>
                      </div>
                      </div>
                  </div>
    </div>
  </div>

</div>

