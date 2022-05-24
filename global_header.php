<?php
    $navBar='';

    $navBar.='
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand font-weight-bold" href="index.php" style="color:rgb(218, 247, 250);">Youth Organization System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto ">
        <li class="nav-item active ">
          <a class="nav-link text-white" id="btnLogin" href="#" data-toggle="collapse" data-target="#navbarNavDropdown">Login <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#" id="btnRegister" data-toggle="collapse" data-target="#navbarNavDropdown">Register</a>
        </li>
      </ul>
    </div>
  </nav>
    ';

?>