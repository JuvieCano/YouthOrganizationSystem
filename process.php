<?php
    session_start();
    include 'vendor/autoload.php';
    include 'config.php';
    global $conn;

    use Twilio\Rest\Client;


    
    if($_POST['api_type']=='register'){
        $insert = "Insert into member_request values ('', '".$_POST['fname']."', '".$_POST['mname']."', '".$_POST['lname']."', '".$_POST['address']."', '".$_POST['age']."', '".$_POST['phone']."', '".$_POST['uname']."', '".$_POST['pword']."', '".$_POST['con_pword']."', '".$_POST['question']."', '".$_POST['answer']."')";
        $saveRequest = mysqli_query($conn, $insert);

        if(!$saveRequest){
            echo '0';
        }else{
            echo '1';
        }
    }
    else if($_POST['api_type']=='login'){
        $select = "Select * from accounts where username = '".$_POST['uname']."' and password = '".$_POST['upass']."' and usertype = '".$_POST['usertype']."'";
        $selectAccount = mysqli_query($conn, $select);

        if($selectAccount){
          if($rows = mysqli_fetch_array($selectAccount)){
              if($rows['usertype'] == '0'){
                  echo 'admin';
              }else if($rows['usertype'] == '1'){
                echo 'member';
                $_SESSION['user'] = $rows['username'];
              }
          }
          else{
            echo '0';
          }
        }else{
            echo '0';
        }
    }

// Events
    else if($_POST['api_type']=='add_event'){
        $insertEvent = "Insert into tbl_events values ('', '".$_POST['event_name']."', '".$_POST['event_location']."', '".$_POST['event_date']."', '".$_POST['event_time']."')";
        $saveEvent = mysqli_query($conn, $insertEvent);

        if(!$saveEvent){
            echo '0';
        }else{
            echo '1';
        }
    }
    else if($_POST['api_type']=='update_event'){
        $update = "Update tbl_events set Description = '".$_POST['updt_event_name']."', Location = '".$_POST['updt_event_location']."', Date = '".$_POST['updt_event_date']."', Time = '".$_POST['updt_event_time']."' where id = '".$_POST['updt_event_id']."'";
        $updateEvent = mysqli_query($conn, $update);

        if(!$updateEvent){
            echo '0';
        }else{
            echo '1';
        }
    }
    else if($_POST['api_type']=='delete_event'){
        $delete = "Delete from tbl_events where id = '".$_POST['delete_event_id']."'";
        $deleteEvent = mysqli_query($conn, $delete);

        if(!$deleteEvent){
            echo '0';
        }else{
            echo '1';
        }
    }
    
// Meetings

    else if($_POST['api_type']=='add_meeting'){
        $insertMeeting = "Insert into tbl_meetings values ('', '".$_POST['meeting_name']."', '".$_POST['meeting_location']."', '".$_POST['meeting_date']."', '".$_POST['meeting_time']."')";
        $saveMeeting = mysqli_query($conn, $insertMeeting);

        if(!$saveMeeting){
            echo '0';
        }else{
            echo '1';
        }
    }
    else if($_POST['api_type']=='update_meeting'){
        $update = "Update tbl_meetings set Description = '".$_POST['updt_meeting_name']."', Location = '".$_POST['updt_meeting_location']."', Date = '".$_POST['updt_meeting_date']."', Time = '".$_POST['updt_meeting_time']."' where id = '".$_POST['updt_meeting_id']."'";
        $updateMeeting = mysqli_query($conn, $update);

        if(!$updateMeeting){
            echo '0';
        }else{
            echo '1';
        }
    }
    else if($_POST['api_type']=='delete_meeting'){
        $delete = "Delete from tbl_meetings where id = '".$_POST['delete_meeting_id']."'";
        $deleteMeeting = mysqli_query($conn, $delete);

        if(!$deleteMeeting){
            echo '0';
        }else{
            echo '1';
        }
    }

//Request

    else if($_POST['api_type']=='accept_member'){
        $acceptMember = "Insert into member_profiles values ('', '".$_POST['fname']."', '".$_POST['mname']."', '".$_POST['lname']."', '".$_POST['address']."', '".$_POST['age']."', '".$_POST['phone']."', '".$_POST['uname']."', '".$_POST['pword']."', '".$_POST['pword']."', '".$_POST['question']."', '".$_POST['answer']."')";
        $saveMember = mysqli_query($conn, $acceptMember);

        if(!$saveMember){
            echo '0';
        }else{       
            echo '1';
            $account = "Insert into accounts values ('', '".$_POST['uname']."', '".$_POST['pword']."', '1')";
            $saveAccount= mysqli_query($conn, $account);

            $delete = "Delete from member_request where Id = '".$_POST['accept_member_id']."'";
            $deleteRequest = mysqli_query($conn, $delete);

            //  $sender = '++1 612 431 9447';
            //  $receiver = $_POST['phone'];
            //  $msg = Strip_tags("Your request to join in Youth Organization was approved by the Admin. You can now access the website using your following credentials. \n \n Username : ".$_POST['uname']." \n Password : ".$_POST['pword']."");

            // $sid = 'AC807a3d54255a2f98c4639448306b330a'; // Your Account SID from www.twilio.com/console
            // $token = 'f8f550bf246e5aca53ae2e2ba25cd4be';// Your Auth Token from www.twilio.com/console

            // $client = new Client($sid, $token);
            // $message = $client->messages->create(
            // $receiver, // Receiver Number| where to send a text message.
            //     [
            //         'from' => $sender, // Your Twilio number|Sender Number
            //         'body' => $msg // message or body
            //     ]);

        }
    }
    else if($_POST['api_type']=='reject_member'){
        $delete = "Delete from member_request where Id = '".$_POST['reject_member_id']."'";
        $deleteRequest = mysqli_query($conn, $delete);

        if(!$deleteRequest){
            echo '0';
        }else{
             $sender = '++1 612 431 9447';
             $receiver = $_POST['reject_phone'];
             $msg = Strip_tags("Your request to join in Youth Organization was rejected by the Admin.Please create another one and enter the valid details.");

            $sid = 'AC807a3d54255a2f98c4639448306b330a'; // Your Account SID from www.twilio.com/console
            $token = 'f8f550bf246e5aca53ae2e2ba25cd4be';// Your Auth Token from www.twilio.com/console

            $client = new Client($sid, $token);
            $message = $client->messages->create(
            $receiver, // Receiver Number| where to send a text message.
                [
                    'from' => $sender, // Your Twilio number|Sender Number
                    'body' => $msg // message or body
                ]);
            echo '1';
        }
    }

// Members

    else if($_POST['api_type']=='remove_member'){
        $remove = "Delete from member_profiles where id = '".$_POST['remove_member_id']."'";
        $removeMember = mysqli_query($conn, $remove);

        if(!$removeMember){
            echo '0';
        }else{
        //     $sender = '++1 612 431 9447';
        //     $receiver = $_POST['remove_phone'];
        //     $msg = Strip_tags("Your account was remove in Youth Organization System.");

        //    $sid = 'AC807a3d54255a2f98c4639448306b330a'; // Your Account SID from www.twilio.com/console
        //    $token = 'f8f550bf246e5aca53ae2e2ba25cd4be';// Your Auth Token from www.twilio.com/console

        //    $client = new Client($sid, $token);
        //    $message = $client->messages->create(
        //    $receiver, // Receiver Number| where to send a text message.
        //        [
        //            'from' => $sender, // Your Twilio number|Sender Number
        //            'body' => $msg // message or body
        //        ]);
            echo '1';
        }
    }

//Update Account

    else if($_POST['api_type']=='update_account'){
        $update = "Update member_profiles set firstname = '".$_POST['fname']."', middlename = '".$_POST['mname']."', lastname = '".$_POST['lname']."', address = '".$_POST['address']."', age = '".$_POST['age']."', contact = '".$_POST['phone']."', username = '".$_POST['uname']."', password = '".$_POST['pword']."', confirmpass = '".$_POST['con_pword']."', question = '".$_POST['question']."', answer = '".$_POST['answer']."' where Id = '".$_POST['uid']."'";
        $updateMemberAccount = mysqli_query($conn, $update);

        if(!$updateMemberAccount){
            echo '0';
        }else{
            $select = "Select * from accounts where username = '".$_POST['uname']."'";
            $selectAccount = mysqli_query($conn, $select);
            $row = mysqli_fetch_array($selectAccount);

            $member_id = $row['id'];

            $updateAcc = "Update accounts set username = '".$_POST['uname']."', password = '".$_POST['pword']."', usertype = '1' where id = '".$member_id."'";
            $updateAccount = mysqli_query($conn, $updateAcc);
            echo '1';
        }
    }
 
?>