<?php
/**
 * Enqueue theme assets
 *
 * @package FwpListivo
 */


namespace FWPLISTIVO_THEME\Inc;

use FWPLISTIVO_THEME\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
		/**
		 * The 'enqueue_block_assets' hook includes styles and scripts both in editor and frontend,
		 * except when is_admin() is used to include them conditionally
		 */
		// add_action( 'enqueue_block_assets', [ $this, 'enqueue_editor_assets' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ], 10, 1 );
	}

	public function register_styles() {
		// Register styles.
		// wp_register_style( 'bootstrap-css', FWPLISTIVO_BUILD_LIB_URI . '/css/bootstrap.min.css', [], false, 'all' );
		// wp_register_style( 'slick-css', FWPLISTIVO_BUILD_LIB_URI . '/css/slick.css', [], false, 'all' );
		// wp_register_style( 'slick-theme-css', FWPLISTIVO_BUILD_LIB_URI . '/css/slick-theme.css', ['slick-css'], false, 'all' );

		wp_register_style( 'listivo', get_template_directory_uri() . '/style.css', [], $this->filemtime( get_template_directory() . '/style.css' ), 'all' );
		wp_register_style( 'listivo-child', FWPLISTIVO_BUILD_CSS_URI . '/main.css', [ 'listivo' ], $this->filemtime( FWPLISTIVO_BUILD_CSS_DIR_PATH . '/main.css' ), 'all' );

		// Enqueue Styles.
		wp_enqueue_style( 'listivo' );
		wp_enqueue_style( 'listivo-child' );

		// wp_enqueue_style( 'bootstrap-css' );
		// wp_enqueue_style( 'slick-css' );
		// wp_enqueue_style( 'slick-theme-css' );

	}

	public function register_scripts() {
		// Register scripts.
		// wp_register_script( 'slick-js', FWPLISTIVO_BUILD_LIB_URI . '/js/slick.min.js', ['jquery'], false, true );
		wp_register_script( 'listivo-child', FWPLISTIVO_BUILD_JS_URI . '/main.js', ['jquery'], $this->filemtime( FWPLISTIVO_BUILD_JS_DIR_PATH . '/main.js' ), true );
		wp_register_script( 'listivo-create', FWPLISTIVO_BUILD_JS_URI . '/create.js', ['jquery'], $this->filemtime( FWPLISTIVO_BUILD_JS_DIR_PATH . '/create.js' ), true );
		// wp_register_script( 'single-js', FWPLISTIVO_BUILD_JS_URI . '/single.js', ['jquery', 'slick-js'], $this->filemtime( FWPLISTIVO_BUILD_JS_DIR_PATH . '/single.js' ), true );
		// wp_register_script( 'author-js', FWPLISTIVO_BUILD_JS_URI . '/author.js', ['jquery'], $this->filemtime( FWPLISTIVO_BUILD_JS_DIR_PATH . '/author.js' ), true );
		// wp_register_script( 'bootstrap-js', FWPLISTIVO_BUILD_LIB_URI . '/js/bootstrap.min.js', ['jquery'], false, true );

		// Enqueue Scripts.
		wp_enqueue_script( 'listivo-child' );
		// wp_enqueue_script( 'bootstrap-js' );
		// wp_enqueue_script( 'slick-js' );

		// If single post page
		// if ( is_single() ) {
		// 	wp_enqueue_script( 'single-js' );
		// }

		// If author archive page
		// if ( is_author() ) {
		// 	wp_enqueue_script( 'author-js' );
		// }
		$siteConfig = [
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'loadmore_post_nonce' ),
			// 'ss'				=> substr( str_replace( [ '/' ], [ '' ], $_SERVER[ 'REQUEST_URI' ] ), 0, 11 ),
			'i18n'			=> [
				'everything_else'			=> __( 'Everything else', 'domain' ),
				'urnowpostingin'			=> __( 'You are now posting in', 'domain' ),
				'whtrulistoday'				=> __( 'What are you listing today?', 'domain' ),
				'slctcatulikeblw'			=> __( 'Select the category you would like to post to below.', 'domain' ),
			]
		];
		
		if( substr( str_replace( [ '/' ], [ '' ], $_SERVER[ 'REQUEST_URI' ] ), 0, 11 ) == "panelcreate" ) {
			wp_enqueue_script( 'listivo-create' );
			// array_reverse(  )
			$term_ids = [ 465, 645, 615, 623 ];
			$taxonomy = 'listivo_14';
			$siteConfig[ 'cats' ] = $terms = get_terms( [
				'taxonomy' => $taxonomy,
				'include' => $term_ids,
				
				'hide_empty'    => false,
				'hierarchical'  => false,
				'parent'        => 0,
			] );

			foreach( $siteConfig[ 'cats' ] as $i => $term ) {
				if( in_array( $term->term_id, [ 465 ] ) ) { // , 645, 615, 623
					$siteConfig[ 'cats' ][ $i ]->subcats = get_terms( [
						'taxonomy' => $taxonomy,
						'hide_empty'    => false,
						'hierarchical'  => false,
						'parent'        => $term->term_id,
					] );
				}
			}
		}


		wp_localize_script( 'listivo-child', 'siteConfig', $siteConfig );
	}

	/**
	 * Enqueue editor scripts and styles.
	 */
	public function enqueue_editor_assets() {

		$asset_config_file = sprintf( '%s/assets.php', FWPLISTIVO_BUILD_PATH );

		if ( ! file_exists( $asset_config_file ) ) {
			return;
		}

		$asset_config = require_once $asset_config_file;

		if ( empty( $asset_config['js/editor.js'] ) ) {
			return;
		}

		$editor_asset    = $asset_config['js/editor.js'];
		$js_dependencies = ( ! empty( $editor_asset['dependencies'] ) ) ? $editor_asset['dependencies'] : [];
		$version         = ( ! empty( $editor_asset['version'] ) ) ? $editor_asset['version'] : $this->filemtime( $asset_config_file );

		// Theme Gutenberg blocks JS.
		if ( is_admin() ) {
			wp_enqueue_script(
				'aquila-blocks-js',
				FWPLISTIVO_BUILD_JS_URI . '/blocks.js',
				$js_dependencies,
				$version,
				true
			);
		}

		// Theme Gutenberg blocks CSS.
		$css_dependencies = [
			'wp-block-library-theme',
			'wp-block-library',
		];

		wp_enqueue_style(
			'aquila-blocks-css',
			FWPLISTIVO_BUILD_CSS_URI . '/blocks.css',
			$css_dependencies,
			$this->filemtime( FWPLISTIVO_BUILD_CSS_DIR_PATH . '/blocks.css' ),
			'all'
		);

	}
	public function admin_enqueue_scripts( $curr_page ) {
		// if( ! in_array( $curr_page, [ 'edit-tags.php', 'term.php' ] ) ) {return;}
		wp_register_style( 'FWPListivoBackendCSS', FWPLISTIVO_BUILD_CSS_URI . '/admin.css', [], $this->filemtime( FWPLISTIVO_BUILD_CSS_DIR_PATH . '/admin.css' ), 'all' );
		wp_register_script( 'FWPListivoBackendJS', FWPLISTIVO_BUILD_JS_URI . '/admin.js', [ 'jquery' ], $this->filemtime( FWPLISTIVO_BUILD_JS_DIR_PATH . '/admin.js' ), true );
		
		wp_enqueue_style( 'FWPListivoBackendCSS' );
		wp_enqueue_script( 'FWPListivoBackendJS' );

		wp_localize_script( 'FWPListivoBackendJS', 'FWPsiteConfig', [
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			// 'ajax_nonce' => wp_create_nonce( 'futurewordpress_project_nonce' ),
		] );
	}
	private function filemtime( $file ) {
		return ( file_exists( $file ) && ! is_dir( $file ) ) ? filemtime( $file ) : rand( 0, 9999 );
	}

}
