<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/connection.php';
    global $con;
    $query = "SELECT `section`, `grade_level`, `section_id`
    FROM sections
    INNER JOIN grade_level ON grade_level.gl_id=sections.grade_level_id
    ";
    $sql = "SELECT * FROM `acad_year`";
    $sql1 = "SELECT `subject_id`, `subject_name`, grade_level.grade_level FROM `subjects`
    INNER JOIN grade_level ON grade_level.gl_id=subjects.grade_level_id";
?>
      <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">
                            Students
                        </h5>
                    </div>
                    <div class="px-2">
                            <a href="admin-students-new.php">
                            <input class="btn btn-success mt-2" value="Add New Student" style="height:50px; width:200px; border-radius: 50px; font-size:16px;">
                            </a>  
                    </div>
                    <div class="card-body">
                            <div class="table-responsive" id="showStudents">
                            </div>
                        </div>
                </div>
            </div>
        </div>
      </div>

            <!--Update Modal-->
     <div class="modal" id="update-student">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Update Form</h3>
            <p id="up-students-message" class="text-dark"></p>
          </div>
          <div class="modal-body">
            <form id="modal-form">
                <div class="row">
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Student Code </label> 
                    <input type="text" class="form-control my-2" id="Up_Student_ID" readonly>
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> LRN </label> 
                    <input type="text" class="form-control my-2" id="Up_LRN" readonly>
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> First Name </label> 
                    <input name="up_stud_fname" id="up_stud_fname" type="text" class="form-control my-2" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Last Name </label>
                    <input name="up_stud_lname" id="up_stud_lname" type="text" class="form-control my-2" placeholder="Last Name" required>
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Middle Name </label>
                    <input name="up_stud_mname" id="up_stud_mname" type="text" class="form-control my-2" placeholder="Middle Name">
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Suffix </label>
                    <input name="up_stud_suffix" id="up_stud_suffix" type="text" class="form-control my-2" placeholder="Suffix">
                    </div>
                    <div class="col-md-4">
                    <label style="font-size:12px;"> Sex </label>
                    <select id="up_stud_sex" name="up_stud_sex" class="form-control my-2">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>
                    <div class="col-md-4">
                    <label style="font-size:12px;"> Birthdate </label>
                    <input class="form-control my-2" id="up_stud_date" name="up_stud_date" placeholder="YYYY/MM/DD" type="text">
                    </div>
                    <div class="col-md-12">
                    <label style="font-size:12px;"> Address </label>
                    <input name="up_stud_add" id="up_stud_add" type="text" class="form-control my-2" placeholder="Address">
                    </div>
                    <div class="col-md-12">
                    <label style="font-size:12px;"> Birth Place </label>
                    <input name="up_stud_bplace" id="up_stud_bplace" type="text" class="form-control my-2" placeholder="Birth Place">
                    </div>
                    <div class="col-md-4">
                    <label style="font-size:12px;"> Civil Status </label>
                    <select id="up_stud_status" name="up_stud_status" class="form-control my-2">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Other">Other</option>
                    </select>
                    </div>
                    <div class="col-md-4">
                    <label style="font-size:12px;"> Nationality </label>
                    <input name="up_stud_nat" id="up_stud_nat" type="text" class="form-control my-2" placeholder="Nationality">
                    </div>
                    <div class="col-md-4">
                    <label style="font-size:12px;"> Religion </label>
                    <input name="up_stud_religion" id="up_stud_religion" type="text" class="form-control my-2" placeholder="Religion">
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Contact Number </label>
                    <input name="up_stud_contact" id="up_stud_contact" type="tel" class="form-control my-2" placeholder="0912-345-6781" maxlength = "13">
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Email </label>
                    <input name="up_stud_email" id="up_stud_email" type="email" class="form-control my-2" placeholder="Email">
                    </div>
                    <br>
                    <h5 class="px-2">Secondary Details</h5>
                    <br>
                    <div class="col-md-12">
                    <label style="font-size:12px;"> Father </label>
                    <input name="up_stud_father" id="up_stud_father" type="text" class="form-control my-2" placeholder="Father">
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Occupation </label>
                    <input name="up_stud_fatheroccu" id="up_stud_fatheroccu" type="text" class="form-control my-2" placeholder="Father's Occupation">
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Contact Number </label>
                    <input name="up_stud_fathernum" id="up_stud_fathernum" type="tel" class="form-control my-2" placeholder="0912-345-6781" maxlength = "13">
                    </div>
                    <div class="col-md-12">
                    <label style="font-size:12px;"> Mother </label>
                    <input name="up_stud_mother" id="up_stud_mother" type="text" class="form-control my-2" placeholder="Mother">
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Occupation </label>
                    <input name="up_stud_motheroccu" id="up_stud_motheroccu" type="text" class="form-control my-2" placeholder="Mother's Occupation">
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Contact Number </label>
                    <input name="up_stud_mothernum" id="up_stud_mothernum" type="tel" class="form-control my-2" placeholder="0912-345-6781" maxlength = "13">
                    </div>
                    <div class="col-md-12">
                    <label style="font-size:12px;"> Address </label>
                    <input name="up_stud_parentsadd" id="up_stud_parentsadd" type="text" class="form-control my-2" placeholder="Address">
                    <div class="col-md-12">
                    <label style="font-size:12px;"> Guardian </label>
                    <input name="up_stud_Guard" id="up_stud_Guard" type="text" class="form-control my-2" placeholder="Guardian">
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Occupation </label>
                    <input name="up_stud_guardoccu" id="up_stud_guardoccu" type="text" class="form-control my-2" placeholder="Guardian's Occupation">
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Contact Number </label>
                    <input name="up_stud_guardnum" id="up_stud_guardnum" type="tel" class="form-control my-2" placeholder="0912-345-6781" maxlength = "13">
                    </div>
                    <div class="col-md-12">
                    <label style="font-size:12px;"> Address </label>
                    <input name="up_stud_guardadd" id="up_stud_guardadd" type="text" class="form-control my-2" placeholder="Address">
                    </div>
                </div>
            
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_stud_update">Update Now</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>

<!--Delete Modal-->
<div class="modal" id="delete_student">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Delete Admin Account</h3>
          </div>
          <div class="modal-body">
            <p> Do You Want to Delete the Record ?</p>
            <button type="button" class="btn btn-success" id="btn_delete_student">Delete</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--Show Modal enrollment-->
<div class="modal" id="enrollment">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Student Enrollment Records</h3>
          </div>
          <div class="modal-body">
          
          <div class="card-body">
          <form id="modal-form">
          <div class="row">
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Student Code </label>
                    <input name="add_code" id="add_code" type="text" class="form-control my-2" placeholder="Student Code" readonly>
                    </div>
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Student Name </label>
                    <input name="add_name" id="add_name" type="text" class="form-control my-2" placeholder="Student Name" readonly>
                    </div>
                    <div class="col-md-4">
                        <label style="color: black;">Status</label>
                            <select id="add_stat" name="add_stat" class="form-control my-2">
                                <option value="New">New</option>
                                <option value="Continuing">Continuing</option>
                                <option value="Transferee">Transferee</option>
                      </select>
                    </div>

                    <div class="col-md-4">
                    <label style="color: black;">Grade Level</label>
                    <?php
                    if ($r_set = $con->query($query)){
                        echo "<SELECT id='add_Gradelevel' name=grade_level class='form-control my-2' style='width: 200px'>";
                        while($row = $r_set->fetch_assoc()){
                            echo "<option value=$row[section_id]> ($row[grade_level])  $row[section]</option>";
                        }
                        echo "</select>";
                    }
                    else{
                        echo $con->error;
                    }  ?>
                    </div>

                    <div class="col-md-4">
                    <label style="color: black;">Academic Year</label>
                    <?php
                    if ($r_set = $con->query($sql)){
                        echo "<SELECT id='add_year' name=acad_year class='form-control my-2' style='width: 200px'>";
                        while($row = $r_set->fetch_assoc()){
                            echo "<option value=$row[ay_id]> $row[acad_year]</option>";
                        }
                        echo "</select>";
                    }
                    else{
                        echo $con->error;
                    }  ?>
                    </div>
                    
                </div>
                <div class="px-0">
                <button class="btn btn-success " type="submit" id="enroll" name="enroll" value="Enroll" > Enroll </button>
                </div>
                  </form>
                  <hr>
              <div class="table-responsive" id="showEnrollment">
              </div>
          </div>
          </div>
          <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Show Modal subjects -->
    <div class="modal" id="modal_subjects">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Enrolled Subjects of Students</h3>
          </div>
          <div class="modal-body">
          
          <div class="card-body">
          <div class="row">
          <input type="hidden" id="enrollmentID" name="enrollmentID">
                    <div class="col-md-6">
                          <label style="font-size:12px; color: black;"> Student Code : </label>
                          <input style="font-size:12px; color: black; background-color: white; border-width:0px; border:none;" name="stud_code" id="stud_code" type="text" class="form-control my-2" readonly>
                    </div>
                    <div class="col-md-6">
                          <label style="font-size:12px; color: black;"> Student Name : </label>
                          <input style="font-size:12px; color: black; background-color: white; border-width:0px; border:none;" name="stud_name" id="stud_name" type="text" class="form-control my-2" readonly>
                    </div>
                    
          </div>
          <hr>
          <form id="assSubForm">
            <div class="form-group" >
                    <label style="color: black;">Subjects</label>
                    <?php
                    if ($r_set = $con->query($sql1)){
                        echo "<select style='border-radius:50px;' id='check_subs' name='check_subs[]' class='form-control' multiple = 'multiple'>";
                        while($row = $r_set->fetch_assoc()){
                            echo "<option value=$row[subject_id]> ($row[grade_level]) $row[subject_name]</option>";
                        }
                        echo "</select>";
                    }
                    else{
                        echo $con->error;
                    }  ?>
                    <!-- <div class="table-responsive" id="showSubjects">
                    </div> -->
                </div>  
                <div class="form-group">
                <input type="Submit" class="btn btn-success" id="assSubs" value="Assign Subject"></input>
                  </div>
                  </form>
                  <hr>
              <div  class="table-responsive" id="showStudSub">
              </div>
          </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_ass_close">Close</button>
          </div>
        </div>
      </div>
    </div>




<?php
    require_once 'assets/php/footer.php'
?>
<script>
  // $(document).on('click','#btn_ass_close',function()
  //         {
  //           $('#enrollment').modal('show');
                
  //         })
        $(document).ready(function(){
        var date_input=$('input[name="up_stud_date"]');
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
        })

</script>
<script>

var num = document.querySelector('#up_stud_contact');

    num.addEventListener('keyup', function(e){
    if (event.key != 'Backspace' && (num.value.length === 4 || num.value.length === 8)){
        num.value += '-';
    }
    });

var num2 = document.querySelector('#up_stud_fathernum');

num2.addEventListener('keyup', function(e){
if (event.key != 'Backspace' && (num2.value.length === 4 || num2.value.length === 8)){
    num2.value += '-';
}
});

var num3 = document.querySelector('#up_stud_mothernum');

num3.addEventListener('keyup', function(e){
if (event.key != 'Backspace' && (num3.value.length === 4 || num3.value.length === 8)){
    num3.value += '-';
}
});

var num4 = document.querySelector('#up_stud_guardnum');

num4.addEventListener('keyup', function(e){
if (event.key != 'Backspace' && (num4.value.length === 4 || num4.value.length === 8)){
    num4.value += '-';
}
});
</script>