<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <button class="btn btn-primary mt-5 ml-auto" data-toggle="modal" data-target="#eventsModal"><i class="fa fa-plus"></i>&nbsp;Create New Event</button>

        <table class="px-3 mt-3 table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center" scope="col">Event Id</th>
                <th class="text-center" scope="col">Event Name</th>
                <th class="text-center" scope="col">Location</th>
                <th class="text-center" scope="col">Date</th>
                <th class="text-center" scope="col">Time</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <?php
            global $conn;
            $output='';
            $fetch = "Select * from tbl_events";
            $fetchEvents = mysqli_query($conn, $fetch);
            
            while($row = mysqli_fetch_array($fetchEvents)){
                $output .='
                <tbody>
                <tr>
                    <th  class="text-center" scope="row">'.$row[0].'</th>
                    <td  class="text-center">'.$row[1].'</td>
                    <td  class="text-center">'.$row[2].'</td>
                    <td  class="text-center">'.$row[3].'</td>
                    <td  class="text-center">'.$row[4].'</td>
                    <td  class="text-center" width="10%">
                        <a href="#" data-id="'.$row[0].'" data-name="'.$row[1].'" data-loc="'.$row[2].'" data-date="'.$row[3].'" data-time="'.$row[4].'" class="btn_GetEventToUpdate mr-2 text-warning" data-toggle="modal" data-target="#eventsUpdateModal"><i class="fa fa-edit"></i></a>
                        <a href="#" data-id="'.$row[0].'" class="btn_GetEventToDelete mr-2 text-danger" data-toggle="modal" data-target="#eventsDeleteModal"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
              ';
            }  
            echo $output;
        ?>
        
        </table>


        <!-- Modal Add Events-->
            <div class="modal fade" id="eventsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add New Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" class="form-control" id="api_type" value="add_event">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Event Name</label>
                            <input type="text" class="form-control" id="event_name" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Location</label>
                            <input type="text" class="form-control" id="event_location">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Date</label>
                            <input type="date" class="form-control" id="event_date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Time</label>
                            <input type="time" class="form-control" id="event_time">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_SaveEvent">Save event</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal Update Events-->
        <div class="modal fade" id="eventsUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-pencil"></i>&nbsp;Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off">
                        <input type="hidden" class="form-control" id="updt_event_id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Event Name</label>
                            <input type="text" class="form-control" id="updt_event_name" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Location</label>
                            <input type="text" class="form-control" id="updt_event_location">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Date</label>
                            <input type="date" class="form-control" id="updt_event_date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Time</label>
                            <input type="time" class="form-control" id="updt_event_time">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_UpdateEvent">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal Delete Events -->
        <div class="modal fade" id="eventsDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel" style="font-size:2rem;"><i class="fa fa-trash"></i>&nbsp;Delete Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="delete_event_id">
                    <div class="container">
                        <p>Are you sure you want to delete this event?</p>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_DeleteEvent" style="outline:none;" class="btn btn-primary">Yes</button>
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
    $('.btn_GetEventToUpdate').click(function(e){
        $('#updt_event_id').val(e.currentTarget.attributes['data-id'].value);
        $('#updt_event_name').val(e.currentTarget.attributes['data-name'].value);
        $('#updt_event_location').val(e.currentTarget.attributes['data-loc'].value);
        $('#updt_event_date').val(e.currentTarget.attributes['data-date'].value);
        $('#updt_event_time').val(e.currentTarget.attributes['data-time'].value);
    })
    $('.btn_GetEventToDelete').click(function(e){
        $('#delete_event_id').val(e.currentTarget.attributes['data-id'].value);
    })
    $('#btn_UpdateEvent').click(function(){
        api_type = 'update_event';
        updt_event_id = $('#updt_event_id').val();
        updt_event_name = $('#updt_event_name').val();
        updt_event_location = $('#updt_event_location').val();
        updt_event_date = $('#updt_event_date').val();
        updt_event_time = $('#updt_event_time').val();

        if(updt_event_name != '' && updt_event_location != '' && updt_event_date != '' && updt_event_time!=''){
                $.ajax({
                url:'process.php',
                method:'POST',
                cache:false,
                data:{
                    api_type:api_type,
                    updt_event_id:updt_event_id,
                    updt_event_name:updt_event_name,
                    updt_event_location:updt_event_location,
                    updt_event_date:updt_event_date,
                    updt_event_time:updt_event_time
                },
                success: function(data){
                    if(data == '0'){
                        alert('An error occur on updating event.Please try again.')
                    }else if(data == '1'){
                        alert('Event Successfully Updated.')
                        window.location = 'admin_dashboard.php';
                    }
                }
            })
        }else{
            alert('All fields are required.');
        }

        
    })
    $('#btn_DeleteEvent').click(function(e){
       api_type = 'delete_event';
       delete_event_id = $('#delete_event_id').val();

       $.ajax({
           url:'process.php',
           method:'POST',
                cache:false,
                data:{
                    api_type:api_type,
                    delete_event_id:delete_event_id,
                },
                success: function(data){
                    if(data == '0'){
                        alert('An error occur on deleting event.Please try again.')
                    }else if(data == '1'){
                        alert('Event Successfully Deleted.')
                        window.location = 'admin_dashboard.php';
                    }
                }
       })


    })

 })

</script>