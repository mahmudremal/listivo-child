<?php
/**
 * Header category sub menu ttemplate.
 * @package FWPListivo.
 */
// $get_categories = get_categories( [] );
$categories = get_terms( [
  'taxonomy'    => 'listivo_14',
  'hide_empty'  => false,
  'parent'      => 0
  // listivo_14 listivo_listing
  //'child_of' => 17 // to target not only direct children
] );
// print_r( $categories );
// get_category_link( $category->term_id )
$more = '';
$allStates = apply_filters( 'futurewordpress/project/datastructure/geo/states', [] );
// print_r( $allStates );
$locationPickerDropdown = false;
// wp_die(  );
?>
<div class="listivo-menu-v2__center">
  <div class="searchbarLiquid show-as-contrl">
    <section role="search">
      <div class="txt-header-bar">
        <!-- <span class="bar-title">What are you looking for?</span>
        <span class="bar-act"></span> -->
        <button aria-label="search" class="search-mobile-btn">
          <span class="fticon-header-search-light"></span>
        </button>
      </div>
      <form id="fwp-listivo-nav-search" action="<?php echo esc_url( site_url( '/ads/' ) ); ?>" data-action="<?php echo esc_url( site_url( '/ads/' ) ); ?>" class="has-location-true" data-instant-search="undefined" data-clear-searches-message="<?php esc_attr_e( 'Clear Recent Searches', 'domain' ); ?>" data-saved-search="true" data-auto-complete="true" data-auto-complete-api="<?php echo esc_attr( site_url( '/wp-json/autocomplete/model/en_ZA/{catId}/{locId}/{value}' ) ); ?>">
        <input type="hidden" name="pagination" value="1">
        <fieldset>
          <div class="fields">
            <div class="category has-mega-menus" onclick="void(0)">
              <div class="touch-box">
                <span class="icon-more-categories" data-icon="icon-more-categories" style="visibility: visible;">
                  <span class="icon-header-categories-hollow-new"></span>
                </span>
                <input type="text" data-all="<?php esc_attr_e( 'All Categories', 'domain' ); ?>" value="<?php esc_attr_e( 'Category', 'domain' ); ?>" autocomplete="off" disabled="disabled" readonly="readonly">
                <input type="hidden" name="catId" value="<?php echo esc_attr( isset( $_GET[ 'catId' ] ) ? $_GET[ 'catId' ] : '' ); ?>" data-category-id-of-l1="null">
                <span class="fticon-down-arrow-inactive"></span>
              </div>
              <div id="" class="bolt-popup-close" onclick="void(0)"></div>
              <div class="options">
                <div class="panel">
                  <a class="panel-title" data-id="0" href="javascript:void(0)"><?php esc_html_e( 'All Categories', 'domain' ); ?></a>
                  <ul class="size-m">
                    <li>
                      <a data-id="0" href="javascript:void(0)">
                        <span class="icon">
                          <span class="icon-more-categories"></span>
                          <!-- <span class="out icon-header-categories-hollow-new"></span>
                          <span class="over icon-header-categories-hollow-new"></span> -->
                        </span> <?php esc_html_e( 'All Categories', 'domain' ); ?> </a>
                    </li>
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
                          <li class="' . esc_attr( 'category-' . $child->term_id ) . '">
                          <!-- ' . ( ( $childimg ) ? '<span class="icon"><img src="' . $childimg . '" alt=""/></span>' : '<span class="' . esc_attr( 'icon-' . $child->slug ) . '"></span>' ) . ' -->
                            <a data-id="' . esc_attr( $child->term_id ) . '" href="javascript:void(0)" data-href="' . esc_url( get_category_link( $child->term_id ) ). '" data-title="' . esc_attr( $child->name ). '"> ' . esc_html( $child->name ). ' </a>
                          </li>';
                        endforeach;
                      }
                      $image = false;$image = get_term_meta( $category->term_id, 'fwplistivo_img', true );
                      if( $image  && $image = wp_get_attachment_image_url( $image, 'thumbnail' ) ) {}
                      $shortname = get_term_meta( $category->term_id, 'fwplistivo_shortname', true );
                      $shortname = ( $shortname && ! empty( $shortname ) ) ? $shortname : explode( ' ', $category->name )[0];
                      $hasMegaMenus = ( ! empty( $megaMenus ) );
                      $html = '
                      <li class="' . ( $isMega ? 'has-mega-menus' : esc_attr( 'category-' . $category->term_id ) ) . '">
                        <a data-id="' . esc_attr( $category->term_id ) . '" href="javascript:void(0)" data-href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="' . ( $isMega ? 'is-megamenu' : '' ) . '" data-title="' . esc_attr( $category->name ). '">
                        ' . ( ( $image ) ? '<span class="icon"><img src="' . esc_url( $image ) . '" alt=""/></span>' : '<span class="' . esc_attr( 'icon-' . $category->slug ) . '"></span>' ) . ' ' . esc_html( substr( $category->name, 0, 20 ) . ( strlen( $category->name ) > 20 ? '..' : '' ) ). ' ' . ( $isMega ? '<span class="fticon-right-arrow"></span>' : '' ) . '
                        </a>
                        ' . ( $hasMegaMenus ? '
                        <div class="panel">
                          <a class="panel-title" data-id="' . esc_attr( $category->term_id ) . '" href="javascript:void(0)">' . esc_html( $category->name ). '</a>
                          <ul class="size-s">
                          ' . $megaMenus . '
                          </ul>
                        </div>' : '' ) . '
                      </li>';
                      if( $i <= 7 ):echo $html;else:$more .= $html;endif;
                    endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="vessel">
              <div class="keyword">
                <input type="text" name="keyword" value="<?php echo esc_attr( isset( $_GET[ 'keyword' ] ) ? $_GET[ 'keyword' ] : '' ); ?>" aria-label="<?php esc_attr_e( 'What are you looking for?', 'domain' ); ?>" placeholder="<?php esc_attr_e( 'What are you looking for?', 'domain' ); ?>" autocomplete="off">
                <div class="cur-cat">
                  <span class="in">in</span>
                  <span class="cur-cat-name"><?php esc_html_e( 'All Categories', 'domain' ); ?></span>
                </div>
              </div>
              <div class="location" onclick="javascript:void(0)" style="displ ay: none;">
                <div class="touch-box <?php echo esc_attr( $locationPickerDropdown ? '' : 'click-event-popup' ); ?>">
                  <span class="main-icon icon-location-promotion"></span>
                  <input type="text" data-all="<?php esc_attr_e( 'All Nigeria', 'domain' ); ?>" placeholder="<?php esc_attr_e( 'All Nigeria', 'domain' ); ?>" value="<?php echo esc_attr( isset( $_GET[ 'location-area' ] ) ? $_GET[ 'location-area' ] : 'All Nigeria' ); ?>" autocomplete="off" disabled="disabled" readonly="readonly" name="location-area">
                  <!-- <input type="hidden" name="locId" value="<?php // echo esc_attr( isset( $_GET[ 'locId' ] ) ? $_GET[ 'locId' ] : '' ); ?>"> -->
                  <input type="hidden" name="location-place-id" value="<?php echo esc_attr( isset( $_GET[ 'location-place-id' ] ) ? $_GET[ 'location-place-id' ] : '' ); ?>">
                  <input type="hidden" name="location-sw-lat" value="<?php echo esc_attr( isset( $_GET[ 'location-sw-lat' ] ) ? $_GET[ 'location-sw-lat' ] : '' ); ?>">
                  <input type="hidden" name="location-sw-lng" value="<?php echo esc_attr( isset( $_GET[ 'location-sw-lng' ] ) ? $_GET[ 'location-sw-lng' ] : '' ); ?>">
                  <input type="hidden" name="location-ne-lat" value="<?php echo esc_attr( isset( $_GET[ 'location-ne-lat' ] ) ? $_GET[ 'location-ne-lat' ] : '' ); ?>">
                  <input type="hidden" name="location-ne-lng" value="<?php echo esc_attr( isset( $_GET[ 'location-ne-lng' ] ) ? $_GET[ 'location-ne-lng' ] : '' ); ?>">
                  <input type="hidden" name="location-radius" value="<?php echo esc_attr( isset( $_GET[ 'location-radius' ] ) ? $_GET[ 'location-radius' ] : '16090' ); ?>">
                </div>
                <div id="" class="bolt-popup-close" onclick="void(0)"></div>
                <?php if( $locationPickerDropdown ) : ?>
                <div class="options">
                  <div class="panel">
                    <a class="panel-title" href="javascript:void(0)"><?php esc_html_e( 'Nigeria', 'domain' ); ?></a>
                    <ul class="size-s">
                      <li class="">
                        <a href="javascript:void(0)" data-latlng="{}" data-title="<?php esc_attr_e( 'All Nigeria', 'domain' ); ?>"> <?php esc_html_e( 'All Nigeria', 'domain' ); ?> </a>
                      </li>
                      <?php foreach( $allStates as $stateI => $state ) :
                        $latlng = apply_filters( 'futurewordpress/project/datastructure/geo/header', [], $state[ 'geo' ] );
                        //  $state[ 'geo' ][ 'results' ][0][ 'geometry' ][ 'bounds' ][ 'northeast' ][ 'lat' ];
                        ?>
                      <li>
                        <a data-latlng="<?php echo esc_attr( json_encode( $latlng ) ); ?>" data-title="<?php echo esc_attr( $state[ 'name' ] ); ?>" href="javascript:void(0)"> <?php echo esc_html( $state[ 'name' ] ); ?> <?php if( isset( $state[ 'localgas' ] ) && count( $state[ 'localgas' ] ) > 0 ) : ?><span class="fticon-right-arrow"></span><?php endif; ?>
                        </a>
                        <div class="panel">
                          <a class="panel-title" href="javascript:void(0)"><?php echo esc_html( $state[ 'name' ] ); ?></a>
                          <?php if( isset( $state[ 'localgas' ] ) && count( $state[ 'localgas' ] ) > 0 ) : ?>
                          <ul class="size-s">
                            <?php foreach( $state[ 'localgas' ] as $lgas ) :
                              $latlng = apply_filters( 'futurewordpress/project/datastructure/geo/header', [], $lgas[ 'geo' ] );
                              ?>
                            <li>
                              <a data-latlng="<?php echo esc_attr( json_encode( $latlng ) ); ?>" data-title="<?php echo esc_attr( $lgas[ 'name' ] ); ?>" href="javascript:void(0)"> <?php echo esc_html( $lgas[ 'name' ] ); ?> </a>
                            </li>
                            <?php endforeach; ?>
                          </ul>
                          <?php endif; ?>
                        </div>
                      </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <div class="autocomplete" style="display: none;"></div>
            </div>
            <div class="button">
              <button aria-label="search" class="submit-btn">
                <span class="fticon-header-search-light"></span>
              </button>
            </div>
            <input type="hidden" name="dominantCategoryDisabled" value="" disabled="">
          </div>
        </fieldset>
      </form>
    </section>
  </div>
</div>
<script>
  window.onload = function() {
    document.querySelector( '[name="keyword"]' ).value = document.querySelector( '[name="keyword"]' ).placeholder;
    document.querySelector( '[name="keyword"]:not([data-handled])' ).addEventListener( 'focus', function( e ) {
      if( ! this.dataset.handled ) {this.placeholder = '';this.value = '';this.dataset.handled = true;}
    } );
  }
</script>

<?php if( $locationPickerDropdown ) : ?>
<script>
  window.onload = function() {
    // [data-location-radius] location-place-id location-sw-lat location-sw-lng location-ne-lat location-ne-lng location-radius
    document.querySelectorAll( '.searchbarLiquid .location ul li a[data-latlng]' ).forEach( ( el, ei ) => {
      el.addEventListener( 'click', ( click ) => {
        document.querySelector( '[name="location-area"]' ).value = click.target.dataset.title;
        var latlng = JSON.parse( click.target.dataset.latlng );
        console.log( latlng );
        if( typeof latlng.placeid !== 'undefined' ) {
          document.querySelector( '[name="location-place-id"]' ).value = latlng.placeid;
          document.querySelector( '[name="location-sw-lat"]' ).value = latlng.swlat;
          document.querySelector( '[name="location-sw-lng"]' ).value = latlng.swlng;
          document.querySelector( '[name="location-ne-lat"]' ).value = latlng.nelat;
          document.querySelector( '[name="location-ne-lng"]' ).value = latlng.nelng;
        }
      } );
    } );
  }
</script>
<?php else: ?>
<script>
  window.fwpI18N = <?php echo json_encode( [
    'location'        => __( 'Location', 'domain' ),
    'all_nigeria'     => __( 'All Nigeria', 'domain' )
  ] ); ?>;
  window.nigeria = <?php echo json_encode( $allStates ); ?>;
  window.onload = function() {
    // var fwpI18N = {location: 'Location', all_nigeria: 'All Nigeria'},
    locationPicker = function( onTheList = false ) {
      var theList, container, model, badge, backdrop, header, title, wrap, div, row, element, geo, ul, li, a, span, i;
      if( ! onTheList ) {theList = window.nigeria;} else {theList = onTheList;}
      document.querySelectorAll( '.fwp-popup-container' ).forEach( ( e ) => {e.remove();} );
      container = document.createElement( 'div' );container.classList.add( 'fwp-popup-container' );
      backdrop = document.createElement( 'div' );backdrop.classList.add( 'fwp-popup-backdrop' );
      wrap = document.createElement( 'div' );wrap.classList.add( 'fwp-popup-wrap' );
      div = document.createElement( 'div' );div.classList.add( 'fwp-popup-div' );
      header = document.createElement( 'div' );header.classList.add( 'fwp-popup-header' );
      title = document.createElement( 'h3' );title.classList.add( 'title' );title.innerText = fwpI18N.location;
      header.appendChild( title );
      if( onTheList ) {back = document.createElement( 'span' );back.classList.add( 'fwp-loc-back' );back.innerText = '⇽';header.appendChild( back );}
        div.appendChild( header );
      ul = document.createElement( 'ul' );ul.classList.add( 'list-unstyled' );
      if( ! onTheList ) {
        li = document.createElement( 'li' );li.classList.add( 'list-item' );
        li.dataset.latlng = "{}";
        a = document.createElement( 'a' );a.classList.add( 'list-item-link' );a.dataset.title = fwpI18N.all_nigeria;a.innerText = fwpI18N.all_nigeria;
        a.dataset.latlng = JSON.stringify( {} );a.href = 'javascript:void(0)';
        li.appendChild( a );ul.appendChild( li );
      }
      
      theList.forEach( ( e , i ) => {
          geo = e.geo.results[0].geometry.bounds;
          geo = {nelat: geo.northeast.lat, nelng: geo.northeast.lng, swlat: geo.southwest.lat, swlng: geo.southwest.lng, placeid: e.geo.results[0].place_id};
          li = document.createElement( 'li' );li.classList.add( 'list-item' );if( e.localgas ) {li.dataset.parent = i;}
          a = document.createElement( 'a' );a.classList.add( 'list-item-link' );a.dataset.title = e.name;a.innerText = e.name;
          a.dataset.latlng = JSON.stringify( geo );a.href = 'javascript:void(0)';if( e.localgas ) {a.dataset.parent = i;}
          if( typeof e.lgas !== 'undefined' ) {
            span = document.createElement( 'span' );span.classList.add( 'list-item-badge' );span.innerText = e.lgas.length;a.appendChild( span );
          }
          
          li.appendChild( a );ul.appendChild( li );
          // console.log( e.geo.results[0] );
      } );
      div.appendChild( ul );wrap.appendChild( div );container.appendChild( backdrop );container.appendChild( wrap );document.body.appendChild( container );
      // console.log( container );
      
      document.querySelector( '.fwp-popup-backdrop' ).addEventListener( 'click', ( event ) => {
          event.target.parentElement.remove();
      } );
      document.querySelectorAll( '.list-item-link' ).forEach( ( e ) => {
        e.addEventListener( 'click', ( event ) => {
          if( typeof event.target.dataset.parent !== 'undefined' ) {
              // console.log( 'Is parent', window.nigeria[ event.target.dataset.parent ] );
              locationPicker( window.nigeria[ event.target.dataset.parent ].localgas );
          } else {
              document.querySelector( '[name="location-area"]' ).value = event.target.dataset.title;
              var latlng = JSON.parse( event.target.dataset.latlng );
              // console.log( latlng );
              if( typeof latlng.placeid !== 'undefined' ) {
                document.querySelector( '[name="location-place-id"]' ).value = latlng.placeid;
                document.querySelector( '[name="location-sw-lat"]' ).value = latlng.swlat;
                document.querySelector( '[name="location-sw-lng"]' ).value = latlng.swlng;
                document.querySelector( '[name="location-ne-lat"]' ).value = latlng.nelat;
                document.querySelector( '[name="location-ne-lng"]' ).value = latlng.nelng;
              }
            document.querySelectorAll( '.fwp-popup-container' ).forEach( ( evt ) => {evt.remove();} );
          }
        } );
      } );
      back = document.querySelector( '.fwp-loc-back' );
      if( back ) {
        back.addEventListener( 'click', (e) => {
          locationPicker();
        } );
      }
    }
    document.querySelector( '.searchbarLiquid .location .touch-box.click-event-popup' ).addEventListener( 'click', (e) => {
      locationPicker();
    } );
  }
</script>
<?php endif; ?>