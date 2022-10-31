<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></scri>">

<script type ="text/javascript">

function submitData(action){
    $(document).ready(function(){
            var data = {
                action: action,
                id: $("#id").val(),
                name: $(#adminName).val(),
                username: $(#adminUsername).val(),
                email: $(#adminEmail).val(),
                username: $(#adminUsername).val(),
            };

            if($('#editAdminForm')[0].checkValidity()){
                e.preventDefault();
                if($("#inPassword_1").val() != $("#inPassword_2").val()){
                    $("#passError").text('Password did not matched!');
                }
                else{
                    $("#passError").text('');
                    $.ajax({
                        url: 'function.php',
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
}
</script>        