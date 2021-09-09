
<?php
/**
 * Tema da aula 1 wordpress -- Restaurante
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>


<body>
    
    <div class="container">


             <?php


              $args = array('post_type' => 'joia', 'posts_per_page' => 6);
 
            // The Query
            $query = new WP_Query( $args );
             

            // The Loop
            while ($query->have_posts() ) : $query->the_post(); ?>

             <a href="<?php echo get_permalink(); ?>">
                <?php the_title(); ?>                 
                </a>

                 <hr/>

                 <div>

                <?php the_field('tipo'); ?> 

                 </div> 

            <?php endwhile; ?>


     </div>

     <div class="jumbotron">


             <?php


              $args = array( 'posts_per_page' => 3);
 
            // The Query
            $query = new WP_Query( $args );
             

            // The Loop
            while ($query->have_posts() ) : $query->the_post(); ?>

             <a href="<?php echo get_permalink(); ?>">
                <?php the_title(); ?>                 
                </a>

                 

            <?php endwhile; ?>

            


     </div>

   </body>

<?php
get_footer();