<?php
/*
Template Name: profil
*/

$user=wp_get_current_user();

if ($user->ID ==0) {
  header('location:login');
}
if (!empty($_POST)) {
  update_user_meta( get_current_user_id(), 'age', $_POST['age'] );
}

 ?>

<?php get_header(); ?>



<div class="single">
  <div class="post">
     <h1>Mes informations</h1>
<form class="" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
  <label for="age">Age</label>
  <input type="text" name="age" value="<?php echo get_user_meta( get_current_user_id(), 'age',true) ?>">
  <input type="submit" name="" value="modifier">
</form>
  </div>

</div>








<?php get_footer(); ?>
