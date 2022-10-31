$(document).ready(function(){
    
    //for displying admin account in a table
    fetchAllAdminAcc();
    function fetchAllAdminAcc(){
        $.ajax({
            url: 'assets/php/admin-action.php',
            method : 'post',
            data : {action: 'fetchAllAdminAcc'},
            success:function(response){
                $('#showAdminAcc').html(response);
                $("table").DataTable({
                    order: [0,'desc']
                });
            }
        })
    }

    // for adding new admin account
    $("#addAdminBtn").click(function(e){
        if($('#addAdminForm')[0].checkValidity()){
            e.preventDefault();
            if($("#inPassword_1").val() != $("#inPassword_2").val()){
                $("#passError").text('Password did not matched!');
            }
            else{
                $("#passError").text('');
                $.ajax({
                    url: 'assets/php/admin-action.php',
                    method: 'post',
                    data: $("#addAdminForm").serialize()+'&action=registerAdmin',
                    success:function(response){
                        $("#addAdminBtn").val('Add Admin');
                        if(response === 'registerAdmin'){
                            alert('New Admin Account Created');
                            window.location = 'admin-account.php'

                        }
                        else{
                            alert(response);
                        }
                    }
                });
            }
        }
    });

    // for editing admin account
    editAdminAcc();
    function editAdminAcc()
    {
        $(document).on('click', '#editAdmin',function(){
            var ID = $(this).attr('data-id');
            // console.log(ID);
            $.ajax(
                {
                    url: 'edit-admin-acc.php',
                    method: 'post',
                    data:{AdminID:ID},
                    dataType: 'JSON',
                    success: function(data)
                    {
                        $('#Up_User_ID').val(data[0]);
                        $('#Up_User_Name').val(data[1]);
                        $('#Up_UserName').val(data[2]);
                        $('#Up_UserEmail').val(data[3]);
                        $('#Up_password1').val(data[4]);
                        $('#update').modal('show');
                    }

                })
        })
    }
    update_record();
    function update_record()
    {
    
    $(document).on('click','#btn_update',function()
    {
        var UpdateID = $('#Up_User_ID').val();
        var UpdateName = $('#Up_User_Name').val();
        var UpdateUserName = $('#Up_UserName').val();
        var UpdateEmail = $('#Up_UserEmail').val();
        var UpdatePass = $('#Up_password1').val();

        if(UpdateID=="" || UpdateName=="" || UpdateUserName=="" || UpdateEmail=="" || UpdatePass=="")
        {
            $('#up-message').html('Please Fill in the Blanks');
            $('#update').modal('show');
        }
        // if($('#modal-form')[0].checkValidity()){
        //     e.preventDefault();
        //     if($("#Up_password1").val() != $("#Up_password2").val()){
        //         $('#up-message').html('Password did not matched');
        //     }
        // }
        else{
                $('#up-message').html('');
                $.ajax(
                    {
                        url: 'edit-admin-acc-function.php',
                        method: 'post',
                        data:{U_ID:UpdateID,U_Name:UpdateName,U_UserName:UpdateUserName,U_Email:UpdateEmail,U_Pass:UpdatePass},
                        success: function(data)
                        {
                            alert(data);
                            // $('#up-message').html(data);
                            $('#update').modal('show');
                            window.location = 'admin-account.php'
                        }
                    })
            }
        

        
    })
}
    // Delete admin account
    delete_record();
    function delete_record()
    {
        $(document).on('click','#deleteAdmin',function()
        {
            var Delete_ID = $(this).attr('data-id1');
            $('#delete').modal('show');

            $(document).on('click','#btn_delete_record',function()
            {
                $.ajax(
                    {
                        url: 'delete-admin.php',
                        method: 'post',
                        data:{Del_ID:Delete_ID},
                        success: function(data)
                        {
                            $('#delete-message').html(data).hide(5000);
                            window.location = 'admin-account.php'
                        }
                    })
            })
        })
    }
    // for adding new student info
    $("#addStudentsBtn").click(function(e){
        if($('#addStudentForm')[0].checkValidity()){
            e.preventDefault();
                $.ajax({
                    url: 'assets/php/admin-action.php',
                    method: 'post',
                    data: $("#addStudentForm").serialize()+'&action=addStudents',
                    success:function(response){
                        $("#addStudentsBtn").val('Add Student');
                        if(response === 'addStudents'){
                            alert('New Students Added');
                            window.location = 'admin-students.php'

                        }
                        else{
                            alert(response);
                        }
                    }
                });
        }
    });
    //for displying student information in a table
    fetchAllStudentsInfo();
    function fetchAllStudentsInfo(){
        $.ajax({
            url: 'assets/php/admin-action.php',
            method : 'post',
            data : {action: 'fetchAllStudentsInfo'},
            success:function(response){
                $('#showStudents').html(response);
                $("#studentsTable").DataTable({
                    order: [0,'desc']
                });
            }
        })
    }

        // for editing student information
        editStudent();
        function editStudent()
        {
            $(document).on('click', '#editStudent',function(){
                var ID = $(this).attr('data-id');
                $.ajax(
                    {
                        url: 'edit-student-info.php',
                        method: 'post',
                        data:{StudID:ID},
                        dataType: 'JSON',
                        success: function(data)
                        {
                            $('#Up_Student_ID').val(data[0]);
                            $('#Up_LRN').val(data[1]);
                            $('#up_stud_fname').val(data[2]);
                            $('#up_stud_lname').val(data[3]);
                            $('#up_stud_mname').val(data[4]);
                            $('#up_stud_suffix').val(data[5]);
                            $('#up_stud_sex').val(data[6]);
                            $('#up_stud_date').val(data[7]);
                            $('#up_stud_add').val(data[8]);
                            $('#up_stud_bplace').val(data[9]);
                            $('#up_stud_status').val(data[10]);
                            $('#up_stud_nat').val(data[11]);
                            $('#up_stud_religion').val(data[12]);
                            $('#up_stud_contact').val(data[13]);
                            $('#up_stud_email').val(data[14]);
                            $('#up_stud_father').val(data[15]);
                            $('#up_stud_fatheroccu').val(data[16]);
                            $('#up_stud_fathernum').val(data[17]);
                            $('#up_stud_mother').val(data[18]);
                            $('#up_stud_motheroccu').val(data[19]);
                            $('#up_stud_mothernum').val(data[20]);
                            $('#up_stud_parentsadd').val(data[21]);
                            $('#up_stud_Guard').val(data[22]);
                            $('#up_stud_guardoccu').val(data[23]);
                            $('#up_stud_guardnum').val(data[24]);
                            $('#up_stud_guardadd').val(data[25]);
                            $('#update-student').modal('show');
                        }
    
                    })
            })
        }

        // update students data

        update_students();
        function update_students()
        {
        
        $(document).on('click','#btn_stud_update',function()
        {
            var UpdateID = $('#Up_Student_ID').val();
            var UpdateLRN = $('#Up_LRN').val();
            var UpdateFName = $('#up_stud_fname').val();
            var UpdateLName = $('#up_stud_lname').val();
            var UpdateMName = $('#up_stud_mname').val();
            var UpdateSuffix = $('#up_stud_suffix').val();
            var UpdateSex = $('#up_stud_sex').val();
            var UpdateBDate = $('#up_stud_date').val();
            var UpdateAddress = $('#up_stud_add').val();
            var UpdateBPlace = $('#up_stud_bplace').val();
            var UpdateStatus = $('#up_stud_status').val();
            var UpdateNat = $('#up_stud_nat').val();
            var UpdateReligion = $('#up_stud_religion').val();
            var UpdateCon = $('#up_stud_contact').val();
            var UpdateEmail = $('#up_stud_email').val();
            var UpdateFather = $('#up_stud_father').val();
            var UpdateFOccu = $('#up_stud_fatheroccu').val();
            var UpdateFNum = $('#up_stud_fathernum').val();
            var UpdateMother = $('#up_stud_mother').val();
            var UpdateMOccu = $('#up_stud_motheroccu').val();
            var UpdateMNum = $('#up_stud_mothernum').val();
            var UpdatePAdd = $('#up_stud_parentsadd').val();
            var UpdateGuardian = $('#up_stud_Guard').val();
            var UpdateGOccu = $('#up_stud_guardoccu').val();
            var UpdateGNum = $('#up_stud_guardnum').val();
            var UpdateGAdd = $('#up_stud_guardadd').val();
    
            if(UpdateID=="" || UpdateFName=="" || UpdateLName=="")
            {
                $('#up-students-message').html('Please Fill in the Blanks');
                $('#update-student').modal('show');
            }
            else{
                    $('#up-students-message').html('');
                    $.ajax(
                        {
                            url: 'edit-student-info-function.php',
                            method: 'post',
                            data:{UpdateID:UpdateID,UpdateLRN:UpdateLRN,UpdateFName:UpdateFName,UpdateLName:UpdateLName,UpdateMName:UpdateMName, UpdateSuffix:UpdateSuffix,UpdateSex:UpdateSex,UpdateBDate:UpdateBDate,UpdateAddress:UpdateAddress,UpdateBPlace:UpdateBPlace,UpdateStatus:UpdateStatus,UpdateNat:UpdateNat,UpdateReligion:UpdateReligion,UpdateCon:UpdateCon,UpdateEmail:UpdateEmail,UpdateFather:UpdateFather,UpdateFOccu:UpdateFOccu,UpdateFNum:UpdateFNum,UpdateMother:UpdateMother,UpdateMOccu:UpdateMOccu,UpdateMNum:UpdateMNum,UpdatePAdd:UpdatePAdd,UpdateGuardian:UpdateGuardian,UpdateGOccu:UpdateGOccu,UpdateGNum:UpdateGNum,UpdateGAdd:UpdateGAdd},
                            success: function(data)
                            {
                                alert(data);
                                // $('#up-message').html(data);
                                $('#update-student').modal('show');
                                window.location = 'admin-students.php'
                            }
                        })
                }
            
    
            
        })
    }

        // Delete admin account
        delete_student();
        function delete_student()
        {
            $(document).on('click','#deleteStudent',function()
            {
                var Delete_ID = $(this).attr('data-id2');
                $('#delete_student').modal('show');
    
                $(document).on('click','#btn_delete_student',function()
                {
                    $.ajax(
                        {
                            url: 'delete-student.php',
                            method: 'post',
                            data:{Del_ID:Delete_ID},
                            success: function(data)
                            {
                                $('#delete-message').html(data).hide(5000);
                                window.location = 'admin-students.php'
                            }
                        })
                })
            })
        }

    // for adding new teachers info
    $("#addTeacherBtn").click(function(e){
        if($('#addTeacherForm')[0].checkValidity()){
            e.preventDefault();
                $.ajax({
                    url: 'assets/php/admin-action.php',
                    method: 'post',
                    data: $("#addTeacherForm").serialize()+'&action=addTeacher',
                    success:function(response){
                        $("#addTeacherBtn").val('Add Teacher');
                        if(response === 'addTeacher'){
                            alert('New Teacher Added');
                            window.location = 'admin-faculty.php'

                        }
                        else{
                            alert(response);
                        }
                    }
                });
        }
    });
    fetchAllTeachersInfo();
    function fetchAllTeachersInfo(){
        $.ajax({
            url: 'assets/php/admin-action.php',
            method : 'post',
            data : {action: 'fetchAllTeachersInfo'},
            success:function(response){
                $('#showTeachers').html(response);
                $("#teachersTable").DataTable({
                    order: [0,'desc']
                });
            }
        })
    }

    // edit teachers
    editTeachers();
    function editTeachers()
    {
        $(document).on('click', '#editTeachers',function(){
            var ID = $(this).attr('data-id');
            $.ajax(
                {
                    url: 'edit-teacher-info.php',
                    method: 'post',
                    data:{TeachID:ID},
                    dataType: 'JSON',
                    success: function(data)
                    {
                        $('#Up_Teacher_ID').val(data[0]);
                        $('#up_teach_fname').val(data[1]);
                        $('#up_teach_lname').val(data[2]);
                        $('#up_teach_mname').val(data[3]);
                        $('#up_teach_suffix').val(data[4]);
                        $('#up_teach_sex').val(data[5]);
                        $('#up_teach_status').val(data[6]);
                        $('#up_teach_date').val(data[7]);
                        $('#up_teach_add').val(data[8]);
                        $('#up_teach_contact').val(data[9]);
                        $('#up_teach_email').val(data[10]);
                        $('#up_teach_spec').val(data[11]);
                        $('#up_teach_Empstatus').val(data[12]);
                        $('#update-teacher').modal('show');
                    }

                })
        })
    }

    // update teachers data

           update_teachers();
           function update_teachers()
           {
           
           $(document).on('click','#btn_teach_update',function()
           {
               var UpdateID = $('#Up_Teacher_ID').val();
               var UpdateFName = $('#up_teach_fname').val();
               var UpdateLName = $('#up_teach_lname').val();
               var UpdateMName = $('#up_teach_mname').val();
               var UpdateSuffix = $('#up_teach_suffix').val();
               var UpdateSex = $('#up_teach_sex').val();
               var UpdateStatus = $('#up_teach_status').val();
               var UpdateBDate = $('#up_teach_date').val();
               var UpdateAddress = $('#up_teach_add').val();
               var UpdateCon = $('#up_teach_contact').val();
               var UpdateEmail = $('#up_teach_email').val();
               var UpdateSpec = $('#up_teach_spec').val();
               var UpdateEmpStat = $('#up_teach_Empstatus').val();
       
               if(UpdateID=="" || UpdateFName=="" || UpdateLName=="")
               {
                   $('#up-message').html('Please Fill in the Blanks');
                   $('#update-teacher').modal('show');
               }
               else{
                       $('#up-message').html('');
                       $.ajax(
                           {
                               url: 'edit-teacher-info-function.php',
                               method: 'post',
                               data:{UpdateID:UpdateID,UpdateFName:UpdateFName,UpdateLName:UpdateLName,UpdateMName:UpdateMName,UpdateSuffix:UpdateSuffix,UpdateSex:UpdateSex,UpdateStatus:UpdateStatus,UpdateBDate:UpdateBDate,UpdateAddress:UpdateAddress,UpdateCon:UpdateCon,UpdateEmail:UpdateEmail,UpdateSpec:UpdateSpec,UpdateEmpStat:UpdateEmpStat},
                               success: function(data)
                               {
                                   alert(data);
                                   // $('#up-message').html(data);
                                   $('#update-teacher').modal('show');
                                   window.location = 'admin-faculty.php'
                               }
                           })
                   }
               
       
               
           })
       }

    // Delete teacher information
    delete_teacher();
    function delete_teacher()
    {
        $(document).on('click','#deleteTeachers',function()
        {
            var Delete_ID = $(this).attr('data-id3');
            $('#delete_teacher').modal('show');

            $(document).on('click','#btn_delete_teacher',function()
            {
                $.ajax(
                    {
                        url: 'delete-teacher.php',
                        method: 'post',
                        data:{Del_ID:Delete_ID},
                        success: function(data)
                        {
                            $('#delete-message').html(data).hide(5000);
                            window.location = 'admin-faculty.php'
                        }
                    })
            })
        })
    }

    // insert acad year
    add_ay();
    function add_ay()
{
   $(document).on('click','#btn_acad',function()
   {
        var Year = $('#add_acadyear').val();

        if(Year == "")
        {
            $('#message').html('Please Fill in the Blanks ');
        }
        else
        {
            $.ajax(
                {
                    url : 'add-acad.php',
                    method: 'post',
                    data:{AAcad:Year},
                    success: function(data)
                    {
                        $('#message').html(data);
                        $('#add-ay').modal('show');
                        $('form').trigger('reset');
                        alert('New Acad Year Added');
                        window.location = 'admin-mng-acadyear.php'
                    }
                })
        }
        
   })

   $(document).on('click','#btn_close',function()
   {
       $('form').trigger('reset');
       $('#message').html('');
   })   
}

fetchAllAcad();
    function fetchAllAcad(){
        $.ajax({
            url: 'assets/php/admin-action.php',
            method : 'post',
            data : {action: 'fetchAllAcad'},
            success:function(response){
                $('#showAcad').html(response);
                $("#acadTable").DataTable({
                    order: [0,'desc']
                });
            }
        })
    }
//end of the document
    });


    

