<?php
/*
Template Name: connexion
*/
$error=false;
if(!empty($_POST)){
  $d=$_POST;
  if($d['user_pass']!=$d['user_pass2']){
    $error="les 2 mots de pass ne correspond pas";

  }else {
    if (!is_email($d['user_email'])) {
      $error="veuillez saisir email valide";
    }else {
    $user=  wp_insert_user( array(
       'user_login'=>$d['user_login'],
       'user_pass'=>$d['user_pass'],
       'user_email'=>$d['user_email']

      ) );

    if (is_wp_error( $user )) {
      $error=$user->get_error_message();
    }else {
         $msg='vous été maintenant inscrire';
         $headers='From:'.get_option( 'admin_email')."/r/n";
         wp_email($d['user_email'],'inscription réussite',$msg,$headers);
         $d= array();
         wp_signon( $user );
         header('location:profil');
    }
    }

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
       <input type="text" name="user_login" id="user_login" value="<?php echo isset($d['user_login'])? $d['user_login']:'' ?>">
       <label for="user_email">Votre Email</label>
       <input type="text" name="user_email" id="user_email" value="<?php echo isset($d['user_email'])? $d['user_email']:'' ?>">
       <label for="user_pass">Votre mot de passe</label>
       <input type="password" name="user_pass" id="user_pass" value="<?php echo isset($d['user_pass'])? $d['user_pass']:'' ?>">
       <label for="user_pass2">Confirmer votre mot de passe</label>
       <input type="password" name="user_pass2" id="user_pass2" value="<?php echo isset($d['user_pass2'])? $d['user_pass2']:'' ?>">
       <input type="checkbox" name="remembre" id="remembre" value="1">
          <label for="remembre">se souvenir de moi</label>
          <input type="submit"value="s'inscrire">
     </form>
  </div>

</div>








<?php get_footer(); ?>
