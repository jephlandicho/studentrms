<?php

require_once 'connection.php';
// for selecting admin account
    function edit_admin()
    {
        global $con;
        $AdminID = $_POST['AdminID'];
        $sql = "SELECT * FROM admin_login WHERE admin_id='$AdminID'";
        $result = mysqli_query($con,$sql);
        // $stmt = $this->conn->prepare($sql);
        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
        while($row=mysqli_fetch_array($result)){
            $Admin_data[0]=$row['admin_id'];
            $Admin_data[1]=$row['name'];
            $Admin_data[2]=$row['username'];
            $Admin_data[3]=$row['email'];
            $Admin_data[4]=$row['password'];
        }
        echo json_encode($Admin_data);
        
    }
    // for editing admin account
    function update_value()
    {
        global $con;
        $Update_ID = $_POST['U_ID'];
        $Update_Name = $_POST['U_Name'];
        $Update_Username = $_POST['U_UserName'];
        $Update_Email =$_POST['U_Email'];
        $Update_Pass = $_POST['U_Pass'];

        $hpassword = sha1($Update_Pass);

        $query = "UPDATE admin_login SET name='$Update_Name', username='$Update_Username',email='$Update_Email', password='$hpassword' where admin_id='$Update_ID'";
        $result = mysqli_query($con,$query);
        if($result)
        {
            echo ' Admin Account Has Been Updated ';
        }
        else
        {
            echo ' Please Check Your Query ';
        }

    }
    function delete_record()
    {
        global $con;
        $Del_Id = $_POST['Del_ID'];
        $query = "DELETE FROM admin_login WHERE admin_id='$Del_Id' ";
        $result = mysqli_query($con,$query);

        if($result)
        {
            echo ' Admin Account Has Been Deleted ';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }



// for selecting student information
function edit_student()
{
    global $con;
    $StudID = $_POST['StudID'];
    $sql = "SELECT `Student_code`, `LRN`, `FName`, `LName`, `MName`, `Suffix`, `Sex`, `Birthdate`, `Address`, `BirthPlace`, `Civil_Status`, `Nationality`, `Religion`, `Contact_No`, `Email`, `Father`, `Father_Occu`, `Father_Contact`, `Mother`, `Mother_Occu`, `Mother_Contact`, `Parents_Address`, `Guardian`, `Guardian_Occu`, `Guardian_Contact`, `Guardian_Add` FROM `students` INNER JOIN `studentsdetails` ON Student_code=student_no WHERE Student_code = '$StudID';";
    $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
        $Stud_data[0]=$row['Student_code'];
        $Stud_data[1]=$row['LRN'];
        $Stud_data[2]=$row['FName'];
        $Stud_data[3]=$row['LName'];
        $Stud_data[4]=$row['MName'];
        $Stud_data[5]=$row['Suffix'];
        $Stud_data[6]=$row['Sex'];
        $Stud_data[7]=$row['Birthdate'];
        $Stud_data[8]=$row['Address'];
        $Stud_data[9]=$row['BirthPlace'];
        $Stud_data[10]=$row['Civil_Status'];
        $Stud_data[11]=$row['Nationality'];
        $Stud_data[12]=$row['Religion'];
        $Stud_data[13]=$row['Contact_No'];
        $Stud_data[14]=$row['Email'];
        $Stud_data[15]=$row['Father'];
        $Stud_data[16]=$row['Father_Occu'];
        $Stud_data[17]=$row['Father_Contact'];
        $Stud_data[18]=$row['Mother'];
        $Stud_data[19]=$row['Mother_Occu'];
        $Stud_data[20]=$row['Mother_Contact'];
        $Stud_data[21]=$row['Parents_Address'];
        $Stud_data[22]=$row['Guardian'];
        $Stud_data[23]=$row['Guardian_Occu'];
        $Stud_data[24]=$row['Guardian_Contact'];
        $Stud_data[25]=$row['Guardian_Add'];

    }
    echo json_encode($Stud_data);
    
}
// for editing student information
function update_value_student()
{
    global $con;
    $UpdateID = $_POST['UpdateID'];
    $UpdateFName = $_POST['UpdateFName'];
    $UpdateLName = $_POST['UpdateLName'];
    $UpdateMName =$_POST['UpdateMName'];
    $UpdateSuffix =$_POST['UpdateSuffix'];
    $UpdateSex =$_POST['UpdateSex'];
    $UpdateBDate =$_POST['UpdateBDate'];
                // computing age
                $today = date("Y-m-d");
                $diff = date_diff(date_create($UpdateBDate), date_create($today));
                $studentAge = $diff->format('%y');

    $UpdateAddress =$_POST['UpdateAddress'];
    $UpdateBPlace =$_POST['UpdateBPlace'];
    $UpdateStatus =$_POST['UpdateStatus'];
    $UpdateNat =$_POST['UpdateNat'];
    $UpdateReligion =$_POST['UpdateReligion'];
    $UpdateCon =$_POST['UpdateCon'];
    $UpdateEmail =$_POST['UpdateEmail'];
    $UpdateFather =$_POST['UpdateFather'];
    $UpdateFOccu =$_POST['UpdateFOccu'];
    $UpdateFNum =$_POST['UpdateFNum'];
    $UpdateMother =$_POST['UpdateMother'];
    $UpdateMOccu =$_POST['UpdateMOccu'];
    $UpdateMNum =$_POST['UpdateMNum'];
    $UpdatePAdd =$_POST['UpdatePAdd'];
    $UpdateGuardian =$_POST['UpdateGuardian'];
    $UpdateGOccu =$_POST['UpdateGOccu'];
    $UpdateGNum =$_POST['UpdateGNum'];
    $UpdateGAdd =$_POST['UpdateGAdd'];


    


    $query = "UPDATE students,studentsdetails SET `FName`= '$UpdateFName', `LName`= '$UpdateLName', `MName`= '$UpdateMName', `Suffix`= '$UpdateSuffix', `Sex`= '$UpdateSex', `Birthdate`= '$UpdateBDate', `Age`= '$studentAge', `Address`= '$UpdateAddress', `BirthPlace`= '$UpdateBPlace', `Civil_Status`= '$UpdateStatus', `Nationality`= '$UpdateNat', `Religion`= '$UpdateReligion', `Contact_No`= '$UpdateCon', `Email`= '$UpdateEmail', `Father`= '$UpdateFather', `Father_Occu`= '$UpdateFOccu', `Father_Contact`= '$UpdateFNum', `Mother`= '$UpdateMother', `Mother_Occu`= '$UpdateMOccu', `Mother_Contact`= '$UpdateMNum', `Parents_Address`= '$UpdatePAdd', `Guardian`= '$UpdateGuardian', `Guardian_Occu`= '$UpdateGOccu', `Guardian_Contact`= '$UpdateGNum', `Guardian_Add`= '$UpdateGAdd' where Student_code= '$UpdateID' && student_no ='$UpdateID'";
    $result = mysqli_query($con,$query);
    if($result)
    {
        echo ' Student Information Has Been Updated ';
    }
    else
    {
        echo ' Please Check Your Query ';
    }

}
function delete_student()
{
    global $con;
    $Del_Id = $_POST['Del_ID'];
    $query = "DELETE students,studentsdetails FROM students INNER JOIN studentsdetails  
    WHERE Student_code = student_no  and Student_code = '$Del_Id'
     ";
    $result = mysqli_query($con,$query);

    if($result)
    {
        echo ' Students Information Has Been Deleted ';
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}

// for selecting teachers information
function edit_teacher()
{
    global $con;
    $TeachID = $_POST['TeachID'];
    $sql = "SELECT `t_code`, `FName`, `LName`, `MName`, `Suffix`, `Sex`, `Civil_Status`, `Birthdate`, `Address`, `Contact_Number`, `Email`, `Specialization`, `Employment_Status`  FROM `teachers`  WHERE `t_code` = '$TeachID';";
    $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
        $Teach_data[0]=$row['t_code'];
        $Teach_data[1]=$row['FName'];
        $Teach_data[2]=$row['LName'];
        $Teach_data[3]=$row['MName'];
        $Teach_data[4]=$row['Suffix'];
        $Teach_data[5]=$row['Sex'];
        $Teach_data[6]=$row['Civil_Status'];
        $Teach_data[7]=$row['Birthdate'];
        $Teach_data[8]=$row['Address'];
        $Teach_data[9]=$row['Contact_Number'];
        $Teach_data[10]=$row['Email'];
        $Teach_data[11]=$row['Specialization'];
        $Teach_data[12]=$row['Employment_Status'];

    }
    echo json_encode($Teach_data);
    
}
// for editing teacher information
function update_value_teacher()
{
    global $con;
    $UpdateID = $_POST['UpdateID'];
    $UpdateFName = $_POST['UpdateFName'];
    $UpdateLName = $_POST['UpdateLName'];
    $UpdateMName =$_POST['UpdateMName'];
    $UpdateSuffix =$_POST['UpdateSuffix'];
    $UpdateSex =$_POST['UpdateSex'];
    $UpdateStatus =$_POST['UpdateStatus'];
    $UpdateBDate =$_POST['UpdateBDate'];
                // computing age
                $today = date("Y-m-d");
                $diff = date_diff(date_create($UpdateBDate), date_create($today));
                $teacherAge = $diff->format('%y');

    $UpdateAddress =$_POST['UpdateAddress'];
    $UpdateCon =$_POST['UpdateCon'];
    $UpdateEmail =$_POST['UpdateEmail'];
    $UpdateSpec =$_POST['UpdateSpec'];
    $UpdateEmpStat =$_POST['UpdateEmpStat'];


    


    $query = "UPDATE teachers SET `FName`= '$UpdateFName', `LName`= '$UpdateLName', `MName`= '$UpdateMName', `Suffix`= '$UpdateSuffix', `Sex`= '$UpdateSex',  `Civil_Status`= '$UpdateStatus', `Birthdate`= '$UpdateBDate', `Age`= '$teacherAge', `Address`= '$UpdateAddress',`Contact_Number`= '$UpdateCon', `Email`= '$UpdateEmail', `Specialization`= '$UpdateSpec', `Employment_Status`= '$UpdateEmpStat' where t_code= '$UpdateID'";
    $result = mysqli_query($con,$query);
    if($result)
    {
        echo ' Teacher Information Has Been Updated ';
    }
    else
    {
        echo ' Please Check Your Query ';
    }

}


// delete teacher
function delete_teacher()
{
    global $con;
    $Del_Id = $_POST['Del_ID'];
    $query = "DELETE FROM teachers WHERE t_code = '$Del_Id'";
    $result = mysqli_query($con,$query);

    if($result)
    {
        echo ' Teachers Information Has Been Deleted ';
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}

// add Academic Year
function add_acad()
{
    global $con;
    $Acad = $_POST['AAcad'];
    
    $query = "INSERT INTO `acad_year` (`acad_year`) VALUES ('$Acad');";
    $result= mysqli_query($con,$query);

    if($result)
    {
        echo 'New Academic Year Added';
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}
// for selecting acad information
function edit_acad()
{
    global $con;
    $AcadID = $_POST['AcadID'];
    $sql = "SELECT * FROM `acad_year` WHERE `ay_id` = '$AcadID';";
    $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
        $Acad_data[0]=$row['ay_id'];
        $Acad_data[1]=$row['acad_year'];

    }
    echo json_encode($Acad_data);
    
}

// for editing acad information
function update_value_acad()
{
    global $con;
    $UpdateID = $_POST['UpdateID'];
    $UpdateAcad = $_POST['UpdateAcad'];


    $query = "UPDATE acad_year SET `acad_year`= '$UpdateAcad' where ay_id= '$UpdateID'";
    $result = mysqli_query($con,$query);
    if($result)
    {
        echo ' Acad Year Has Been Updated ';
    }
    else
    {
        echo ' Please Check Your Query ';
    }

}
// delete acad
function delete_acad()
{
    global $con;
    $Del_Id = $_POST['Del_ID'];
    $query = "DELETE FROM acad_year WHERE ay_id = '$Del_Id'";
    $result = mysqli_query($con,$query);

    if($result)
    {
        echo ' Acad Year Has Been Deleted ';
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}

// add section
function add_section()
{
    global $con;
    $Section = $_POST['Section'];
    $GLevel = $_POST['Grade_level'];
    
    $query = "INSERT INTO `sections` (`section`, `grade_level_id`) VALUES ('$Section', '$GLevel');";
    $result= mysqli_query($con,$query);

    if($result)
    {
        echo 'New Section Added';
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}

// for selecting section information
function edit_section()
{
    global $con;
    $SectionID = $_POST['SectionID'];
    $sql = "SELECT * FROM `sections` WHERE `section_id` = '$SectionID';";
    $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
        $Sect_data[0]=$row['section_id'];
        $Sect_data[1]=$row['section'];
        $Sect_data[2]=$row['grade_level_id'];

    }
    echo json_encode($Sect_data);
    
}

// for editing acad information
function update_value_section()
{
    global $con;
    $UpdateID = $_POST['UpdateID'];
    $UpdateSect = $_POST['UpdateSect'];
    $UpdateGL = $_POST['UpdateGL'];


    $query = "UPDATE sections SET `section`= '$UpdateSect', `grade_level_id`= '$UpdateGL' where section_id='$UpdateID'";
    $result = mysqli_query($con,$query);
    if($result)
    {
        echo ' Section Has Been Updated ';
    }
    else
    {
        echo ' Please Check Your Query ';
    }

}

// add section
function add_subject()
{
    global $con;
    $subject = $_POST['subject'];
    $subject_desc = $_POST['subject_desc'];
    $term = $_POST['term'];
    $Grade_level = $_POST['Grade_level'];
    
    $query = "INSERT INTO `subjects` (`subject_name`, `subject_desc`, `term`, `grade_level_id`) VALUES ('$subject', '$subject_desc', '$term', '$Grade_level');";
    $result= mysqli_query($con,$query);

    if($result)
    {
        echo 'New Subject Added';
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}

function get_code(){
    global $con;
        $StudentID = $_POST['StudID'];
        $sql = "SELECT `Student_code`, CONCAT(`LName`, ',', '' , `FName` , ' ' , `MName`) as Fullname FROM `students` WHERE `Student_code` =  '$StudentID';";
        $result = mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($result)){
            $Student_data[0]=$row['Student_code'];
            $Student_data[1]=$row['Fullname'];
    
        }
        echo json_encode($Student_data);
}


function enroll_stud(){
    global $con;
        $Student_Code = $_POST['Student_Code'];
        $Student_Stat = $_POST['Student_Stat'];
        $Student_GLevel = $_POST['Student_GLevel'];
        $Student_AcadYear = $_POST['Student_AcadYear'];
        $sql = "INSERT INTO `enrolled_student` (`Student_code`, `Section_id`, `Status`, `Acad_Year_id`) VALUES ('$Student_Code', '$Student_GLevel', '$Student_Stat', '$Student_AcadYear');";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            echo 'Student Enrolled Successfully';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
}

// get data of the enrollment
function get_data_enroll(){
    global $con;
        $AssSub = $_POST['AssSub'];
        $sql = "SELECT `enrollment_id`, students.Student_code , CONCAT(LName , ',' , ' ' , FName , ' ' ,MName) AS FullName, enrolled_student.Status, acad_year.acad_year, CONCAT(grade_level.grade_level , ' ' , sections.section ) as grade_section  
        FROM enrolled_student
        INNER JOIN students ON students.Student_code=enrolled_student.Student_code
        INNER JOIN sections ON sections.section_id=enrolled_student.Section_id
        INNER JOIN acad_year ON acad_year.ay_id=enrolled_student.Acad_Year_id
        INNER JOIN grade_level ON grade_level.gl_id=sections.grade_level_id
        INNER JOIN department ON grade_level.dept_id=department.dept_id
        WHERE enrolled_student.enrollment_id = '$AssSub';";
        $result = mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($result)){
            $en_data[0]=$row['enrollment_id'];
            $en_data[1]=$row['Student_code'];
            $en_data[2]=$row['FullName'];
    
        }
        echo json_encode($en_data);
}

// assign student subjects
function assign_subjects(){
    global $con;

    $enrollID = $_POST['EnID'];
    $Subs = $_POST['Subs'];
     
    foreach($Subs as $subjects)
    {
        $query = "INSERT INTO `student_subject` (subj_code, enroll_id) VALUES ('$subjects', '$enrollID'); ";
        $result = mysqli_query($con,$query);
        
    }
    if($result)
        {
            echo 'Subjects Assigned Successfully';
        }
        else
        {
            echo ' Please Check Your Query ';
        }

}
// assign teacher subjects
function assign_t_subjects(){
    global $con;

    $t_IDD = $_POST['t_IDD'];
    $tsubs = $_POST['tsubs'];
     
    foreach($tsubs as $subject)
    {
        $query = "INSERT INTO `teacher_subjects` (teach_code, subs_id) VALUES ('$t_IDD', '$subject'); ";
        $result = mysqli_query($con,$query);
        
    }
    if($result)
        {
            echo 'Subjects Assigned Successfully';
        }
        else
        {
            echo ' Please Check Your Query ';
        }

}
?>