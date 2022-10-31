<?php
    require_once 'assets/php/header.php'
?>
      <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">
                            Add New Admin
                        </h5>
                    </div>
                        <form autocomplete="off"
                            id = "addAdminForm"
                            method = "POST">
                                <div class="row">
                                    <div class="col-md-4 px-5 pl-2">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="inAdminName" type="text" class="form-control" placeholder="Name" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input name="inUsername" type="text" class="form-control" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="inEmail" type="email" class="form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-5 pl-1">
                                        <div class="form-group">
                                            <label>Password</label>
                                                    <input id="inPassword_1" name="inPassword_1" type="password" class="form-control" placeholder="Password" required minlength = "8">
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-5 pl-1">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input id="inPassword_2" name="inPassword_2" type="password" class="form-control" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <div id="passError" class="text-danger font-weight-bold">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-5">
                                    <input class="btn btn-primary mt-2" type="submit" id="addAdminBtn" name="grBtn" value="Add Admin" style="height:50px; width:200px; border-radius: 50px; font-size:16px;">
                                    </div>
                                </div>
                        </form>
                </div>
            </div>
        </div>
      </div>
<?php
    require_once 'assets/php/footer.php'
?>

