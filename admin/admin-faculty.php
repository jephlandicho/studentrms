<?php
    require_once 'assets/php/header.php'
?>
      <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">
                            Faculty
                        </h5>
                    </div>
                    <div class="px-2">
                            <a href="admin-faculty-new.php">
                            <input class="btn btn-success mt-2" value="Add New Faculty" style="height:50px; width:200px; border-radius: 50px; font-size:16px;">
                            </a>  
                    </div>
                    <div class="card-body">
                            <div class="table-responsive" id="showTeachers">
                            </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
           <!--Update Modal-->
    <div class="modal" id="update-teacher">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Update Form</h3>
            <p id="up-message" class="text-dark"></p>
          </div>
          <div class="modal-body">
            <form id="modal-form">
                <div class="row">
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Teacher Code </label> 
                    <input type="text" class="form-control my-2" id="Up_Teacher_ID" readonly>
                    </div>
                
                    <div class="col-md-6">
                    <label style="font-size:12px;"> First Name </label> 
                    <input name="up_teach_fname" id="up_teach_fname" type="text" class="form-control my-2" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Last Name </label>
                    <input name="up_teach_lname" id="up_teach_lname" type="text" class="form-control my-2" placeholder="Last Name" required>
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Middle Name </label>
                    <input name="up_teach_mname" id="up_teach_mname" type="text" class="form-control my-2" placeholder="Middle Name">
                    </div>
                    <div class="col-md-3">
                    <label style="font-size:12px;"> Suffix </label>
                    <input name="up_teach_suffix" id="up_teach_suffix" type="text" class="form-control my-2" placeholder="Suffix">
                    </div>
                    <div class="col-md-3">
                    <label style="font-size:12px;"> Sex </label>
                    <select id="up_teach_sex" name="up_teach_sex" class="form-control my-2">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>
                    <div class="col-md-3">
                    <label style="font-size:12px;"> Civil Status </label>
                    <select id="up_teach_status" name="up_teach_status" class="form-control my-2">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Other">Other</option>
                    </select>
                    </div>
                    <div class="col-md-3">
                    <label style="font-size:12px;"> Birthdate </label>
                    <input class="form-control my-2" id="up_teach_date" name="up_teach_date" placeholder="YYYY/MM/DD" type="text">
                    </div>
                    <div class="col-md-12">
                    <label style="font-size:12px;"> Address </label>
                    <input name="up_teach_add" id="up_teach_add" type="text" class="form-control my-2" placeholder="Address">
                    </div>
                    
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Contact Number </label>
                    <input name="up_teach_contact" id="up_teach_contact" type="tel" class="form-control my-2" placeholder="0912-345-6781" maxlength = "13">
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Email </label>
                    <input name="up_teach_email" id="up_teach_email" type="email" class="form-control my-2" placeholder="Email">
                    </div>
                    <div class="col-md-12">
                    <label style="font-size:12px;"> Specialization </label>
                    <input name="up_teach_spec" id="up_teach_spec" type="text" class="form-control my-2" placeholder="Specialization">
                    </div>
                    <div class="col-md-4">
                    <label style="font-size:12px;">Employment Status</label>
                    <select id="up_teach_Empstatus" name="up_teach_Empstatus" class="form-control my-2">
                        <option value="New">New</option>
                        <option value="Regular">Regular</option>
                    </select>
                    </div>
                    
                </div>
            
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_teach_update">Update Now</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--Delete Modal-->
<div class="modal" id="delete_teacher">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Delete Teacher Account</h3>
          </div>
          <div class="modal-body">
            <p> Do You Want to Delete the Record ?</p>
            <button type="button" class="btn btn-success" id="btn_delete_teacher">Delete</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>

    <?php
    require_once 'assets/php/footer.php'
?>
<script>
        $(document).ready(function(){
        var date_input=$('input[name="up_teach_date"]');
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
        })

    var num = document.querySelector('#up_teach_contact');

    num.addEventListener('keyup', function(e){
    if (event.key != 'Backspace' && (num.value.length === 4 || num.value.length === 8)){
        num.value += '-';
    }
    });
</script>