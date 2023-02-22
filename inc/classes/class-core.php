<?php
/**
 * Block Patterns
 *
 * @package FwpListivo
 */

namespace FWPLISTIVO_THEME\Inc;

use FWPLISTIVO_THEME\Inc\Traits\Singleton;

class Core {
	use Singleton;
	private $mediaConfig;
	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}
	protected function setup_hooks() {
		$this->mediaConfig = [
			'title'						=> __( 'Select Icon. Recomment to keep image around of 40px/40px.', 'domain' ),
			'library'					=> [
				'type'					=> 'image'
			],
			'button'					=> [
				'text'					=> __( 'Use this Icon', 'domain' ),
			],
			'multiple'				=> false
		];
		// add_action( 'get_template_part_templates/blog/header', [ $this, 'get_template_part' ], 10, 3 );
		// add_action( 'get_template_part', [ $this, 'get_template_part' ], 10, 4 );
		add_action( 'listivo_14_add_form_fields', [ $this, 'listivo_14_add_form_fields' ], 10, 1 );
		add_action( 'listivo_14_edit_form_fields', [ $this, 'listivo_14_edit_form_fields' ], 10, 2 );
		add_action( 'created_listivo_14', [ $this, 'save_listivo_14' ], 10, 1 );
		add_action( 'edited_listivo_14', [ $this, 'save_listivo_14' ], 10, 1 );

		add_shortcode( 'fwp-listivo-location-map', [ $this, 'fwp_listivo_location_map' ] );

		// print_r( $_POST );
		add_action( 'admin_post_nopriv_listivo-child-custom-quick-login-from', [ $this, 'quick_login' ], 10, 0 );

		add_filter( 'gettext', [ $this, 'gettext' ], 10, 3 );
	}
	public function get_template_part( $slug, $name = null, $templates = '', $args = [] ) {
		// print_r( [ $slug, $name, $templates, $args ] );wp_die( 'hi' );
	}
	public function template_include() {}
	public function listivo_14_add_form_fields( $taxonomy ) {
		$this->listivo_14_form_fields__addtomega( false, $taxonomy );
		$this->listivo_14_form_fields__shortname( false, $taxonomy );
		$this->listivo_14_form_fields__uploadicon( false, $taxonomy );
	}
	public function listivo_14_edit_form_fields( $term, $taxonomy ) {
		// 
		?>
		<tr class="form-field form-requi-red term-name-wrap">
			<th scope="row"><label><?php esc_html_e( 'Mega menu order', 'domain' ); ?></label></th>
			<td>
				<?php $this->listivo_14_form_fields__addtomega( $term, $taxonomy ); ?>
			</td>
		</tr>
		<tr class="form-field form-requi-red term-name-wrap">
			<th scope="row"><label><?php esc_html_e( 'Shortname', 'domain' ); ?></label></th>
			<td>
				<?php $this->listivo_14_form_fields__shortname( $term, $taxonomy ); ?>
			</td>
		</tr>
		<tr class="form-field form-requi-red term-name-wrap">
			<th scope="row"><label><?php esc_html_e( 'Menu Icon', 'domain' ); ?></label></th>
			<td>
				<?php $this->listivo_14_form_fields__uploadicon( $term, $taxonomy ); ?>
				<p class="description" id="description-description"><?php esc_html_e( 'Select an Icon for this menu itme for site header menus and mega menus.', 'domain' ); ?></p>
			</td>
		</tr>
		<?php
	}
	private function listivo_14_form_fields__addtomega( $term, $taxonomy ) {
		$addtomega = ( $term ) ? get_term_meta( $term->term_id, 'fwplistivo_addtomega', true ) : '';
		?>
			<?php if( ! $term ) : ?>
			<div class="form-field form-requi-red term-name-wrap">
				<label for="fwplistivo_addtomega"><?php esc_html_e( 'Mega menu order', 'domain' ); ?></label>
				<?php endif; ?>
				<input type="number" name="fwplistivo_addtomega" id="fwplistivo_addtomega" value="<?php echo esc_attr( $addtomega ); ?>" size="12" aria-requi-red="true" aria-describedby="fwplistivo_addtomega-addtomega">
				<p id="fwplistivo_addtomega-addtomega"><?php esc_html_e( 'Add this menu on mega menu if it is parent category. If it is subcategory, this function won\'t apply maybe.', 'domain' ); ?></p>
			<?php if( ! $term ) : ?>
			</div>
			<?php endif; ?>
		<?php
	}
	private function listivo_14_form_fields__uploadicon( $term, $taxonomy ) {
		// https://rudrastyh.com/wordpress/add-custom-fields-to-taxonomy-terms.html
		$image_id = ( $term ) ? get_term_meta( $term->term_id, 'fwplistivo_img', true ) : false;
		?>
			<?php if( $term && $image = wp_get_attachment_image_url( $image_id, 'thumbnail' ) ) : ?>
				<div class="fwplistivo-media-button">
					<a href="#" class="fwplistivo-upload">
						<img src="<?php echo esc_url( $image ) ?>" />
					</a>
					<a href="#" class="fwplistivo-remove" title="<?php esc_attr_e( 'Remove Icon', 'domain' ); ?>">X</a>
					<input type="hidden" name="fwplistivo_img" value="<?php echo absint( $image_id ) ?>">
				</div>
			<?php else : ?>
				<div class="fwplistivo-media-button">
					<a href="#" class="button fwplistivo-upload" data-config="<?php echo esc_attr( json_encode( $this->mediaConfig ) ); ?>"><?php esc_html_e( 'Upload Icon', 'domain' ); ?></a>
					<a href="#" class="fwplistivo-remove" style="display:none" title="<?php esc_attr_e( 'Remove Icon', 'domain' ); ?>">X</a>
					<input type="hidden" name="fwplistivo_img" value="">
				</div>
			<?php endif; ?>
		<?php
	}
	private function listivo_14_form_fields__shortname( $term, $taxonomy ) {
		$shortname = ( $term ) ? get_term_meta( $term->term_id, 'fwplistivo_shortname', true ) : '';
		// print_r( [$term, $taxonomy, $image_id ] );
		?>
			<?php if( ! $term ) : ?>
			<div class="form-field form-requi-red term-name-wrap">
				<label for="fwplistivo_shortname"><?php esc_html_e( 'Shortname', 'domain' ); ?></label>
				<?php endif; ?>
				<input type="text" name="fwplistivo_shortname" id="fwplistivo_shortname" value="<?php echo esc_attr( $shortname ); ?>" size="12" aria-requi-red="true" aria-describedby="fwplistivo_shortname-description">
				<p id="fwplistivo_shortname-description"><?php esc_html_e( 'Shortname used on mega menus on tablet and mobile view. Full name displayed on large screen and if shortname left blank then firstword of this title will be replaced instead of empty value.', 'domain' ); ?></p>
			<?php if( ! $term ) : ?>
			</div>
			<?php endif; ?>
		<?php
	}
	public function save_listivo_14( $term_id ) {
		if( isset( $_POST[ 'fwplistivo_img' ] ) ) {
			update_term_meta( $term_id, 'fwplistivo_img', absint( $_POST[ 'fwplistivo_img' ] ) );
		}
		if( isset( $_POST[ 'fwplistivo_shortname' ] ) && ! empty( $_POST[ 'fwplistivo_shortname' ] ) ) {
			update_term_meta( $term_id, 'fwplistivo_shortname', sanitize_text_field( $_POST[ 'fwplistivo_shortname' ] ) );
		}
		if( isset( $_POST[ 'fwplistivo_addtomega' ] ) ) {
      // print_r( $_POST );wp_die();
			update_term_meta( $term_id, 'fwplistivo_addtomega', $_POST[ 'fwplistivo_addtomega' ] );
		}
	}

	public function fwp_listivo_location_map( $args = [] ) {
		// $args = wp_parse_args( $args, [] );
		$locations = [];
		// wp_add_inline_script( 'fwplistivoamchartsmap-inline-data', "var FWPListivoamchartsMap = " .  . ";", 'footer' );
		return '<div id="fwplistivoamchartsmap" data-map-config="' . esc_attr( json_encode( $locations ) ) . '" data-map-reload="true"></div>';
	}

	public function quick_login() {
		if( ! wp_verify_nonce( $_POST[ 'custom-quick-login' ], 'listivo-child-custom-quick-login' ) ||  ! isset( $_POST[ 'pass' ] ) || ! isset( $_POST[ 'user' ] ) ) {
			wp_die( __( 'Seems you\'re tring with an illigal way.', 'domain' ), __( 'Data validation error', 'domain' ) );
		}
		$creds = [
			'user_login'    => $_POST[ 'user' ],
			'user_password' => $_POST[ 'pass' ],
			'remember'      => ( $_POST[ 'remember' ] == 'on' )
		];
		// print_r( $_POST );wp_die( 'Got it' );
		$user = wp_signon( $creds, false );
		if( is_wp_error( $user ) ) {
			$msg = $user->get_error_message();
			$creds[ 'error' ] = $msg;
			set_transient( 'listivo-child-quick-login', $creds, 300 );
		} else {
			wp_clear_auth_cookie();
			wp_set_current_user( $user->ID ); // Set the current user detail
			wp_set_auth_cookie( $user->ID ); // Set auth details in cookie
		}
		wp_redirect( wp_get_referer() );
	}
	public function gettext( $translation, $text, $domain ) {
		return ( $domain == 'domain' ) ? $translation : str_replace( [
			__( 'Order', 'domain' ),
			__( 'order', 'domain' ),
		], [
			__( 'Subscription', 'domain' ),
			__( 'subscription', 'domain' ),
		], $translation );
	}
}
