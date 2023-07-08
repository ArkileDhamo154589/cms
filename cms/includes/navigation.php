<?php 
   include "includes/db.php";
   include "includes/functions.php";
   ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="container">
   <!-- Brand and toggle get grouped for better mobile display -->
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Start Bootstrap</a>
   </div>
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
  
      
         <li>
             <a href="index.php"><?php if($_SERVER['PHP_SELF'] === '/index.php')echo 'class="active"'; ?>Home </a>
         </li>
         <li>
             <a href="admin">Posts</a>
         </li>
         <li>
             <a href="#">About us</a>
         </li>
         </ul>
         </div>
      <!-- /.navbar-collapse -->
   </div>
   <!-- /.container -->
</nav>