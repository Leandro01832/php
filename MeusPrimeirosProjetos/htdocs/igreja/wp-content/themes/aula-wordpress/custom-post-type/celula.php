<?php
// Register Custom Post Type
function custom_post_type_celula() {

  $labels = array(
    'name'                  => _x( 'celulas', 'celulas', 'text_domain' ),
    'singular_name'         => _x( 'celula', 'celulas', 'text_domain' ),
    'menu_name'             => __( 'celulas', 'text_domain' ),
    'name_admin_bar'        => __( 'celula', 'text_domain' ),
    'archives'              => __( 'Item Arquivos', 'text_domain' ),
    'attributes'            => __( 'Item Atributos', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
    'all_items'             => __( 'todos os Itens', 'text_domain' ),
    'add_new_item'          => __( 'Adicionar Novo Item', 'text_domain' ),
    'add_new'               => __( 'Adicionar Novo', 'text_domain' ),
    'new_item'              => __( 'Novo Item', 'text_domain' ),
    'edit_item'             => __( 'Editar Item', 'text_domain' ),
    'update_item'           => __( 'Atualizar Item', 'text_domain' ),
    'view_item'             => __( 'Visualizar Item', 'text_domain' ),
    'view_items'            => __( 'Visualizar Items', 'text_domain' ),
    'search_items'          => __( 'Pesquisar Item', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list'            => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'celula', 'text_domain' ),
    'description'           => __( 'Descri????o do celula', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
    'taxonomies'            => array( 'category', 'post_tag' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 2,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'menu_icon'             => 'dashicons-superhero-alt',
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'celula', $args );

}
add_action( 'init', 'custom_post_type_celula', 0);