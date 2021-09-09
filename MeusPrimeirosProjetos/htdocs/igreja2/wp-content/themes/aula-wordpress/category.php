
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

<h1>Matérias</h1>

             <?php
             

            // The Loop
            while (have_posts() ) : the_post(); ?>

            <div class="jumbotron">
             <a href="<?php echo get_permalink(); ?>">
                <?php the_title(); ?>                 
                </a>
                <p>
                	<?php echo wp_trim_words(get_the_content(), 20); ?> 
                </p>

            </div>
            <br/>
                 

            <?php endwhile; ?>

            <div class="paginacao"><?php echo paginate_links(); ?></div>
    	
    <?php
get_footer();