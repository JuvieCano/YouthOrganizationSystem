<?php
    include 'global_header.php';
    include 'links.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <?php
            global $upperLinks;
            echo $upperLinks;
        ?>
    <title>Youth Organization System</title> 

</head>
<body>
    <div class="container-fluid">
        <?php
            global $narBar;

            echo $navBar;
        ?>
    </div>
    <main class="content mx-3 d-flex justify-content-center align-items-center" style="height:92vh; overflow-y:hidden; background-image:url('bg1.jpg'); background-size:cover; background-attachment:fixed;">
        
    </main>

    <?php
        global $scriptLinks;
        echo $scriptLinks;
    ?>

</body>
</html>

<script>
    $(document).ready(function(){
        viewLogin();
       $(document).on('click','#btnLogin', ()=>{
          viewLogin();
       })
       $(document).on('click','#btnRegister', ()=>{
            $.ajax({
               url:'register.php',
               method:'GET',
               cache:false,
               data:'',
               success:function(data){
                   $('.content').html(data);
               }
           })
       })
       $(document).on('click','#btn_Register', ()=>{
           api_type = $('#api_type').val();
           fname = $('#reg_fname').val();
           mname = $('#reg_mname').val();
           lname = $('#reg_lname').val();
           address = $('#reg_address').val();
           age = $('#reg_age').val();
           phone = $('#reg_phone').val();
           uname = $('#reg_uname').val();
           pword = $('#reg_pword').val();
           con_pword = $('#reg_con_pword').val();
           question = $('#reg_question').val();
           answer = $('#reg_answer').val();

           if(fname != '' && mname!= '' && lname != '' && address != '' && age != '' && phone != '' && uname != '' && pword != '' && con_pword != '' && question != '' && answer != ''){
                if(con_pword != pword){
                    alert('Password and Confirm Password must be the same.');
                }else{
                    $.ajax({
                        url:'process.php',
                        method:'POST',
                        cache:false,
                        data:{
                            api_type:api_type,
                            fname:fname,
                            mname:mname,
                            lname:lname,
                            address:address,
                            age:age,
                            phone:phone,
                            uname:uname,
                            pword:pword,
                            con_pword:con_pword,
                            question:question,
                            answer:answer,
                        },
                        success:function(data){
                            if(data == '0'){
                                alert("There's an issue on creating of your account.Please try again.");
                            }else if(data == '1'){
                                alert("Account successfully created. The admin will review and send sms for your account updates.Thank you...");
                                window.location = 'index.php';
                            }
                        }
                    })
                }
           }else{
               alert('All fields are required.');
           }         
       })
       $(document).on('click','#btn_Login', ()=>{
            uname = $('#uname').val();
            upass = $('#upass').val();
            usertype = $('#usertype').val();
            api_type = $('#api_type').val();

            if(uname != '' && upass!= '' && usertype!=''){
                    $.ajax({
                    url:'process.php',
                    method:'POST',
                    cache:false,
                    data:{
                        uname:uname,
                        upass:upass,
                        api_type:api_type,
                        usertype:usertype,
                    },
                    success:function(data){
                        //alert(data)
                        if(data == '0'){
                            alert("Invalid username or password.");
                            window.location = 'index.php';
                        }else if(data == 'admin'){
                            window.location = 'admin_dashboard.php';
                        }else if(data == 'member'){
                            window.location = 'member_dashboard.php';
                        }
                    }
                })
            }else{
                alert('Please enter username and password.');
            }
       })

       function viewLogin(){
           $.ajax({
               url:'login.php',
               method:'GET',
               cache:false,
               data:'',
               success:function(data){
                   $('.content').html(data);
               }
           })
       }
    })
</script>