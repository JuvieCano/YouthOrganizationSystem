<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
       <h5 class="text-center mt-5">
           Masterlist of Members in Organization
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
            $fetch = "Select * from member_profiles";
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
                    <td  class="text-center" width="5%">
                        <a href="#" data-id="'.$row[0].'" data-phone="'.$row[6].'" class="btn_GetMemberToRemove mr-2 text-danger" data-toggle="modal" data-target="#memberRemoveModal"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
              ';
            }  
            echo $output;
        ?>
        
        </table>

        <!-- Modal Remove Member -->
        <div class="modal fade" id="memberRemoveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel" style="font-size:2rem;"><i class="fa fa-question-circle"></i>&nbsp;Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="remove_member_id">
                    <input type="hidden" class="form-control" id="remove_phone">
                    <div class="container">
                        <p>Are you sure you want to remove this person in organization?</p>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_RemoveMember" style="outline:none;" class="btn btn-primary">Yes</button>
                    <button type="button" style="outline:none;" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>
                </div>
            </div>
            </div>
        </div>
</body>
</html>
<script>
 $(document).ready(function(){
     $('.btn_GetMemberToRemove').click(function(e){
        $('#remove_member_id').val(e.currentTarget.attributes['data-id'].value);
        $('#remove_phone').val(e.currentTarget.attributes['data-phone'].value);
     })
     $('#btn_RemoveMember').click(function(e){
       api_type = 'remove_member';
       remove_member_id = $('#remove_member_id').val();
       remove_phone = $('#remove_phone').val();

       $.ajax({
           url:'process.php',
           method:'POST',
                cache:false,
                data:{
                    api_type:api_type,
                    remove_member_id:remove_member_id,
                    remove_phone:remove_phone,
                },
                success: function(data){
                    if(data == '0'){
                        alert('An error occur on removing member in organization.Please try again.')
                    }else if(data == '1'){
                        alert('Member Successfully Removed.')
                        window.location = 'admin_dashboard.php';
                    }
                }
       })

    })
    
 })

</script>