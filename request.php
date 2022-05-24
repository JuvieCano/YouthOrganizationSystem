<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
       <h5 class="text-center mt-5">
           List of Member Request
       </h5>
        <table class="px-3 mt-4 table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center" scope="col">Member Id</th>
                <th class="text-center" scope="col">First Name</th>
                <th class="text-center" scope="col">Middle Name</th>
                <th class="text-center" scope="col">Last Name</th>
                <th class="text-center" scope="col">Address</th>
                <th class="text-center" scope="col">Age</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <?php
            global $conn;
            $output='';
            $fetch = "Select * from member_request";
            $fetchMembers = mysqli_query($conn, $fetch);
            
            while($row = mysqli_fetch_array($fetchMembers)){
                $output .='
                <tbody>
                <tr>
                    <th  class="text-center" scope="row">'.$row[0].'</th>
                    <td  class="text-center">'.$row[1].'</td>
                    <td  class="text-center">'.$row[2].'</td>
                    <td  class="text-center">'.$row[3].'</td>
                    <td  class="text-center">'.$row[4].'</td>
                    <td  class="text-center">'.$row[5].'</td>
                    <td  class="text-center" width="6%">
                        <a href="#" data-id="'.$row[0].'" data-fname="'.$row[1].'" data-mname="'.$row[2].'" data-lname="'.$row[3].'" data-address="'.$row[4].'" data-age="'.$row[5].'"  data-phone="'.$row[6].'" data-uname="'.$row[7].'" data-pword="'.$row[8].'" data-question="'.$row[10].'" data-answer="'.$row[11].'"   class="btn_GetMemberToAccept mr-2 text-success" data-toggle="modal" data-target="#memberAcceptModal"><i class="fa fa-check"></i></a>
                        <a href="#" data-id="'.$row[0].'" data-phone="'.$row[6].'" class="btn_GetMemberToReject mr-2 text-danger" data-toggle="modal" data-target="#memberRejectModal"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            </tbody>
              ';
            }  
            echo $output;
        ?>
        
        </table>

        <!-- Modal Accept Member -->
        <div class="modal fade" id="memberAcceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel" style="font-size:2rem;"><i class="fa fa-info-circle"></i>&nbsp;Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="accept_member_id">
                    <input type="hidden" class="form-control" id="fname">
                    <input type="hidden" class="form-control" id="mname">
                    <input type="hidden" class="form-control" id="lname">
                    <input type="hidden" class="form-control" id="address">
                    <input type="hidden" class="form-control" id="age">
                    <input type="hidden" class="form-control" id="phone">
                    <input type="hidden" class="form-control" id="uname">
                    <input type="hidden" class="form-control" id="pword">
                    <input type="hidden" class="form-control" id="question">
                    <input type="hidden" class="form-control" id="answer">

                    <div class="container">
                        <p>Please confirm to accept this request.</p>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_Confirm" style="outline:none;" class="btn btn-primary">Accept</button>
                    <button type="button" style="outline:none;" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                </div>
            </div>
            </div>
        </div>

         <!-- Modal Reject Member -->
         <div class="modal fade" id="memberRejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel" style="font-size:2rem;"><i class="fa fa-info-circle"></i>&nbsp;Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="reject_member_id">
                    <input type="hidden" class="form-control" id="reject_phone">
                    <div class="container">
                         <p>Please confirm to reject this request.</p>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_RejectMember" style="outline:none;" class="btn btn-primary">Reject</button>
                    <button type="button" style="outline:none;" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                </div>
            </div>
            </div>
        </div>
</body>
</html>
<script>
 $(document).ready(function(){
    $('.btn_GetMemberToAccept').click(function(e){
        $('#accept_member_id').val(e.currentTarget.attributes['data-id'].value);
        $('#fname').val(e.currentTarget.attributes['data-fname'].value);
        $('#mname').val(e.currentTarget.attributes['data-mname'].value);
        $('#lname').val(e.currentTarget.attributes['data-lname'].value);
        $('#address').val(e.currentTarget.attributes['data-address'].value);
        $('#age').val(e.currentTarget.attributes['data-age'].value);
        $('#phone').val(e.currentTarget.attributes['data-phone'].value);
        $('#uname').val(e.currentTarget.attributes['data-uname'].value);
        $('#pword').val(e.currentTarget.attributes['data-pword'].value);
        $('#question').val(e.currentTarget.attributes['data-question'].value);
        $('#answer').val(e.currentTarget.attributes['data-answer'].value);
    })
    $('#btn_Confirm').click(function(){
       api_type = 'accept_member';
       accept_member_id = $('#accept_member_id').val();
       fname = $('#fname').val();
       mname = $('#mname').val();
       lname = $('#lname').val();
       address = $('#address').val();
       age = $('#age').val();
       phone = $('#phone').val();
       uname = $('#uname').val();
       pword = $('#pword').val();
       question = $('#question').val();
       answer = $('#answer').val();

       $.ajax({
           url:'process.php',
           method:'POST',
                cache:false,
                data:{
                    api_type:api_type,
                    accept_member_id:accept_member_id,
                    fname:fname,
                    mname:mname,
                    lname:lname,
                    address:address,
                    age:age,
                    phone:phone,
                    uname:uname,
                    pword:pword,
                    question:question,
                    answer:answer,
                },
                success: function(data){
                    if(data == '0'){
                        alert('An error occur on accepting this request.Please try again.')
                    }else if(data == '1'){
                        alert('You have accepted this request.')
                        window.location = 'admin_dashboard.php';
                    }
                }
        })
    })
    $('.btn_GetMemberToReject').click(function(e){
        $('#reject_member_id').val(e.currentTarget.attributes['data-id'].value);
        $('#reject_phone').val(e.currentTarget.attributes['data-phone'].value);
    })
    $('#btn_RejectMember').click(function(){
       api_type = 'reject_member';
       reject_member_id = $('#reject_member_id').val();
       reject_phone = $('#reject_phone').val();

       $.ajax({
           url:'process.php',
           method:'POST',
                cache:false,
                data:{
                    api_type:api_type,
                    reject_member_id:reject_member_id,
                    reject_phone:reject_phone,
                },
                success: function(data){
                    if(data == '0'){
                        alert('An error occur on rejecting this request.Please try again.')
                    }else if(data == '1'){
                        alert('You have rejected this request.')
                        window.location = 'admin_dashboard.php';
                    }
                }
        })
    })
 })

</script>