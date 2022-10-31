<?php
    require_once 'assets/php/header.php'
?>
      <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">
                            Admin Account
                        </h5>
                    </div>
                    <div class="px-2">
                            <a href="admin-account-register.php">
                            <input class="btn btn-success mt-2" value="Add New Admin" style="height:50px; width:200px; border-radius: 50px; font-size:16px;">
                            </a>  
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="showAdminAcc">
                            </div>
                        </div>
                </div>
            </div>
        </div>
      </div>

      <!--Update Modal-->
     <div class="modal" id="update">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Update Admin Account</h3>
          </div>
          <div class="modal-body">
          <p id="up-message" class="text-dark"></p>
            <form id="modal-form">
              <input type="hidden" class="form-control my-2" placeholder="Admin ID" id="Up_User_ID" >
              <label style="font-size:12px;"> Name </label> 
                <input type="text" class="form-control my-2" placeholder="Name" id="Up_User_Name" required autofocus>
              <label style="font-size:12px;"> UserName </label>
                <input type="text" class="form-control my-2" placeholder="UserName" id="Up_UserName" required>  
              <label style="font-size:12px;"> Email </label> 
                <input type="email" class="form-control my-2" placeholder="Email" id="Up_UserEmail" required> 
               <label style="font-size:12px;"> Password </label>
                <input type="password" class="form-control my-2" placeholder="Password" id="Up_password1" required minlength = "8">
                <label id="passError" class="text-danger font-weight-bold" style="font-size:12px;"> Note: Please update your password </label>
                <!-- <label style="font-size:12px;"> Confirm Password </label>
                <input type="password" class="form-control my-2" placeholder="Confirm Password" id="Up_password2"> -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_update">Update Now</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>

     <!--Delete Modal-->
     <div class="modal" id="delete">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Delete Admin Account</h3>
          </div>
          <div class="modal-body">
            <p> Do You Want to Delete the Record ?</p>
            <button type="button" class="btn btn-success" id="btn_delete_record">Delete</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
<?php
    require_once 'assets/php/footer.php'
?>
