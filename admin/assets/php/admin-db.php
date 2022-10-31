<?php
require_once 'config.php';

class Admin extends Database{

    // verify admin login
    public function admin_login($username, $password){
        $sql = "SELECT username,password FROM admin_login WHERE username = :username AND password = :password"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row;
    }

    // count to total numbers of rows
    public function totalCount($tablename){
        $sql = "SELECT * FROM $tablename"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count =$stmt->rowCount();

        return $count;
    }

    // fetch all admin account

    public function fetchAllAdminAcc(){
        $sql = "SELECT admin_id, name, username, email FROM admin_login";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // add admin account
    public function registerAdmin($adminName, $AdminUsername, $adminEmail, $adminPassword){
        $sql = "INSERT INTO admin_login (name, username, email, password) VALUES (:name,:username,:email,:pass)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$adminName, 'username'=>$AdminUsername, 'email'=>$adminEmail, 'pass'=>$adminPassword]);
        return true;
    }

    //check if the username is exist
    public function admin_exist($AdminUsername){
        $sql = "SELECT username FROM admin_login WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username'=>$AdminUsername]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // adding students
    public function addStudents($studentCode,$studentLRN,$studentFirst,$studentLast,$studentMiddle,$studentSuffix,$studentSex,$date,$studentAge,$studentAddress,$studentBirthPlace,$studentStatus,$studentNationality,$studentReligion,$studentContact,$studentEmail,$studentFather,$studentFatherOccu,$studentFatherContact,$studentMother,$studentMotherOccu,$studentMotherContact,$studentParentsAdd,$studentGuardian,$studentGuardianOccu,$studentGuardianContact,$studentGuardianAdd){
        $sql = "INSERT INTO `students` (`Student_code`, `LRN`, `FName`, `LName`, `MName`, `Suffix`, `Sex`,`Birthdate`,`Age`, `Address`, `BirthPlace`, `Civil_Status`, `Nationality`, `Religion`, `Contact_No`, `Email`,`Student_password`) VALUES (:Student_code, :LRN, :FName, :LName, :MName, :Suffix, :Sex,:Birthdate,:Age, :Address, :BirthPlace, :Civil_Status, :Nationality, :Religion, :Contact_No, :Email,:Student_password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['Student_code'=>$studentCode, 'LRN'=>$studentLRN, 'FName'=>$studentFirst, 'LName'=>$studentLast, 'MName'=>$studentMiddle, 'Suffix'=>$studentSuffix, 'Sex'=>$studentSex,'Birthdate'=>$date,'Age'=>$studentAge, 'Address'=>$studentAddress, 'BirthPlace'=>$studentBirthPlace, 'Civil_Status'=>$studentStatus, 'Nationality'=>$studentNationality, 'Religion'=>$studentReligion, 'Contact_No'=>$studentContact, 'Email'=>$studentEmail,'Student_password'=>$studentCode]);
        
        $sql2 = "INSERT INTO `studentsdetails` (`student_no`, `Father`, `Father_Occu`, `Father_Contact`, `Mother`, `Mother_Occu`, `Mother_Contact`, `Parents_Address`, `Guardian`, `Guardian_Occu`, `Guardian_Contact`, `Guardian_Add`) VALUES (:student_no, :Father, :Father_Occu, :Father_Contact, :Mother, :Mother_Occu,:Mother_Contact,:Parents_Address, :Guardian, :Guardian_Occu, :Guardian_Contact, :Guardian_Add)";
        $stmt2 = $this->conn->prepare($sql2);
        $stmt2->execute(['student_no'=>$studentCode, 'Father'=>$studentFather, 'Father_Occu'=>$studentFatherOccu, 'Father_Contact'=>$studentFatherContact, 'Mother'=>$studentMother, 'Mother_Occu'=>$studentMotherOccu, 'Mother_Contact'=>$studentMotherContact,'Parents_Address'=>$studentParentsAdd,'Guardian'=>$studentGuardian, 'Guardian_Occu'=>$studentGuardianOccu, 'Guardian_Contact'=>$studentGuardianContact, 'Guardian_Add'=>$studentGuardianAdd]);
        return true;
    }

    // display students info
    public function fetchAllStudentsInfo(){
        $sql = "SELECT Student_code, CONCAT(LName , ',' , ' ' , FName , ' ' ,MName) AS Name, Sex, Age, Birthdate, Email FROM `students`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // adding teachers
    public function addTeacher($teacherCode,$teacherFirst,$teacherLast,$teacherMiddle,$teacherSuffix,$teacherSex,$teacherStatus,$date,$teacherAge,$teacherAddress,$teacherContact,$teacherEmail,$teacherSpec,$teacherEmpStatus){
        $sql = "INSERT INTO `teachers` (`t_code`, `FName`, `LName`, `MName`, `Suffix`, `Sex`, `Civil_Status`, `Birthdate`, `Age`, `Address`, `Contact_Number`, `Email`, `Specialization`, `Employment_Status`, `teach_pass`) VALUES (:t_code, :FName, :LName, :MName, :Suffix, :Sex, :Civil_Status, :Birthdate, :Age, :Address, :Contact_Number, :Email, :Specialization, :Employment_Status, :teach_pass)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['t_code'=> $teacherCode, 'FName'=>$teacherFirst, 'LName'=>$teacherLast, 'MName'=>$teacherMiddle, 'Suffix'=>$teacherSuffix, 'Sex'=>$teacherSex, 'Civil_Status'=>$teacherStatus, 'Birthdate'=>$date, 'Age'=>$teacherAge, 'Address'=>$teacherAddress, 'Contact_Number'=>$teacherContact, 'Email'=>$teacherEmail, 'Specialization'=>$teacherSpec, 'Employment_Status'=>$teacherEmpStatus, 'teach_pass'=>$teacherCode]);
       return true;
    }

    // display teachers information
    public function fetchAllTeachersInfo(){
        $sql = "SELECT t_code, CONCAT(LName , ',' , ' ' , FName , ' ' ,MName) AS Name, Sex, Age, Birthdate, Email FROM `teachers`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

        // fetch all Academic year

        public function fetchAllAcad(){
            $sql = "SELECT * FROM acad_year";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    // end of class
    }
?>