<?php

/* Assortiment custom post type */
function base_register_product_post_type() {
  $labels = array(
    'name'               => __('Assortiment','kuyt'),
    'singular_name'      => __('Product','kuyt'),
    'add_new'            => __('Nieuw product','kuyt'),
    'add_new_item'       => __('Voeg nieuwe producten toe','kuyt'),
    'edit_item'          => __('Bewerk product','kuyt'),
    'new_item'           => __('Nieuw product','kuyt'),
    'view_item'          => __('Bekijk product','kuyt'),
    'search_items'       => __('Zoek producten','kuyt'),
    'not_found'          => __('Geen producten gevonden','kuyt'),
    'not_found_in_trash' => __('Geen producten gevonden in prullenbak','kuyt'),
    'menu_name'          => __('Assortiment','kuyt')
  );
  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'query_var'           => true,
    'rewrite'             => array('slug' => 'assortiment'),
    'capability_type'     => 'post',
    'has_archive'         => true,
    'hierarchical'        => true,
    'menu_position'       => 5,
    'supports'            => array('title', 'editor', 'thumbnail', 'excerpt')
  );
  register_post_type('base_product', $args);
}


/* Product category taxonomy */
function base_register_assortiment_taxonomy() {
  $labels = array(
    'name'              => __('Categorie&euml;n','kuyt'),
    'singular_name'     => __('Categorie','kuyt'),
    'search_items'      => __('Zoek categorie&euml;n','kuyt'),
    'all_items'         => __('Alle categorie&euml;n','kuyt'),
    'parent_item'       => __('Hoofdcategorie','kuyt'),
    'parent_item_colon' => __('Hoofdcategorie:','kuyt'),
    'edit_item'         => __('Bewerk categorie','kuyt'),
    'update_item'       => __('Werk categorie bij','kuyt'),
    'add_new_item'      => __('Voeg nieuwe categorie toe','kuyt'),
    'new_item_name'     => __('Nieuwe categorie naam','kuyt'),
    'menu_name'         => __('Categorie&euml;n','kuyt')
  );
  $args = array(
    'labels'       		=> $labels,
    'public'            => true,
    'show_ui'      		=> true,
    'show_in_nav_menus'	=> true,
    'show_admin_column'	=> true,
    'hierarchical' 		=> true,
    'query_var'    		=> true,
    'rewrite'      		=> array('slug' => 'product-categorie')
  );
  register_taxonomy('base_product_category', 'base_product', $args);
}

add_action('init', 'base_register_product_post_type');
add_action('init', 'base_register_assortiment_taxonomy');