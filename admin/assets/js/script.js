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
                    order: [0,'desc'],
                    destroy: true,
                    paging: false
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
                    order: [0,'desc'],
                    destroy: true,
                    paging: false
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
                    order: [0,'desc'],
                    destroy: true,
                    paging: false
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
            console.log(ID);
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
                    order: [0,'desc'],
                    destroy: true,
                    paging: false
                });
            }
        })
    }

    // edit acad year
    editAcadYear();
    function editAcadYear()
    {
        $(document).on('click', '#editAcad',function(){
            var ID = $(this).attr('data-id');
        //    console.log(ID);
            $.ajax(
                {
                    url: 'edit-acad-info.php',
                    method: 'post',
                    data:{AcadID:ID},
                    dataType: 'JSON',
                    success: function(data)
                    {
                        $('#Up_Acad_ID').val(data[0]);
                        $('#Up_Acad').val(data[1]);
                        $('#updateacad').modal('show');
                    }

                })
        })
    }

    // update acadamic year

    update_acad();
    function update_acad()
    {
    
    $(document).on('click','#btn_update_acad',function()
    {
        var UpdateID = $('#Up_Acad_ID').val();
        var UpdateAcad = $('#Up_Acad').val();

        if(UpdateID=="" || UpdateAcad=="")
        {
            $('#up-message').html('Please Fill in the Blanks');
            $('#updateacad').modal('show');
        }
        else{
                $('#up-message').html('');
                $.ajax(
                    {
                        url: 'edit-acad-info-function.php',
                        method: 'post',
                        data:{UpdateID:UpdateID,UpdateAcad:UpdateAcad},
                        success: function(data)
                        {
                            alert(data);
                            // $('#up-message').html(data);
                            $('#updateacad').modal('show');
                            window.location = 'admin-mng-acadyear.php'
                        }
                    })
            }
        

        
    })
}

    // Delete teacher information
    delete_acad();
    function delete_acad()
    {
        $(document).on('click','#deleteAcad',function()
        {
            var Delete_ID = $(this).attr('data-id4');
            $('#delete_acad').modal('show');

            $(document).on('click','#btn_delete_acad',function()
            {
                $.ajax(
                    {
                        url: 'delete-acad.php',
                        method: 'post',
                        data:{Del_ID:Delete_ID},
                        success: function(data)
                        {
                            $('#delete-message').html(data).hide(5000);
                            window.location = 'admin-mng-acadyear.php'
                        }
                    })
            })
        })
    }

    // insert section 
add_section();
function add_section()
{
   $(document).on('click','#btn_section',function()
   {
        var Section = $('#add_sections').val();
        var Grade_level = $('#add_Gradelevel').val();

        if(Section == "")
        {
            $('#message').html('Please Fill in the Blanks ');
        }
        else
        {
            $.ajax(
                {
                    url : 'add-section.php',
                    method: 'post',
                    data:{Section:Section,Grade_level:Grade_level},
                    success: function(data)
                    {
                        $('#message').html(data);
                        $('#add-section').modal('show');
                        $('form').trigger('reset');
                        alert('New Section Added');
                        window.location = 'admin-mng-sections.php'
                    }
                })
        }
        
   })
}

fetchAllSection();
    function fetchAllSection(){
        $.ajax({
            url: 'assets/php/admin-action.php',
            method : 'post',
            data : {action: 'fetchAllSection'},
            success:function(response){
                $('#showSection').html(response);
                $("#sectionTable").DataTable({
                    order: [0,'desc'],
                    destroy: true,
                    paging: false
                });
            }
        })
    }

     // edit section
     editSection();
     function editSection()
     {
         $(document).on('click', '#editSection',function(){
             var ID = $(this).attr('data-id');
         //    console.log(ID);
             $.ajax(
                 {
                     url: 'edit-section-info.php',
                     method: 'post',
                     data:{SectionID:ID},
                     dataType: 'JSON',
                     success: function(data)
                     {
                         $('#Up_Section_ID').val(data[0]);
                         $('#up_sections').val(data[1]);
                         $('#up_Gradelevel').val(data[2]);
                         $('#updatesection').modal('show');
                     }
 
                 })
         })
     }

     // update sections

    update_section();
    function update_section()
    {
    
    $(document).on('click','#btn_update_section',function()
    {
        var UpdateID = $('#Up_Section_ID').val();
        var UpdateSect = $('#up_sections').val();
        var UpdateGL = $('#up_Gradelevel').val();

        if(UpdateID=="" || UpdateSect=="")
        {
            $('#up-message').html('Please Fill in the Blanks');
            $('#updatesection').modal('show');
        }
        else{
                $('#up-message').html('');
                $.ajax(
                    {
                        url: 'edit-section-info-function.php',
                        method: 'post',
                        data:{UpdateID:UpdateID,UpdateSect:UpdateSect,UpdateGL:UpdateGL},
                        success: function(data)
                        {
                            alert(data);
                            // $('#up-message').html(data);
                            $('#updatesection').modal('show');
                            window.location = 'admin-mng-sections.php'
                        }
                    })
            }
        

        
    })
}

    // insert subject 
    add_subject();
    function add_subject()
    {
       $(document).on('click','#btn_subjects',function()
       {
            var subject = $('#add_subject').val();
            var subject_desc = $('#add_subject_desc').val();
            var term = $('#add_term').val();
            var Grade_level = $('#add_Gradelevel').val();
    
            if(subject == "", subject_desc == "")
            {
                $('#message').html('Please Fill in the Blanks ');
            }
            else
            {
                $.ajax(
                    {
                        url : 'add-subjects.php',
                        method: 'post',
                        data:{subject:subject,subject_desc:subject_desc,term:term,Grade_level:Grade_level},
                        success: function(data)
                        {
                            $('#message').html(data);
                            $('#add-subjects').modal('show');
                            $('form').trigger('reset');
                            alert('New Subject Added');
                            window.location = 'admin-mng-subjects.php'
                        }
                    })
            }
            
       })
    }

    fetchAllSubjects();
    function fetchAllSubjects(){
        $.ajax({
            url: 'assets/php/admin-action.php',
            method : 'post',
            data : {action: 'fetchAllSubjects'},
            success:function(response){
                $('#showSubjects').html(response);
                $("#subjectTable").DataTable({
                    order: [0,'desc'],
                    destroy: true,
                    paging: true
                });
            }
        })
    }

    // get the student code and student name
    enrollStudent();
    function enrollStudent()
    {
        $(document).on('click', '#enrollStudent',function(){
            var ID = $(this).attr('data-id3');
        //    console.log(ID);
            $.ajax(
                {
                    url: 'enroll-student.php',
                    method: 'post',
                    data:{StudID:ID},
                    dataType: 'JSON',
                    success: function(data)
                    {
                        $('#add_code').val(data[0]);
                        $('#add_name').val(data[1]);
                        $('#enrollment').modal('show');
                    }

                })
        })
    }

    // enroll students
    add_enroll();
    function add_enroll()
    {
       $(document).on('click','#enroll',function()
       {
            var Student_Code = $('#add_code').val();
            var Student_Stat = $('#add_stat').val();
            var Student_GLevel = $('#add_Gradelevel').val();
            var Student_AcadYear = $('#add_year').val();
            
                $.ajax(
                    {
                        url : 'add-enrollment.php',
                        method: 'post',
                        data:{Student_Code:Student_Code,Student_Stat:Student_Stat,Student_GLevel:Student_GLevel,Student_AcadYear:Student_AcadYear},
                        success: function(data)
                        {
                            alert(data);
                            $('#enrollment').modal('show');
                            $('form').trigger('reset');
                            
                            window.location = 'admin-students.php'
                        }
                    })
            
            
       })
    }

        //display enrollment
        display_enrollment();
        function display_enrollment()
        {
           $(document).on('click','#enrollStudent',function()
           {
            var ID = $(this).attr('data-id3');
            $.ajax({
                url: 'assets/php/admin-action.php',
                method : 'post',
                data : {StudentID:ID, action: 'fetchEnrolled'},
                success:function(response){
                    $('#enrollment').modal('show');
                    $('#showEnrollment').html(response);
                    $("#enrollmentTable").DataTable({
                        order: [0,'desc'],
                        destroy: true,
                        paging: false
                    });
                }
            })
                
           })
        }

    // display enrolled subjects
    enrolledSubs();
    function enrolledSubs()
    {
        $(document).on('click', '#assignedSubject',function(){
            var ID = $(this).attr('data-id2');
        //    console.log(ID);
            $.ajax(
                {
                    url: 'ass-subs.php',
                    method: 'post',
                    data:{AssSub:ID},
                    dataType: 'JSON',
                    success: function(data)
                    {
                        $('#enrollmentID').val(data[0]);
                        $('#stud_code').val(data[1]);
                        $('#stud_name').val(data[2]);
                        $('#modal_subjects').modal('show');
                        
                    }

                })
        })
    }

     //display assigned subjects to students
     display_assSub();
     function display_assSub()
     {
        $(document).on('click','#assignedSubject',function()
        {
         var ID = $(this).attr('data-id2');
         $.ajax({
             url: 'assets/php/admin-action.php',
             method : 'post',
             data : {EnID:ID, action: 'fetchAssSub'},
             success:function(response){
                 $('#modal_subjects').modal('show');
                 $('#showStudSub').html(response);
                 $("#assSubTable").DataTable({
                     order: [0,'desc'],
                     destroy: true,
                     paging: false
                 });
             }
         })
             
        })
     }

    // assign students subs
    subs();
    function subs()
    {
        $('#check_subs').multiselect({
            nonSelectedText: "Select Subject",
            enableFilter: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '200px',
        })
        
        $(document).on('click', '#assSubs',function(event){
            event.preventDefault();

            var en_ID = $('#enrollmentID').val();
            var subs = $('#check_subs').val();
        
            $.ajax({
                url: 'assign-subjects.php',
                method : 'post',
                data : {EnID:en_ID, Subs: subs},
                success:function(response){
                    $('#check_subs option:selected').each(function(){
                        $(this).prop('selected',false)
                    })
                    $('#check_subs').multiselect('refresh')
                    
                    alert(response)
                    window.location = 'admin-students.php'
                }
            })
            
        })
    }

    // get teachers code
    get_t_code();
    function get_t_code()
    {
        $(document).on('click', '#teachSubs',function(){
            var ID = $(this).attr('data-id1');
            $('#t_code_ass').val(ID);
        })
    }
     //display assigned subjects to teachers
     display_assSub_teach();
     function display_assSub_teach()
     {
        $(document).on('click','#teachSubs',function()
        {
         var ID = $(this).attr('data-id1');
         $.ajax({
             url: 'assets/php/admin-action.php',
             method : 'post',
             data : {T_ID:ID, action: 'fetchTeachSubs'},
             success:function(response){
                 $('#modal_subject_teacher').modal('show');
                 $('#showTeachSub').html(response);
                 $("#assTeachSubTable").DataTable({
                     order: [0,'desc'],
                     destroy: true,
                     paging: false
                 });
             }
         })
             
        })
     }

      // assign teachers subs
    teachsubs();
    function teachsubs()
    {
        $('#check_teach_subs').multiselect({
            nonSelectedText: "Select Subject",
            enableFilter: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '200px',
        })
        
        $(document).on('click', '#ass_t_Subs',function(event){
            event.preventDefault();

            var t_IDD = $('#t_code_ass').val();
            var tsubs = $('#check_teach_subs').val();
        
            $.ajax({
                url: 'ass-teach-subs.php',
                method : 'post',
                data : {t_IDD:t_IDD, tsubs: tsubs},
                success:function(response){
                    $('#check_teach_subs option:selected').each(function(){
                        $(this).prop('selected',false)
                    })
                    $('#check_teach_subs').multiselect('refresh')
                    
                    alert(response)
                    window.location = 'admin-faculty.php'
                }
            })
            
        })
    }

        // get subjects code
        get_s_code();
        function get_s_code()
        {
            $(document).on('click', '#students_ass',function(){
                var ID = $(this).attr('data-id4');
                $('#subs_id').val(ID);
                $('#modal_students_ass_subs').modal('show');
            })
        }
//end of the document
    });


    

