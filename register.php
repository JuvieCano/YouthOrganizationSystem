<?php
    include 'global_header.php';
    include 'config.php';

    $registrationForm='<form autocomplete="off" class="p-5 mb-5 mt-5" style="background-color:rgb(255, 255, 255); border-radius:5px; padding: 10px; box-shadow: 2px 2px 5px #888888;">
          <h5 class="text-center mb-3">Create Account</h5>
          <div class="d-flex">
                <div class="right ml-2">
                    <input type="hidden"  id="api_type" class="form-control" value="register">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Firstname</label>
                        <input type="text"  class="form-control" id="reg_fname" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Middlename</label>
                        <input type="text"  class="form-control" id="reg_mname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lastname</label>
                        <input type="text"  class="form-control" id="reg_lname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text"  class="form-control" id="reg_address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Age</label>
                        <input type="number"  class="form-control" id="reg_age">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contact No.</label>
                        <input type="text"  class="form-control" id="reg_phone"">
                    </div>
                </div>
                <div class="left ml-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text"  class="form-control" id="reg_uname" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="text"  class="form-control" id="reg_pword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="text"  class="form-control" id="reg_con_pword"">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Secret Question</label>
                        <input type="text"  class="form-control" id="reg_question"">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Secret Answer</label>
                        <input type="text"  class="form-control" id="reg_answer">
                    </div>
                    <input type="button" id="btn_Register" class="btn btn-primary mt-4" value="Register" style="float:right;">
                </div>     
            </div>
    </form>
';

echo $registrationForm;

?>