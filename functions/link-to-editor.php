<?php 
   function link_to_menu_editor(){
      if (is_user_logged_in() && current_user_can('activate_plugins')){
         echo'<ul class="navmenu"><li><a href="../wp-admin/nav-menus.php">'.__('Setup a menu','nc-framework').'</a></li></ul>';
      }
   }
?>