<?php
   
   include 'global_header.php';
   include 'links.php';
   include 'config.php';

   global $upperLinks, $scriptLinks, $conn;

   echo $upperLinks;
   echo $scriptLinks;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $upperLinks; ?>
   <title>Youth Organization System</title>
</head>
<body>
   <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <h6 class="navbar-brand text-white font-weight-bold"><i class="fa fa-user"></i>&nbsp;Welcome Admin!</h6>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav ml-auto ">
         <li class="nav-item active ">
            <a class="nav-link text-white" id="btnLogin" href="admin_dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white" href="#" id="btnEvents" data-toggle="collapse" data-target="#navbarNavDropdown">Events</a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white" href="#" id="btnMeetings" data-toggle="collapse" data-target="#navbarNavDropdown">Meetings</a>
         </li>
         <li class="nav-item">
            <p class="badge text-warning" style="position:absolute; left:88%; font-size:15px;">
                 <?php
                     global $conn;
                     $count = "Select COUNT(Id) as count from member_request";
                     $countRequest = mysqli_query($conn, $count);
                     
                     while ($rowCount = mysqli_fetch_array($countRequest)){
                        echo $rowCount['count'];
                     }
                 ?>
            </p>
            <a class="nav-link text-white" href="#" id="btnRequest" data-toggle="collapse" data-target="#navbarNavDropdown">Request</a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white" href="#" id="btnMembers" data-toggle="collapse" data-target="#navbarNavDropdown">Members</a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white" href="index.php">Logout</a>
         </li>
         </ul>
      </div>
   </nav>
   </div>

   <main class="mx-3">
      <div class="mx-3" id="content">
         <p class="mt-5 mx-2 text-danger font-weight-bold">
            Upcoming Events
         </p>
         <p class="text-danger font-weight-bold" style="position:absolute; top:15.5%; left:75%;">
           Total No. of members in Organization :
                <?php
                     global $conn;
                     $count = "Select COUNT(Id) as count from member_profiles";
                     $countRequest = mysqli_query($conn, $count);
                     
                     while ($rowCount = mysqli_fetch_array($countRequest)){
                        echo '<span class="text-primary">'.$rowCount["count"].'</span>';
                     }
                 ?>
         </p>
         <table class="px-3 table table-striped table-bordered">
         <thead>
            <tr>
               <th class="text-center" scope="col">Event Id</th>
               <th class="text-center" scope="col">Event Name</th>
               <th class="text-center" scope="col">Location</th>
               <th class="text-center" scope="col">Date</th>
               <th class="text-center" scope="col">Time</th>
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
                  </tr>
               </tbody>
               ';
               }  
               echo $output;
         ?>
         </table>

         <p class="mt-5 mx-2 text-danger font-weight-bold">
            Upcoming Meetings
         </p>
         <table class="px-3 table table-striped table-bordered">
         <thead>
            <tr>
               <th class="text-center" scope="col" width="17.8%">Meeting Id</th>
               <th class="text-center" scope="col">Event Name</th>
               <th class="text-center" scope="col">Location</th>
               <th class="text-center" scope="col">Date</th>
               <th class="text-center" scope="col">Time</th>
            </tr>
         </thead>
            <?php
               global $conn;
               $output='';
               $fetch = "Select * from tbl_meetings";
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
                  </tr>
               </tbody>
               ';
               }  
               echo $output;
         ?>
         </table>
      </div>
      
   </main>
   <?php $scriptLinks; ?>
</body>
</html>

<script>
   $(document).ready(function(){
      $('#btnEvents').click(function(){
         $.ajax({
              url:'events.php',
              method:'GET',
              cache:false,
              success:function(data){
                 $('#content').html(data);
              }
          })
      })
      $('#btnMeetings').click(function(){
         $.ajax({
              url:'meetings.php',
              method:'GET',
              cache:false,
              success:function(data){
                 $('#content').html(data);
              }
          })
      })
      $('#btnRequest').click(function(){
         $.ajax({
              url:'request.php',
              method:'GET',
              cache:false,
              success:function(data){
                 $('#content').html(data);
              }
          })
      })
      $('#btnMembers').click(function(){
         $.ajax({
              url:'members.php',
              method:'GET',
              cache:false,
              success:function(data){
                 $('#content').html(data);
              }
          })
      })

      $(document).on('click', '#btn_SaveEvent',function(){
         api_type = $('#api_type').val();
         event_name = $('#event_name').val();
         event_location = $('#event_location').val();
         event_date = $('#event_date').val();
         event_time = $('#event_time').val();

         $.ajax({
              url:'process.php',
              method:'POST',
              cache:false,
              data:{
                  api_type:api_type,
                  event_name:event_name,
                  event_location:event_location,
                  event_date:event_date,
                  event_time:event_time
              },
              success:function(data){
                  if(data == '0'){
                     alert('An error occur on creating event.Please try again.')
                  }else if(data == '1'){
                     alert('Event Successfully Saved.')
                     window.location = 'admin_dashboard.php';
                  }
              }
          })
      })
      $(document).on('click', '#btn_SaveMeeting',function(){
         api_type = $('#api_type').val();
         meeting_name = $('#meeting_name').val();
         meeting_location = $('#meeting_location').val();
         meeting_date = $('#meeting_date').val();
         meeting_time = $('#meeting_time').val();

         $.ajax({
              url:'process.php',
              method:'POST',
              cache:false,
              data:{
                  api_type:api_type,
                  meeting_name:meeting_name,
                  meeting_location:meeting_location,
                  meeting_date:meeting_date,
                  meeting_time:meeting_time
              },
              success:function(data){
                  if(data == '0'){
                     alert('An error occur on creating meeting.Please try again.')
                  }else if(data == '1'){
                     alert('Meeting Successfully Saved.')
                     window.location = 'admin_dashboard.php';
                  }
              }
          })
      })
   })
</script>