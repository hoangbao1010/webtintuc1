<?php

/*
	
@package sunsettheme
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/

	/* Chuyen gia tu van */
	add_action( 'init', 'sunset_ttdn_custom_post_type' );
	add_filter('manage_partners_posts_columns','sunset_set_ttdn_columns');
	add_action('manage_partners_posts_custom_column','sunset_ttdn_custom_column',10,2);
	function sunset_ttdn_custom_post_type() {
		$labels = array(
			'name' 				=> 'Thông tin DN',
			'singular_name' 	=> 'Thông tin DN',
			'menu_name'			=> 'Thông tin DN',
			'name_admin_bar'	=> 'Thông tin DN'
		);

		$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'menu_position'		=> 26,
			'menu_icon'			=> 'dashicons-businessman',
			'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' ),
			'public'            => true
		);

		register_post_type( 'partners', $args );

	}

	function sunset_set_ttdn_columns($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}

	function sunset_ttdn_custom_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}
	?>
	<?php

	/* Goc chia se */
	add_action( 'init', 'share_custom_post_type' );
	add_filter('manage_share_posts_columns','share_column_review');
	add_action('manage_share_posts_custom_column','share_column',10,2);
	function share_custom_post_type() {
		$labels = array(
			'name' 				=> 'Góc chia sẻ',
			'singular_name' 	=> 'Góc chia sẻ',
			'menu_name'			=> 'Góc chia sẻ',
			'name_admin_bar'	=> 'Góc chia sẻ'
		);

		$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'public' => true, // required to display permalink under title post
			'menu_position'		=> 26,
			'menu_icon'			=> 'dashicons-groups',
			'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' ),
		);

		register_post_type( 'share', $args );

	}

	function share_column_review($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}

	function share_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}
	
	/* Diem ban */
	add_action( 'init', 'sale_point_custom_post_type' );
	add_filter('manage_sale_point_posts_columns','sale_point_column_review');
	add_action('manage_sale_point_posts_custom_column','sale_point_column',10,2);
	function sale_point_custom_post_type() {
		$labels = array(
			'name' 				=> 'Điểm bán',
			'singular_name' 	=> 'Điểm bán',
			'menu_name'			=> 'Điểm bán',
			'name_admin_bar'	=> 'Điểm bán'
		);

		$args = array(
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_in_menu'		=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'public' => true, // required to display permalink under title post
			'menu_position'		=> 26,
			'menu_icon'			=> 'dashicons-location',
			'supports'			=> array( 'title', 'thumbnail' , 'excerpt' , 'editor' ),
		);

        register_taxonomy('categories_sale_point', 'sale_point', array(
            'label' => __('Chuyên mục điểm bán'),
            'hierarchical' => true,
            'rewrite' => 'slug'
        ));
		register_post_type( 'sale_point', $args );

	}

	function sale_point_column_review($columns){
		$newColumns = array();
		$newColums['title'] = 'Title';
		$newColums['avatar'] = 'Avatar';
		return $newColums;
	}

	function sale_point_column($column,$post_id){
		switch ($column) {
			case 'avatar':
			echo get_the_post_thumbnail();
			break;
		}
	}

