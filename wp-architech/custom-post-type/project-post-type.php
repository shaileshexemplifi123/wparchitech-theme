<?php
if (!class_exists('Project_Post_Type')) {
    class Project_Post_Type
    {
        function __construct()
        {
            add_action('init', array(&$this, 'project_init'));
            add_action( 'save_post',  array( &$this,'project_save_meta_box_data' ) );
        }

        function project_init()
        {
            $project_labels = array(
                'name'                     => __('Project', 'wp_architech'),
                'singular_name'         => __('Project', 'wp_architech'),
                'add_new'                 => __('Add Project', 'wp_architech'),
                'add_new_item'             => __('Add New Project', 'wp_architech'),
                'edit_item'             => __('Edit Project', 'wp_architech'),
                'new_item'                 => __('New Project', 'wp_architech'),
                'all_items'             => __('All Project', 'wp_architech'),
                'search_items'             => __('Serach Project', 'wp_architech'),
                'not_found'             => __('No Project found', 'wp_architech'),
                'not_found_in_trash'     => __('No Project found in Trash', 'wp_architech'),
                'parent_item_colon'        => '',
                'menu_name'             => __('Project', 'wp_architech')
            );
            $project_args = array(
                'labels'             => $project_labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array('slug' => 'projets'),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'menu_icon'             => 'dashicons-open-folder',
                'supports'           => array('title', 'editor', 'thumbnail')
            );
            register_post_type('project', $project_args);
            $project_categary_labels = array(
                'name'              => __('Project Categories', 'wp_architech'),
                'singular_name'     => __('Project Categories',  'wp_architech'),
                'search_items'      => __('Search Project Category', 'wp_architech'),
                'all_items'         => __('All Project Categories', 'wp_architech'),
                'parent_item'       => __('Parent Category', 'wp_architech'),
                'parent_item_colon' => __('Parent Category:', 'wp_architech'),
                'edit_item'         => __('Edit Project Category', 'wp_architech'),
                'update_item'       => __('Update Project Category', 'wp_architech'),
                'add_new_item'      => __('Add New Project Category', 'wp_architech'),
                'new_item_name'     => __('New Project Category', 'wp_architech'),
                'menu_name'         => __('Project Categories', 'wp_architech'),
            );
            $project_categary_args = array(
                'hierarchical'      => true,
                'labels'            => $project_categary_labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => array('slug' => 'project-category'),
            );
            register_taxonomy('project_category', array('project'), $project_categary_args);
        }
        function project_save_meta_box_data($post_id){

            if ( ! isset( $_POST['project_meta_box_nonce'] ) ) {
				return;
			}
			if ( ! wp_verify_nonce( $_POST['project_meta_box_nonce'], 'project_meta_box' ) ) {
				return;
			}
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
			if ( isset( $_POST['post_type'] ) && 'project' == $_POST['post_type'] )
			{
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
			} 
			else 
			{
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
			}
        }
    }
    new Project_Post_Type;
}
