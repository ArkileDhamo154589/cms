<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <!-- Brand and toggle get grouped for better mobile display -->
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">CMS ADMIN</a>
   </div>
   <!-- Top Menu Items -->
   <ul class="nav navbar-right top-nav">
      <li> <a href="../index.php"> Home Site </a></li>
      <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
         <ul class="dropdown-menu">
            <li>
               <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li>
               <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
               <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
         </ul>
      </li>
   </ul>
   <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
   <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
         <li>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
         </li>
         <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#posts_drop"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="posts_drop" class="collapse">
               <li>
                  <a href="post.php">View all posts</a>
               </li>
               <li>
                  <a href="post.php?source=add_post">Add new post</a>
               </li>
            </ul>
         </li> 
         <li class="">
            <a href="./categorys.php"><i class="fa fa-fw fa-file"></i>categories</a>
         </li>
         <li>
            <a href="./comments.php"><i class="fa fa-fw fa-dashboard"></i> Comments</a>
         </li>
         <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-users"></i>  Users  <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
               <li>
                  <a href="users.php">View ALl Users</a>
               </li>
               <li>
                  <a href="users.php?source=add_user">Add Users</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="profile.php"><i class="fa fa-user"></i> Profile</a>
         </li>
      </ul>
   </div>
   <!-- /.navbar-collapse -->
</nav>

<script>
   // Get all list items inside the side-nav
   const listItems = document.querySelectorAll('.side-nav > li');

   // Add click event listener to each list item
   listItems.forEach((item) => {
      item.addEventListener('click', () => {
         // Toggle the 'active' class on the clicked list item
         item.classList.toggle('active');
      });
   });
</script>
