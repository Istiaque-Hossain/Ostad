       <!-- ============================================================== -->
       <!-- Left Sidebar - style you can find in sidebar.scss  -->
       <!-- ============================================================== -->
       <aside class="left-sidebar" data-sidebarbg="skin6">
           <!-- Sidebar scroll-->
           <div class="scroll-sidebar">
               <!-- Sidebar navigation-->
               <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                       <!-- User Profile-->
                       <li class="sidebar-item pt-2">
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                               <i class="far fa-clock" aria-hidden="true"></i>
                               <span class="hide-menu">Dashboard</span>
                           </a>
                       </li>
                       <hr>

                       <?php
                        $u_role = $_SESSION['u_role'];
                        if ($u_role == 1 || $u_role == 2) {

                        ?>
                           <li class="sidebar-item">
                               <a class="sidebar-link waves-effect waves-dark sidebar-link" href="category.php" aria-expanded="false">
                                   <i class="fa fa-table" aria-hidden="true"></i>
                                   <span class="hide-menu">Category</span>
                               </a>
                           </li>

                           <li class="sidebar-item">
                               <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                   <!-- <i class="mdi mdi-av-timer"></i> -->
                                   <i class="fa fa-address-card" aria-hidden="true"></i>
                                   <span class="hide-menu">Posts</span>
                                   <!-- <span class="badge badge-inverse badge-pill ml-auto mr-3 font-medium px-2 py-1">6</span> -->
                               </a>
                               <ul aria-expanded="false" class="collapse  first-level">

                                   <li class="sidebar-item">
                                       <a href="posts.php?do=view" class="sidebar-link">
                                           <i class="mdi mdi-adjust"></i>
                                           <span class="hide-menu"> View all posts </span>
                                       </a>
                                   </li>


                                   <li class="sidebar-item">
                                       <a href="posts.php?do=add" class="sidebar-link">
                                           <i class="mdi mdi-adjust"></i>
                                           <span class="hide-menu"> Add new post </span>
                                       </a>
                                   </li>
                               </ul>
                           </li>
                           <?php if ($u_role == 2) { ?>
                               <li class="sidebar-item">
                                   <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                       <!-- <i class="mdi mdi-av-timer"></i> -->
                                       <i class="fa fa-users" aria-hidden="true"></i>
                                       <span class="hide-menu">Users</span>
                                       <!-- <span class="badge badge-inverse badge-pill ml-auto mr-3 font-medium px-2 py-1">6</span> -->
                                   </a>
                                   <ul aria-expanded="false" class="collapse  first-level">
                                       <li class="sidebar-item">
                                           <a href="users.php?do=view" class="sidebar-link">
                                               <i class="mdi mdi-adjust"></i>
                                               <span class="hide-menu"> View all users </span>
                                           </a>
                                       </li>
                                       <li class="sidebar-item">
                                           <a href="users.php?do=add" class="sidebar-link">
                                               <i class="mdi mdi-adjust"></i>
                                               <span class="hide-menu"> Add new user </span>
                                           </a>
                                       </li>
                                   </ul>
                               </li>
                       <?php
                            }
                        }

                        ?>

                       <li class="sidebar-item">
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="comments.php" aria-expanded="false">
                               <i class="fa fa-comments" aria-hidden="true"></i>
                               <span class="hide-menu">Comments</span>
                           </a>
                       </li>

                       <?php if ($u_role == 2) { ?>
                           <li class="sidebar-item">
                               <a class="sidebar-link waves-effect waves-dark sidebar-link" href="settings.php" aria-expanded="false">
                                   <i class="fa fa-user" aria-hidden="true"></i>
                                   <span class="hide-menu">Settings</span>
                               </a>
                           </li>
                       <?php } ?>

                       <li class="sidebar-item">
                           <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false">
                               <i class="fa fa-user" aria-hidden="true"></i>
                               <span class="hide-menu">Profile</span>
                           </a>
                       </li>


                   </ul>

               </nav>
               <!-- End Sidebar navigation -->
           </div>
           <!-- End Sidebar scroll-->
       </aside>
       <!-- ============================================================== -->
       <!-- End Left Sidebar - style you can find in sidebar.scss  -->
       <!-- ============================================================== -->