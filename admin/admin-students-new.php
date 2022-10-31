<?php
    require_once 'assets/php/header.php';
    require_once 'assets/php/connection.php';
    global $con;
    $query = "SELECT Student_code FROM students order by Student_code desc";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['Student_code'];
    if(empty($lastid)){
        $number = "LI-0000001";
    }
    else
    {
        $idd = str_replace('LI-','',$lastid);
        $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
        $number = 'LI-'.$id;
    
    }
    
?>
      <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">
                            Add New Students
                        </h5>
                    </div>
                        <form autocomplete="off"
                            id = "addStudentForm"
                            
                            method = "POST">
                                <div class="row">
                                    <div class="col-md-6 px-5 pl-2">
                                        <div class="form-group">
                                            <label style="color: black;">Student Code</label>
                                            <input type="text" class="form-control" name="inStudCode" id="inStudCode" value="<?php echo $number ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-5">
                                        <div class="form-group">
                                            <label style="color: black;">LRN</label>
                                            <input type="number" class="form-control" name="inLRN" id="inLRN" placeholder="LRN" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">First Name</label>
                                            <input name="inFname" id="inFname" type="text" class="form-control" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Last Name</label>
                                            <input name="inLname" id="inLname" type="text" class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Middle Name</label>
                                            <input name="inMname" id="inMname" type="text" class="form-control" placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Suffix</label>
                                            <input name="inSuffix" id="inSuffix" type="text" class="form-control" placeholder="Suffix">
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Sex</label>
                                                <select id="inSex" name="inSex" class="form-control">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-5 pl-1">
                                    <div class="form-group">
                                    <label class="control-label" for="date" style="color: black;">Date</label>
                                    <input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text" required />
                                    </div>
                                    </div>
                                    <!-- <div class="col-md-3 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Age</label>
                                            <input name="inAge" id="inAge" type="number" class="form-control" placeholder="Age">
                                        </div>
                                    </div> -->
                                    <div class="col-md-6 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Address</label>
                                            <input name="inAddress" id="inAddress" type="text" class="form-control" placeholder="Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Birth Place</label>
                                            <input name="inBirthPlace" id="inBirthPlace" type="text" class="form-control" placeholder="Birth Place">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Civil Status</label>
                                            <select id="inStatus" name="inStatus" class="form-control">
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Nationality</label>
                                            <input name="inNationality" id="inNationality" type="text" class="form-control" placeholder="Nationality" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Religion</label>
                                            <input name="inReligion" id="inReligion" type="text" class="form-control" placeholder="Religion">
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Contact Number</label>
                                            <input name="inContactNum" id="inContactNum" type="tel" class="form-control" placeholder="0912-345-6781" maxlength = "13">
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-5 pl-1">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="inEmail" id="inEmail" type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class="px-4">Secondary Details</h4>
                                    <br>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Father</label>
                                            <input name="inFather" id="inFather" type="text" class="form-control" placeholder="Father">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Father Occupation</label>
                                            <input name="inFatherOccu" id="inFatherOccu" type="text" class="form-control" placeholder="Father Occupation">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Father Contact Number</label>
                                            <input name="inFatherContact" id="inFatherContact" type="tel" class="form-control" placeholder="0912-345-6781" maxlength = "13">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Mother</label>
                                            <input name="inMother" id="inMother" type="text" class="form-control" placeholder="Mother">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Mother Occupation</label>
                                            <input name="inMotherOccu" id="inMotherOccu" type="text" class="form-control" placeholder="Mother Occupation">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Mother Contact Number</label>
                                            <input name="inMotherContact" id="inMotherContact" type="tel" class="form-control" placeholder="0912-345-6781" maxlength = "13">
                                        </div>
                                    </div>
                                    <div class="col-md-12 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Parent's Address</label>
                                            <input name="inParentsAdd" id="inParentsAdd" type="text" class="form-control" placeholder="Parent's Address">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Guardian</label>
                                            <input name="inGuardian" id="inGuardian" type="text" class="form-control" placeholder="Guardian">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Guardian Occupation</label>
                                            <input name="inGuardianOccu" id="inGuardianOccu" type="text" class="form-control" placeholder="Guardian Occupation">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Guardian Contact Number</label>
                                            <input name="inGuardianContact" id="inGuardianContact" type="tel" class="form-control" placeholder="0912-345-6781" maxlength = "13">
                                        </div>
                                    </div>
                                    <div class="col-md-12 px-5 pl-1">
                                        <div class="form-group">
                                            <label style="color: black;">Guardian's Address</label>
                                            <input name="inGuardianAdd" id="inGuardianAdd" type="text" class="form-control" placeholder="Guardian's Address">
                                        </div>
                                    </div>
                                    <div class="px-5">
                                    <input class="btn btn-primary mt-2" type="submit" id="addStudentsBtn" name="addStudentsBtn" value="Add Student" style="height:50px; width:200px; border-radius: 50px; font-size:16px;">
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
        var date_input=$('input[name="date"]');
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

var num = document.querySelector('#inContactNum');

    num.addEventListener('keyup', function(e){
    if (event.key != 'Backspace' && (num.value.length === 4 || num.value.length === 8)){
        num.value += '-';
    }
    });

var num2 = document.querySelector('#inFatherContact');

num2.addEventListener('keyup', function(e){
if (event.key != 'Backspace' && (num2.value.length === 4 || num2.value.length === 8)){
    num2.value += '-';
}
});

var num3 = document.querySelector('#inMotherContact');

num3.addEventListener('keyup', function(e){
if (event.key != 'Backspace' && (num3.value.length === 4 || num3.value.length === 8)){
    num3.value += '-';
}
});

var num4 = document.querySelector('#inGuardianContact');

num4.addEventListener('keyup', function(e){
if (event.key != 'Backspace' && (num4.value.length === 4 || num4.value.length === 8)){
    num4.value += '-';
}
});
</script>