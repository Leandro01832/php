

<?php
/**
 * Tema da aula 1 wordpress -- Igreja
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package igreja
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

<?php 
if(have_posts()) : while (have_posts()) : the_post(); 
 ?>


 <?php the_content(); ?>
 <?php endwhile; else: ?>
 <div> 
<h2>
	Nada Encontrado
</h2>
<p>
	Erro 404
</p>
<p>
	Pagina não encontrada.
</p>

 </div>
 <?php endif; ?>

 <?php
get_footer();


