<?php
/*
Template Name: connexion
*/
$error=false;
if(!empty($_POST)){
  $user=wp_signon( $_POST);
  if(is_wp_error( $user )){
    $error=$user->get_error_message();
  }else {
    header('location:profil');
  }
}else {
  $user=wp_get_current_user();
  if ($user->ID !=0) {
    header('location:profil');
  }
}

 ?>

<?php get_header(); ?>



<div class="single">
  <div class="post">
     <h1>se connecter</h1>
     <?php if ($error):?>
     <div class="error">
        <?php echo $error; ?>
     </div>
   <?php endif ?>
     <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
       <label for="user_login">Votre Login</label>
       <input type="text" name="user_login" id="user_login" value="">
       <label for="user_password">Votre mot de passe</label>
       <input type="password" name="user_password" id="user_password" value="">
       <input type="checkbox" name="remembre" id="remembre" value="1">
          <label for="remembre">se souvenir de moi</label>
          <input type="submit"value="se connecter">
     </form>
  </div>

</div>








<?php get_footer(); ?>
