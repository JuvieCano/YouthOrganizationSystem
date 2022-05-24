<?php
    include 'global_header.php';


    $formLogin='<form autocomplete="off" class="p-5 mb-5" style="background-color:rgb(255, 255, 255); border-radius:5px; padding: 10px; box-shadow: 2px 2px 5px #888888;">
       <input type="hidden" id="api_type" class="form-control" value="login"> 
       <div class="form-group">
            <h5 class="text-center text-dark mb-4">Login</h5>
            <label for="exampleInputEmail1">Username</label>
            <input type="text"  id="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password"  id="upass" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">UserType</label>
            <select  id="usertype" class="form-control" id="exampleInputPassword" required>
              <option value="">--Select--</option>
              <option value="0">Administator</option>
              <option value="1">Member</option>
            </select>
        </div>
        <a href="#" class="ml-1">Forgot Password?</a>
        <input type="button" id="btn_Login" class="btn btn-primary btn-block mt-3" value="Login">
    </form>
';

echo $formLogin;

?>