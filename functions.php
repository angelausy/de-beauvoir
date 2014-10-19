<?php

add_action('wp_head', 'favicon_link');
function favicon_link() {
    echo '<link rel="shortcut icon" href="/favicon.ico">' . "\n";
}

add_action('wp_enqueue_scripts', 'enqueue_parent_theme_styles');
function enqueue_parent_theme_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}

function simone_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( _x('F jS, Y', 'Public posted on date', 'simone') ) ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date( _x('F jS, Y', 'Public modified on date', 'simone') ) )
	);

	printf( __( 'Written on <span class="posted-on">%2$s</span><span class="mobile-hide">.</span>', 'simone' ),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		),
                sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		)
	);
}