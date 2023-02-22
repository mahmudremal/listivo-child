<?php
/**
 * Header category sub menu ttemplate.
 * @package FWPListivo.
 */
// $get_categories = get_categories( [] );
$categories = get_terms( [
  'taxonomy'    => 'listivo_14',
  'hide_empty'  => false,
  // 'orderby'     => 'term_id',
  // 'object_ids'   => [],
  'parent'      => 0
  // listivo_14 listivo_listing
  //'child_of' => 17 // to target not only direct children
] );
// print_r( $categories );
// get_category_link( $category->term_id )
$more = '';
?>
<div class="categoryLiquid">
  <ul class="category-bar">
    <?php foreach( $categories as $i => $category ) :
      $childrens = [];$isMega = false;$megaMenus = '';
      if( $i <= 7 ) {
        $childrens = get_terms( [
          'taxonomy'    => 'listivo_14',
          'hide_empty'  => false,
          'child_of' => $category->term_id
        ] );
        $isMega = ( count( $childrens ) >= 1 );
        foreach( $childrens as $j => $child ) :
          $childimg_id = get_term_meta( $category->term_id, 'fwplistivo_img', true );
          if( $childimg  && $childimg = wp_get_attachment_image_url( $childimg_id, 'thumbnail' ) ) {}
          $childshrtnm = get_term_meta( $child->term_id, 'fwplistivo_shortname', true );
          $childshrtnm = ( $childshrtnm && ! empty( $childshrtnm ) ) ? $childshrtnm : explode( ' ', $child->name )[0];
          $megaMenus .= '
          <li class="' . esc_attr( 'category-' . $child->term_id ) . ' category-top">
            <a class="" href="' . get_category_link( $child->term_id ). '">
              ' . ( ( $childimg ) ? '<span class="icon"><img src="' . $childimg . '" alt=""/></span>' : '<span class="' . esc_attr( 'icon-' . $child->slug ) . '"></span>' ) . '
              <span class="full-name">' . esc_html( $child->name ). '</span>
              <span class="short-name">' . esc_html( $childshrtnm ). '</span>
            </a>
          </li>';
        endforeach;
      }
      $image = false;$image = get_term_meta( $category->term_id, 'fwplistivo_img', true );
      if( $image  && $image = wp_get_attachment_image_url( $image, 'thumbnail' ) ) {}
      $shortname = get_term_meta( $category->term_id, 'fwplistivo_shortname', true );
      $shortname = ( $shortname && ! empty( $shortname ) ) ? $shortname : explode( ' ', $category->name )[0];
      $hasMegaMenus = ( ! empty( $megaMenus ) ) ? '<div class="more-category-list mega-menus"><ul class="">' . $megaMenus . '</ul></div>': false;
      $html = '
      <li class="' . ( $isMega ? 'more' : esc_attr( 'category-' . $category->term_id ) ) . ' category-top">
        <a class="' . ( $isMega ? 'more-btn' : '' ) . '" href="' . get_category_link( $category->term_id ). '">
          ' . ( ( $image ) ? '<span class="icon"><img src="' . $image . '" alt=""/></span>' : '<span class="' . esc_attr( 'icon-' . $category->slug ) . '"></span>' ) . '
          <span class="full-name">' . esc_html( $category->name ). '</span>
          <span class="short-name">' . esc_html( $shortname ). '</span>
        </a>
        ' . ( $hasMegaMenus ? $hasMegaMenus : '' ) . '
      </li>';
      if( $i <= 7 ):echo $html;else:$more .= $html;endif;
    endforeach;
    if( ! empty( $more ) ) : ?>
    <li class="more category-top">
      <span class="more-btn">
        <span class="icon-more-categories"></span>
        <span class="full-name"><?php esc_html_e( 'More Categories', 'domain' ); ?></span>
        <span class="short-name"><?php esc_html_e( 'ALL', 'domain' ); ?></span>
      </span>
      <ul class="more-category-list"><?php echo $more; ?></ul>
    </li>
    <?php endif; ?>
  </ul>
</div>