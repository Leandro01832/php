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
             

            // The Loop
            while (have_posts()) { the_post(); ?>

             <h1><?php the_title(); ?></h1>


             <div class="acessorio">
                 <?php the_content(); ?>
             </div>

             <p class="catergories" >
                 Categorias: <?php the_category(', '); ?>
             </p>

             <?php if(has_tag()) { ?>

                <p class="tags">
                    palavras-chave: <?php the_tags(false, ', ') ?>
                </p>

                <?php }

                    if(comments_open() || get_comments_number()){
                        comments_template();
                    }

                 ?>

             <?php } ?>

            


     </div>

   </body>

<?php
get_footer();