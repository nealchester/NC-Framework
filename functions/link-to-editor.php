<?php 
   if (is_user_logged_in() && current_user_can('activate_plugins')){
      echo'<ul class="navmenu"><li><a href="../wp-admin/nav-menus.php">Setup a menu</a></li></ul>';
   }
?>