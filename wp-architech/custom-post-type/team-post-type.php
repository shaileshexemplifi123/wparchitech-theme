<?php
if (!class_exists('Team_Post_Type')) {
    class Team_Post_Type
    {
        function __construct()
        {
            add_action('init', array(&$this, 'team_init'));
            add_action( 'add_meta_boxes', array( &$this, 'team_meta_box_add' ) ); 
            add_action( 'save_post',  array( &$this,'team_save_meta_box_data' ) );
        }

        function team_init()
        {
            $team_labels = array(
                'name'                     => __('Team', 'wp_architech'),
                'singular_name'         => __('Team', 'wp_architech'),
                'add_new'                 => __('Add Team', 'wp_architech'),
                'add_new_item'             => __('Add New Team', 'wp_architech'),
                'edit_item'             => __('Edit Team', 'wp_architech'),
                'new_item'                 => __('New Team', 'wp_architech'),
                'all_items'             => __('All Team', 'wp_architech'),
                'search_items'             => __('Serach Team', 'wp_architech'),
                'not_found'             => __('No Team found', 'wp_architech'),
                'not_found_in_trash'     => __('No Team found in Trash', 'wp_architech'),
                'parent_item_colon'        => '',
                'menu_name'             => __('Team', 'wp_architech')
            );
            $team_args = array(
                'labels'             => $team_labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array('slug' => 'team'),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'menu_icon'             => 'dashicons-groups',
                'supports'           => array('title', 'editor', 'thumbnail')
            );
            register_post_type('team', $team_args);
            $team_categary_labels = array(
                'name'              => __('Team Categories', 'wp_architech'),
                'singular_name'     => __('Team Categories',  'wp_architech'),
                'search_items'      => __('Search Team Category', 'wp_architech'),
                'all_items'         => __('All Team Categories', 'wp_architech'),
                'parent_item'       => __('Parent Category', 'wp_architech'),
                'parent_item_colon' => __('Parent Category:', 'wp_architech'),
                'edit_item'         => __('Edit Team Category', 'wp_architech'),
                'update_item'       => __('Update Team Category', 'wp_architech'),
                'add_new_item'      => __('Add New Team Category', 'wp_architech'),
                'new_item_name'     => __('New Team Category', 'wp_architech'),
                'menu_name'         => __('Team Categories', 'wp_architech'),
            );
            $team_categary_args = array(
                'hierarchical'      => true,
                'labels'            => $team_categary_labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => array('slug' => 'team-category'),
            );
            register_taxonomy('team_category', array('project'), $team_categary_args);
        }
        function team_meta_box_add(){

            add_meta_box('team_meta_box_add',__( 'Team Information' ),array( &$this,'team_custom_meta_box' ), 'team', 'normal', 'low' );
        
        }
        function team_custom_meta_box($post){
            wp_nonce_field( 'team_meta_box', 'team_meta_box_nonce' );
			$team_designation = get_post_meta( $post->ID, 'team_designation', true );
            $facebook_link = get_post_meta( $post->ID, 'facebook_link', true );
            $twitter_link = get_post_meta( $post->ID, 'twitter_link', true );
            $google_link = get_post_meta( $post->ID, 'google_link', true );
        ?>
        <table cellpadding="10">
			<tr>
				<td>
					<label for="designation_name">
						<?php _e( 'Designation/Position ', 'wp_architech' ); ?>
					</label>
				</td>
				<td><input type="text" id="team_designation" name="team_designation" value="<?php echo esc_attr( $team_designation ) ?>" size="40" /></td>			
			</tr>
            <tr>
				<td>
					<label for="facebook_link">
						<?php _e( 'Facebook Link ', 'wp_architech' ); ?>
					</label>
				</td>
				<td><input type="text" id="facebook_link" name="facebook_link" value="<?php echo esc_attr( $facebook_link ) ?>" size="40" /></td>			
			</tr>
            <tr>
				<td>
					<label for="twitter_link">
						<?php _e( 'Twiter Link', 'wp_architech' ); ?>
					</label>
				</td>
				<td><input type="text" id="twitter_link" name="twitter_link" value="<?php echo esc_attr( $twitter_link ) ?>" size="40" /></td>			
			</tr>
            <tr>
				<td>
					<label for="google_link">
						<?php _e( 'Google Link', 'wp_architech' ); ?>
					</label>
				</td>
				<td><input type="text" id="google_link" name="google_link" value="<?php echo esc_attr( $google_link ) ?>" size="40" /></td>			
			</tr>
		</table>
        
        <?php

        }


        function team_save_meta_box_data($post_id){

            if ( ! isset( $_POST['team_meta_box_nonce'] ) ) {
				return;
			}
			if ( ! wp_verify_nonce( $_POST['team_meta_box_nonce'], 'team_meta_box' ) ) {
				return;
			}
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
			if ( isset( $_POST['post_type'] ) && 'team' == $_POST['post_type'] )
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

                 $team_designation = sanitize_text_field( $_POST['team_designation'] );
                 $facebook_link = sanitize_text_field( $_POST['facebook_link'] );
                 $twitter_link = sanitize_text_field( $_POST['twitter_link'] );
                 $google_link = sanitize_text_field( $_POST['google_link'] );
	
				// Update the meta field in the database.
				update_post_meta( $post_id, 'team_designation', $team_designation );
                update_post_meta( $post_id, 'facebook_link', $facebook_link );
                update_post_meta( $post_id, 'twitter_link', $twitter_link );
                update_post_meta( $post_id, 'google_link', $google_link );
        }
    }
    new Team_Post_Type;
}
