<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/admin-db.php';

    $count = new Admin();
?>
      <!-- <div class="panel-header panel-header-sm">
      <marquee behavior="alternate" direction="right" scrollamount="5" style = "color:white; font-size:20px;">Welcome to Lian Institute Admin Panel</marquee>
      </div> -->
      <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">
                            Admin Account
                        </h5>
                    </div>
                    <div class="container mt-0">
                          <div class="container-fluid mt-3">
                          <div class="row row-cols-1 row-cols-md-4 g-4">
                            <div class="col">
                              <div class="card">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body  bg-info text-center shadow rounded">
                                  <h2 class="card-title">Students</h2>
                                  <hr>
                                  <h1 class="card-text"><?= $count->totalCount('students')?></h1>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body bg-primary text-center shadow rounded">
                                  <h2 class="card-title">Teachers</h2>
                                  <hr>
                                  <h1 class="card-text"><?= $count->totalCount('teachers')?></h1>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body bg-light text-center shadow rounded">
                                  <h2 class="card-title">Sections</h2>
                                  <hr>
                                  <h1 class="card-text">25</h1>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body bg-warning text-center shadow rounded">
                                  <h2 class="card-title">Subjects</h2>
                                  <hr>
                                  <h1 class="card-text">25</h1>
                                </div>
                              </div>
                            </div>

                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>



<?php
    require_once 'assets/php/footer.php'
?>