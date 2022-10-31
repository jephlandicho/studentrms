<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/connection.php';
    global $con;
    $query = "SELECT t_code FROM teachers order by t_code desc";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['t_code'];
    if(empty($lastid)){
        $number = "LIF-0000001";
    }
    else
    {
        $idd = str_replace('LIF-','',$lastid);
        $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
        $number = 'LIF-'.$id;
    
    }
?>
      <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">
                            Add New Teacher
                        </h5>
                    </div>
                        <form autocomplete="off"
                            id = "addTeacherForm"
                            method = "post">
                                <div class="row">
                                    <div class="col-md-9 px-5 pl-2">
                                        <div class="form-group">
                                            <label style="color: black;">Teacher Code</label>
                                            <input type="text" class="form-control" name="t_code" id="t_code" value="<?php echo $number ?>" readonly>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">First Name</label>
                                            <input name="teaFname" id="teaFname" type="text" class="form-control" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Last Name</label>
                                            <input name="teaLname" id="teaLname" type="text" class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                      <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Middle Name</label>
                                            <input name="teaMname" id="teaMname" type="text" class="form-control" placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Suffix</label>
                                            <input name="teasuffix" id="teasuffix" type="text" class="form-control" placeholder="Suffix">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Sex</label>
                                                <select id="teaSex" name="teaSex" class="form-control">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Civil Status</label>
                                            <select id="teaStatus" name="teaStatus" class="form-control">
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-5 pl-1">
                                    <div class="form-group">
                                    <label class="control-label" for="date" style="color: black;">Birth Date</label>
                                    <input class="form-control" id="teaBdate" name="teaBdate" placeholder="YYYY/MM/DD" type="text" required />
                                    </div>
                                    </div>


                                    <div class="col-md-12 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Address</label>
                                            <input name="teaAddress" id="teaAddress" type="text" class="form-control" placeholder="Address" required>
                                        </div>
                                    </div>
                                  
                              
                                    <div class="col-md-6 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Contact Number</label>
                                            <input name="teaContact" id="teaContact" type="tel" class="form-control" placeholder="0912-345-6781" maxlength = "13">
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-5 pl-1">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="teaEmail" id="teaEmail" type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <div class="col-md-6 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Specialization</label>
                                            <input name="teaSpecs" id="teaSpecs" type="text" class="form-control" placeholder="Specialization" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Employment Status</label>
                                                <select id="teaEmpStatus" name="teaEmpStatus" class="form-control">
                                                    <option value="New">New</option>
                                                    <option value="Regular">Regular</option>
                                                </select>
                                        </div>
                                    </div>

                                     <div class="px-5">
                                    <input class="btn btn-primary mt-2" type="submit" id="addTeacherBtn" name="addTeacherBtn" value="Add Teacher" style="height:50px; width:200px; border-radius: 50px; font-size:16px;">
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

<script>
        $(document).ready(function(){
        var date_input=$('input[name="teaBdate"]');
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
        })

    var num = document.querySelector('#teaContact');

    num.addEventListener('keyup', function(e){
    if (event.key != 'Backspace' && (num.value.length === 4 || num.value.length === 8)){
        num.value += '-';
    }
    });
</script>

