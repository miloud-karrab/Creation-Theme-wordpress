<?php get_header(); ?>
<?php if (have_posts()): ?>
<div class="container">


<div class="row">


<?php while (have_posts()):the_post(); ?>
  <div class="col-sm-4">


  <div class="card" style="width: 18rem;">
  <?php the_post_thumbnail('post-thumbnail',['class'=>'card-img-top','alt'=>'','style'=>'height:auto']) ?>
  <div class="card-body">
    <h5 class="card-title"><?php the_title() ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
    <p class="card-text"><?php the_excerpt()?></p>
    <a href="<?php the_permalink('En voir plus') ?>" class="card-link">voir plus</a>
    <a href="<?php the_permalink() ?>" class="card-link">Another link</a>
  </div>
</div>
</div>
<?php endwhile ?>
</div>
<?php else: ?>
  <h1>pas d'articles</h1>
<?php endif; ?>
</div>
<?php get_footer(); ?>
