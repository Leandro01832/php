
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


<body>
    
    <div class="container">


                 

    



<div class="content">


<style>
    
    .content {
        background-image: url(https://image.freepik.com/free-photo/christ-crucified-cross_1048-1889.jpg);
    }

</style>


<meta charset="UTF-8">

<div id="conteudo8" class="Conteudo">

    <div>


             <?php


              $args = array( 'posts_per_page' => 4);
 
            // The Query
            $query = new WP_Query( $args );
             

            // The Loop
            while ($query->have_posts() ) : $query->the_post(); ?>

                <div class="row">

                <div class="jumbotron col-xs-6 text-center"> <a href="<?php echo get_permalink(); ?>">
                <?php the_title(); ?>                 
                </a>

                 </div>

                 <div class="col-xs-6" style="min-height: 50px;"> </div>

                 </div>

            <?php endwhile; ?>

            


     </div>



</div>






<style>

    #conteudo8 {
        width: 100%;
        min-height: 1000px;
        height: auto;
        position: relative;
        margin: auto;
        margin-top: 0px;
        background-size: contain;
    }
</style>

    



</div>






</div>



    
    
       
    

   


     </div>




     

   </body>

<?php
get_footer();