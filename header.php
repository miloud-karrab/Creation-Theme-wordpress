<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <?php wp_head() ?>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <a class="navbar-brand" href="#"><?php bloginfo( 'name' ) ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php wp_nav_menu(['theme_location'=>'header',
      'container'=>false,
      'menu_class'=>'navbar-nav mr-auto'
       ])?>
    <!--  <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul> -->
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <div class="social">
         <?php $user=wp_get_current_user(); ?>
         <?php if ($user->ID == 0): ?>
              <a href="<?php bloginfo( 'url' ) ?>/login">se connecter</a>
              <a href="<?php bloginfo( 'url' ) ?>/register">s'inscrire</a>
            <?php else: ?>
              Salut:<?php echo $user->user_login; ?>
                <a href="<?php bloginfo( 'url' ) ?>/profil">Mon Profil</a>
              <a href="<?php bloginfo( 'url' ) ?>/logout">se déconnecter</a>
         <?php endif; ?>


      </div>
    </div>
  </nav>
