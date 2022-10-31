<?php
session_start();
require_once 'admin-db.php';
$admin = new Admin();


//Handle Admin Login Ajax Request

if(isset($_POST['action']) && $_POST['action'] == 'adminLogin'){
    // print_r($_POST);
    $username = $admin->test_input($_POST['username']);
    $password = $admin->test_input($_POST['password']);

    $hpassword = sha1($password);

    $loggedInAdmin = $admin->admin_login($username,$hpassword);

    if($loggedInAdmin != null){
        echo 'admin_login';
        $_SESSION['username'] = $username;
    }
    else{
        echo $admin->showMessage('Username or Password is Incorrect');
    }
}

    //Handle fetch admin account using ajax request
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllAdminAcc'){
        $output = '';
        $data = $admin->fetchAllAdminAcc(0);
        if($data){
            $output.= '<table class="table table-striped text-center">
            <thead class=" text-primary">
            <th class="text-center"> ID </th>
            <th class="text-center"> Name </th>
            <th class="text-center"> Username </th>
            <th class="text-center"> Email </th>
            <th class="text-center"> Edit </th>
            <th class="text-center"> Delete </th>
            </thead>
            <tbody>';
    foreach ($data as $row){
        $output .= '<tr>
                <td> '.$row['admin_id'].' </td>
                <td> '.$row['name'].' </td>
                <td> '.$row['username'].' </td>
                <td> '.$row['email'].' </td>
                <td> <button class="btn btn-primary rounded btn-sm" data-id="'. $row['admin_id'].'" id = "editAdmin"> <i class="fas fa-edit"> </i> </button> </td>
                <td> <button class="btn btn-primary rounded btn-sm" data-id1="'.$row['admin_id'].'" id = "deleteAdmin"> <i class="fa fa-trash-alt" ></i> </button> </td>
            </tr>';
    }
        $output .= '</tbody>
        </table>';

        echo $output;
    }

    else{
        echo '<h3 class="text-center text-secondary"> ADMIN ACCOUNT NOT FOUND  </h3>';
    }

}

//adding admin account 
if(isset($_POST['action']) && $_POST['action'] == 'registerAdmin'){
    $name = $admin->test_input($_POST['inAdminName']);
    $username = $admin->test_input($_POST['inUsername']);
    $email = $admin->test_input($_POST['inEmail']);
    $pass = $admin->test_input($_POST['inPassword_1']);

    $hpass = sha1($pass);

    if($admin->admin_exist($username)){
        echo $admin->showMessage('This username is already exist');
    }
    else{
        if($admin->registerAdmin($name,$username,$email,$hpass)){
            echo 'registerAdmin';
        }
        else{
            echo $admin->showMessage('Something went wrong! Try again later');
        }
    }
}

// adding students
if(isset($_POST['action']) && $_POST['action'] == 'addStudents'){
        $studentCode = $_POST['inStudCode'];
        $studentLRN = $_POST['inLRN'];
        $studentFirst = $_POST['inFname'];
        $studentLast = $_POST['inLname'];
        $studentMiddle = $_POST['inMname'];
        $studentSuffix = $_POST['inSuffix'];
        $studentSex = $_POST['inSex'];
        $date = $_POST['date'];
        // computing age
        $today = date("Y-m-d");
        $diff = date_diff(date_create($date), date_create($today));
        $studentAge = $diff->format('%y');
        
        $studentAddress = $_POST['inAddress'];
        $studentBirthPlace = $_POST['inBirthPlace'];
        $studentStatus = $_POST['inStatus'];
        $studentNationality = $_POST['inNationality'];
        $studentReligion = $_POST['inReligion'];
        $studentContact = $_POST['inContactNum'];
        $studentEmail = $_POST['inEmail'];

        $studentFather = $_POST['inFather'];
        $studentFatherOccu = $_POST['inFatherOccu'];
        $studentFatherContact = $_POST['inFatherContact'];
        $studentMother = $_POST['inMother'];
        $studentMotherOccu = $_POST['inMotherOccu'];
        $studentMotherContact = $_POST['inMotherContact'];
        $studentParentsAdd = $_POST['inParentsAdd'];
        $studentGuardian = $_POST['inGuardian'];
        $studentGuardianOccu = $_POST['inGuardianOccu'];
        $studentGuardianContact = $_POST['inGuardianContact'];
        $studentGuardianAdd = $_POST['inGuardianAdd'];

        if($admin->addStudents($studentCode,$studentLRN,$studentFirst,$studentLast,$studentMiddle,$studentSuffix,$studentSex,$date,$studentAge,$studentAddress,$studentBirthPlace,$studentStatus,$studentNationality,$studentReligion,$studentContact,$studentEmail,$studentFather,$studentFatherOccu,$studentFatherContact,$studentMother,$studentMotherOccu,$studentMotherContact,$studentParentsAdd,$studentGuardian,$studentGuardianOccu,$studentGuardianContact,$studentGuardianAdd)){
            echo 'addStudents';
        }
        else{
            echo $admin->showMessage('Something went wrong! Try again later');
        }
    
}


// displaying Students
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllStudentsInfo'){
    $output = '';
    $data = $admin->fetchAllStudentsInfo(0);
    if($data){
        $output.= '<table class="table table-striped text-center" id="studentsTable">
        <thead class=" text-primary">
        <th class="text-center"> Student Code </th>
        <th class="text-center"> Name </th>
        <th class="text-center"> Sex </th>
        <th class="text-center"> Age </th>
        <th class="text-center"> Birthdate </th>
        <th class="text-center"> Email </th>
        <th class="text-center"> Edit </th>
        <th class="text-center"> Delete </th>
        </thead>
        <tbody>';
foreach ($data as $row){
    $output .= '<tr>
            <td> '.$row['Student_code'].' </td>
            <td> '.$row['Name'].' </td>
            <td> '.$row['Sex'].' </td>
            <td> '.$row['Age'].' </td>
            <td> '.$row['Birthdate'].' </td>
            <td> '.$row['Email'].' </td>
            <td> <button class="btn btn-primary rounded btn-sm" data-id="'. $row['Student_code'].'" id = "editStudent"> <i class="fas fa-edit"> </i> </button> </td>
            <td> <button class="btn btn-primary rounded btn-sm" data-id2="'.$row['Student_code'].'" id = "deleteStudent"> <i class="fa fa-trash-alt" ></i> </button> </td>
        </tr>';
}
    $output .= '</tbody>
    </table>';

    echo $output;
}

else{
    echo '<h3 class="text-center text-secondary"> STUDENT INFORMATION NOT FOUND !! </h3>';
}

}

// adding teachers
if(isset($_POST['action']) && $_POST['action'] == 'addTeacher'){
    $teacherCode = $_POST['t_code'];
    $teacherFirst = $_POST['teaFname'];
    $teacherLast = $_POST['teaLname'];
    $teacherMiddle = $_POST['teaMname'];
    $teacherSuffix = $_POST['teasuffix'];
    $teacherSex = $_POST['teaSex'];
    $teacherStatus = $_POST['teaStatus'];
    $date = $_POST['teaBdate'];
    // computing age
    $today = date("Y-m-d");
    $diff = date_diff(date_create($date), date_create($today));
    $teacherAge = $diff->format('%y');
    
    $teacherAddress = $_POST['teaAddress'];
    $teacherContact = $_POST['teaContact'];
    $teacherEmail = $_POST['teaEmail'];
    $teacherSpec = $_POST['teaSpecs'];
    $teacherEmpStatus = $_POST['teaEmpStatus'];

    if($admin->addTeacher($teacherCode,$teacherFirst,$teacherLast,$teacherMiddle,$teacherSuffix,$teacherSex,$teacherStatus,$date,$teacherAge,$teacherAddress,$teacherContact,$teacherEmail,$teacherSpec,$teacherEmpStatus)){
        echo 'addTeacher';
    }
    else{
        echo $admin->showMessage('Something went wrong! Try again later');
    }

}

// displaying Students
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllTeachersInfo'){
    $output = '';
    $data = $admin->fetchAllTeachersInfo(0);
    if($data){
        $output.= '<table class="table table-striped text-center" id="teachersTable">
        <thead class=" text-primary">
        <th class="text-center"> Teachers Code </th>
        <th class="text-center"> Name </th>
        <th class="text-center"> Sex </th>
        <th class="text-center"> Age </th>
        <th class="text-center"> Birthdate </th>
        <th class="text-center"> Email </th>
        <th class="text-center"> Edit </th>
        <th class="text-center"> Delete </th>
        </thead>
        <tbody>';
foreach ($data as $row){
    $output .= '<tr>
            <td> '.$row['t_code'].' </td>
            <td> '.$row['Name'].' </td>
            <td> '.$row['Sex'].' </td>
            <td> '.$row['Age'].' </td>
            <td> '.$row['Birthdate'].' </td>
            <td> '.$row['Email'].' </td>
            <td> <button class="btn btn-primary rounded btn-sm" data-id="'. $row['t_code'].'" id = "editTeachers"> <i class="fas fa-edit"> </i> </button> </td>
            <td> <button class="btn btn-primary rounded btn-sm" data-id3="'.$row['t_code'].'" id = "deleteTeachers"> <i class="fa fa-trash-alt" ></i> </button> </td>
        </tr>';
}
    $output .= '</tbody>
    </table>';

    echo $output;
}

else{
    echo '<h3 class="text-center text-secondary"> TEACHERS INFORMATION NOT FOUND !! </h3>';
}

}

// displaying Acad Year
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllAcad'){
    $output = '';
    $data = $admin->fetchAllAcad(0);
    if($data){
        $output.= '<table class="table table-striped text-center" id="acadTable">
        <thead class=" text-primary">
        <th class="text-center"> ID </th>
        <th class="text-center" > Academic Year </th>
        <th class="text-center"> Edit </th>
        <th class="text-center" > Delete </th>
        </thead>
        <tbody>';
foreach ($data as $row){
    $output .= '<tr>
            <td> '.$row['ay_id'].' </td>
            <td> '.$row['acad_year'].' </td>
            <td> <button class="btn btn-primary rounded btn-sm" data-id="'. $row['ay_id'].'" id = "editAcad"> <i class="fas fa-edit"> </i> </button> </td>
            <td> <button class="btn btn-primary rounded btn-sm" data-id4="'.$row['ay_id'].'" id = "deleteAcad"> <i class="fa fa-trash-alt" ></i> </button> </td>
        </tr>';
}
    $output .= '</tbody>
    </table>';

    echo $output;
}

else{
    echo '<h3 class="text-center text-secondary"> ACADEMIC YEAR NOT FOUND !! </h3>';
}

}



?>