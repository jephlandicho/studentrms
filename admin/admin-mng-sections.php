<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/connection.php';
    global $con;
    $query = "SELECT * FROM `grade_level`";
?>

    <div class="content">
    <div class="row">       
    <div class="col-md-12">
    <div class="card">
                    <div class="card-header">
                        <h5 class="title">
                           Sections
                        </h5>
                    </div>
                    <div class="px-2">
                            
                            <input id="add_section" class="btn btn-success mt-2" data-toggle="modal" data-target="#add-section" value="Add New Section" style="height:50px; width:200px; border-radius: 50px; font-size:16px;">
                            </a>  
</div>
                    <div class="card-body">
                                     
                            <div class="table-responsive" id="showSection">
                            </div>
                    </div>
                    
    </div>
    </div>
    </div>
    </div>
              <!--Add Modal-->
    <div class="modal" id="add-section">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Add Form</h3>
            <p id="message" class="text-dark"></p>
          </div>
          <div class="modal-body">
            <form id="modal-form">
                <div class="row">
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Sections </label>
                    <input name="add_sections" id="add_sections" type="text" class="form-control my-2" placeholder="Section" required autofocus>
                    </div>
                    <div class="col-md-6">
                    <label style="color: black;">Grade Level</label>
                    <?php
                    if ($r_set = $con->query($query)){
                        echo "<SELECT id='add_Gradelevel' name=grade_level class='form-control my-2' style='width: 200px'>";
                        while($row = $r_set->fetch_assoc()){
                            echo "<option value=$row[gl_id]> $row[grade_level]</option>";
                        }
                        echo "</select>";
                    }
                    else{
                        echo $conn->error;
                    }  ?>
                    </div>
                       
                </div>
            
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_section">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>

         <!--Update Modal-->
    <div class="modal" id="updatesection">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Update Acad Year</h3>
          </div>
          <div class="modal-body">
          <p id="up-message" class="text-dark"></p>
            <form id="modal-form">
            <div class="row">
                    <input type="hidden" class="form-control my-2" placeholder="Section ID" id="Up_Section_ID" >
                    <div class="col-md-6">
                    <label style="font-size:12px;"> Sections </label>
                    <input name="up_sections" id="up_sections" type="text" class="form-control my-2" placeholder="Section" required>
                    </div>
                    <div class="col-md-6">
                    <label style="color: black;">Grade Level</label>
                    <?php
                    if ($r_set = $con->query($query)){
                        echo "<SELECT id='up_Gradelevel' name=grade_level class='form-control my-2' style='width: 200px'>";
                        while($row = $r_set->fetch_assoc()){
                            echo "<option value=$row[gl_id]> $row[grade_level]</option>";
                        }
                        echo "</select>";
                    }
                    else{
                        echo $conn->error;
                    }  ?>
                    </div>
                       
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_update_section">Update Now</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Delete Modal
<div class="modal" id="delete_acad">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Delete Acad Year</h3>
          </div>
          <div class="modal-body">
            <p> Do You Want to Delete the Record ?</p>
            <button type="button" class="btn btn-success" id="btn_delete_acad">Delete</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div> -->
</div>



<?php
    require_once 'assets/php/footer.php'
?>