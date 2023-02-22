<?php
/**
 * Listivo Child theme is for customizing wordpress direectory and listing site (www.c4trade.com), made by Remal Mahmud for specially c4trade.com
 * @package Listivo-Child by future WordPress
 * @version 1.0.1
 * @author Remal Mahmud (https://github.com/mahmudremal)
 * @link https://github.com/mahmudremal/c4trade-listivo-directory-listing-project/
 */



defined( 'FWPLISTIVO_DIR_PATH' ) || define( 'FWPLISTIVO_DIR_PATH', untrailingslashit( get_stylesheet_directory() ) );
defined( 'FWPLISTIVO_DIR_URI' ) || define( 'FWPLISTIVO_DIR_URI', untrailingslashit( get_stylesheet_directory_uri() ) );
defined( 'FWPLISTIVO_BUILD_URI' ) || define( 'FWPLISTIVO_BUILD_URI', untrailingslashit( FWPLISTIVO_DIR_URI ) . '/assets/build' );
defined( 'FWPLISTIVO_BUILD_PATH' ) || define( 'FWPLISTIVO_BUILD_PATH', untrailingslashit( FWPLISTIVO_DIR_PATH ) . '/assets/build' );
defined( 'FWPLISTIVO_BUILD_JS_URI' ) || define( 'FWPLISTIVO_BUILD_JS_URI', untrailingslashit( FWPLISTIVO_DIR_URI ) . '/assets/build/js' );
defined( 'FWPLISTIVO_BUILD_JS_DIR_PATH' ) || define( 'FWPLISTIVO_BUILD_JS_DIR_PATH', untrailingslashit( FWPLISTIVO_DIR_PATH ) . '/assets/build/js' );
defined( 'FWPLISTIVO_BUILD_IMG_URI' ) || define( 'FWPLISTIVO_BUILD_IMG_URI', untrailingslashit( FWPLISTIVO_DIR_URI ) . '/assets/build/src/img' );
defined( 'FWPLISTIVO_BUILD_CSS_URI' ) || define( 'FWPLISTIVO_BUILD_CSS_URI', untrailingslashit( FWPLISTIVO_DIR_URI ) . '/assets/build/css' );
defined( 'FWPLISTIVO_BUILD_CSS_DIR_PATH' ) || define( 'FWPLISTIVO_BUILD_CSS_DIR_PATH', untrailingslashit( FWPLISTIVO_DIR_PATH ) . '/assets/build/css' );
defined( 'FWPLISTIVO_BUILD_LIB_URI' ) || define( 'FWPLISTIVO_BUILD_LIB_URI', untrailingslashit( FWPLISTIVO_DIR_URI ) . '/assets/build/library' );
defined( 'FWPLISTIVO_ARCHIVE_POST_PER_PAGE' ) || define( 'FWPLISTIVO_ARCHIVE_POST_PER_PAGE', 9 );
defined( 'FWPLISTIVO_SEARCH_RESULTS_POST_PER_PAGE' ) || define( 'FWPLISTIVO_SEARCH_RESULTS_POST_PER_PAGE', 9 );

require_once FWPLISTIVO_DIR_PATH . '/inc/helpers/autoloader.php';
require_once FWPLISTIVO_DIR_PATH . '/inc/helpers/template-tags.php';

if( ! function_exists( 'fwplistivo_get_theme_instance' ) ) {
	function fwplistivo_get_theme_instance() {\FWPLISTIVO_THEME\Inc\Project::get_instance();}
}
fwplistivo_get_theme_instance();



