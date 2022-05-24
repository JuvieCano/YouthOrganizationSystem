<?php
    session_start();
    include 'config.php';
    global $conn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
      <main class="mt-5 mx-3 d-flex">
          <div class="personal-info">
                <h5 class="ml-5 text-dark">
                    Personal Information
                </h5>
                <div class="card ml-5" style="width: 40rem;">
                    <div class="card-body">
                        <?php
                            $output ='';
                            $select = "Select * from member_profiles where username = '".$_SESSION['user']."'";
                            $selectUser = mysqli_query($conn, $select);
                            $row = mysqli_fetch_array($selectUser);

                            $output.='
                                    <form>
                                        <input type="hidden" class="form-control" id="api_type" value="add_event">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Firstname</label>
                                            <input type="text" disabled class="form-control" value="'.$row[1].'" id="event_name" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Middlename</label>
                                            <input type="text" disabled class="form-control" id="event_location" value="'.$row[2].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Lastname</label>
                                            <input type="text" disabled class="form-control" id="event_date" value="'.$row[3].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Address</label>
                                            <input type="text" disabled class="form-control" id="event_date" value="'.$row[4].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Age</label>
                                            <input type="number" disabled class="form-control" id="event_date" value="'.$row[5].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Contact No.</label>
                                            <input type="text" disabled class="form-control" id="event_date" value="'.$row[6].'">
                                        </div>
                                </form>
                            ';

                            echo $output;

                        ?>
                            
                    </div>
                </div>
          </div>
          <div class="account-info">
                <h5 class="ml-5 text-dark">
                    Account Information
                </h5>
                <div class="card ml-5" style="width: 40rem;">
                    <div class="card-body">
                    <?php
                            $output ='';
                            $select = "Select * from member_profiles where username = '".$_SESSION['user']."'";
                            $selectUser = mysqli_query($conn, $select);
                            $row = mysqli_fetch_array($selectUser);

                            $output.='
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" disabled class="form-control" value="'.$row[7].'" id="event_name" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" disabled class="form-control" id="event_location" value="'.$row[8].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input type="password" disabled class="form-control" id="event_date" value="'.$row[9].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Secret Question</label>
                                            <input type="text" disabled class="form-control" id="event_date" value="'.$row[10].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Secret Answer</label>
                                            <input type="text" disabled class="form-control" id="event_date" value="'.$row[11].'">
                                        </div>
                                </form>
                            ';

                            echo $output;

                        ?>
                    </div>
                </div>
                <a href="#" id="btn_Edit" data-toggle="modal" data-target="#accountModal" style="float: right;"><i class="fa fa-edit mt-4 mr-2"></i>Edit Account Info</a>
          </div>
      </main>
        <!-- Modal Update Account-->
            <div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-pencil"></i>&nbsp;Update Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex">
                <?php
                            $output ='';
                            $select = "Select * from member_profiles where username = '".$_SESSION['user']."'";
                            $selectUser = mysqli_query($conn, $select);
                            $row = mysqli_fetch_array($selectUser);

                            $output.='
                                    <input type="hidden"  class="form-control" value="'.$row[0].'" id="udpt_account_id" aria-describedby="emailHelp">
                                    <div class="right ml-2">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Firstname</label>
                                            <input type="text"  class="form-control" value="'.$row[1].'" id="updt_fname" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Middlename</label>
                                            <input type="text"  class="form-control" id="updt_mname" value="'.$row[2].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Lastname</label>
                                            <input type="text"  class="form-control" id="updt_lname" value="'.$row[3].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Address</label>
                                            <input type="text"  class="form-control" id="updt_address" value="'.$row[4].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Age</label>
                                            <input type="text"  class="form-control" id="updt_age" value="'.$row[5].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Contact No.</label>
                                            <input type="text"  class="form-control" id="updt_phone" value="'.$row[6].'">
                                        </div>
                                    </div>
                                    <div class="left ml-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text"  class="form-control" value="'.$row[7].'" id="updt_uname" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="text"  class="form-control" id="updt_pword" value="'.$row[8].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input type="text"  class="form-control" id="updt_con_pword" value="'.$row[9].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Secret Question</label>
                                            <input type="text"  class="form-control" id="updt_question" value="'.$row[10].'">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Secret Answer</label>
                                            <input type="text"  class="form-control" id="updt_answer" value="'.$row[11].'">
                                        </div>
                                    </div>
                            ';

                            echo $output;

                        ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_SaveAccount">Save changes</button>
                </div>
                </div>
            </div>
        </div>
</body>
</html>
<script>
 $(document).ready(function(){
    $('#btn_SaveAccount').click(function(){
        api_type = 'update_account';
        uid = $('#udpt_account_id').val();
        fname = $('#updt_fname').val();
        mname = $('#updt_mname').val();
        lname = $('#updt_lname').val();
        address = $('#updt_address').val();
        age = $('#updt_age').val();
        phone = $('#updt_phone').val();
        uname = $('#updt_uname').val();
        pword = $('#updt_pword').val();
        con_pword = $('#updt_con_pword').val();
        question = $('#updt_question').val();
        answer = $('#updt_answer').val();

        if(fname !='' && mname !='' && lname !='' && address !='' && age !='' && phone !='' && uname !='' && pword !='' && con_pword !='' && question !='' && answer !=''){
            if(con_pword != pword){
                alert('Password and Confirm Password are not the same.');
            }else{
                $.ajax({
                    url:'process.php',
                    method:'POST',
                    cache:false,
                    data:{
                        api_type:api_type,
                        uid:uid,
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
                    success: function(data){
                        //alert(data)
                        if(data == '0'){
                            alert("There's an issue on updating your account.Please try again.");
                        }else if(data == '1'){
                            alert("Account successfully Updated.");
                            window.location = 'member_dashboard.php';
                        }
                    }
                })
            }
        }else{
            alert('All fields are required.');
        }

    })
 })

</script>