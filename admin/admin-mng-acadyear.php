
<?php
    require_once 'assets/php/header.php';
?>

    <div class="content">
    <div class="row">       
    <div class="col-md-12">
    <div class="card">
                    <div class="card-header">
                        <h5 class="title">
                           Academic Year
                        </h5>
                    </div>
                    <div class="px-2">
                            
                            <input id="add_ay" class="btn btn-success mt-2" data-toggle="modal" data-target="#add-ay" value="Add New AY" style="height:50px; width:200px; border-radius: 50px; font-size:16px;">
                            </a>  
</div>
                    <div class="card-body">
                            <div class="table-responsive" id="showAcad">
                            </div>
                    </div>
                    
    </div>
    </div>
    </div>
    </div>
              <!--Add Modal-->
    <div class="modal" id="add-ay">
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
                    <label style="font-size:12px;"> Academic Year </label>
                    <input name="add_acadyear" id="add_acadyear" type="text" class="form-control my-2" placeholder="2000-2001" maxlength = "9" required>
                    </div>    
                </div>
            
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_acad">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>

         <!--Update Modal-->
    <div class="modal" id="updateacad">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Update Acad Year</h3>
          </div>
          <div class="modal-body">
          <p id="up-message" class="text-dark"></p>
            <form id="modal-form">
              <input type="hidden" class="form-control my-2" placeholder="Acad ID" id="Up_Acad_ID" >
              <label style="font-size:12px;"> Acad Year </label> 
                <input type="text" class="form-control my-2" id="Up_Acad" placeholder="2000-2001" maxlength = "9"  required autofocus>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_update_acad">Update Now</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--Delete Modal-->
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
    </div>
</div>



<?php
    require_once 'assets/php/footer.php'
?>
<script>
var num = document.querySelector('#add_acadyear');

num.addEventListener('keyup', function(e){
if (event.key != 'Backspace' && (num.value.length === 4 || num.value.length === 4)){
    num.value += '-';
}
});

var num1 = document.querySelector('#Up_Acad');

num1.addEventListener('keyup', function(e){
if (event.key != 'Backspace' && (num1.value.length === 4 || num1.value.length === 4)){
    num1.value += '-';
}
});
</script>