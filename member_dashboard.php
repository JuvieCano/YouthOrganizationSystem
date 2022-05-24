<?php
   session_start();
   include 'global_header.php';
   include 'links.php';
   include 'config.php';

   global $upperLinks, $scriptLinks;

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
      <h6 class="navbar-brand text-white font-weight-bold"><i class="fa fa-male"></i>&nbsp;<?php echo 'Welcome '.$_SESSION['user'].'!';?></h6>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav ml-auto ">
         <li class="nav-item active ">
            <a class="nav-link text-white" id="" href="member_dashboard.php">Dashboard</a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white" href="#" id="btnManageAccount" data-toggle="collapse" data-target="#navbarNavDropdown">Manage Account</a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white" href="index.php" id="btnLogoutMember">Logout</a>
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
    $('#btnManageAccount').click(function(){
        $.ajax({
            url:'manage_account.php',
            method:'GET',
            cache:false,
            success:function(data){
               $('#content').html(data);
            }
        })
    })
 })

</script>