/**
 * @package Future WordPress Inc.
 */

(function () {
  class FWPProject_addListingScreen {
    constructor() {
      this.i18n = siteConfig?.i18n??{
        everything_else     : 'Everything else',
        urnowpostingin      : 'You are now posting in',
        whtrulistoday       : 'What are you listing today?',
        slctcatulikeblw     : 'Select the category you would like to post to below.',
      };
      this.setup_hooks();
      this.tabs();
    }
    setup_hooks() {
      const thisClass = this;
      var theInterval, players, css, js, csses, jses;
    }
    decodeHTMLEntities( str ) {
      if( str && typeof str === 'string' ) {
        var element = document.createElement( 'div' );
        // strip script/html tags
        str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
        str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
        element.innerHTML = str;
        str = element.textContent;
        element.textContent = '';
      }
      return str;
    }
    tabs() {
      const thisClass = this;
var theInterval, hasSubCats, isReomvealbe, container, tabswrap, tabcontent, subcats, active, wrap, body, title, tabs, tab, div, span, icon, ul, li, hr, i, cats = siteConfig?.cats??[];
cats.reverse();cats.push( {name: thisClass.i18n.everything_else,role: false, term_id: 0} );isReomvealbe = false;
tabswrap = '.listivo-panel-section__form-tabs-wrap';
theInterval = setInterval(() => {// listivo-panel-form__fields
  container = document.querySelector( '.listivo-panel-section__form.listivo-panel-form' );
  if( container && container !== null ) {
    clearInterval( theInterval );if( ! isReomvealbe ) {container.classList.add( 'stickey' );}
    tabcontent = document.createElement( 'div' );tabcontent.classList.add( 'listivo-psf-tab-container' );
    wrap = document.createElement( 'div' );wrap.classList.add( 'listivo-panel-section__form-tabs-wrap' );
    hr = document.createElement( 'hr' );hr.classList.add( 'listivo-ps_form-tabs-hr' );hr.style.display = 'none;'
    title = document.createElement( 'div' );title.classList.add( 'listivo-panel-section__form-tabs-title' );
    title.innerText = thisClass.i18n.whtrulistoday;wrap.appendChild( title );
    tabs = document.createElement( 'ul' );tabs.classList.add( 'listivo-panel-section__form-tabs' );

    cats.forEach( ( e, i ) => {
      tab = document.createElement( 'li' );tab.classList.add( 'listivo-panel-section__form-tabs-single' );tab.dataset.nth = i;tab.dataset.title = thisClass.decodeHTMLEntities( e.name );tab.dataset.term_id = e.term_id;
      if( e.slug ) {
        icon = document.createElement( 'span' );icon.classList.add( 'listivo-panel-section__form-tabs-icon', 'icon-' + e.slug );tab.appendChild( icon );
      }
      if( e.role == false ) {
        active = "document.querySelector( '.listivo-select-v2__clear' ).click();";
        tab.setAttribute( 'onclick', ( isReomvealbe ) ? active + 'document.querySelector( "' + tabswrap + '" ).remove();' : active + 'document.querySelector( "' + tabswrap + '" ).classList.remove( "is-in-select" );' );
      }
      span = document.createElement( 'span' );span.classList.add( 'listivo-panel-section__form-tabs-text' );span.innerHTML = e.name.split( ',' )[0];tab.appendChild( span );
      tabs.appendChild( tab );
    } );
    wrap.appendChild( tabs );wrap.appendChild( hr );wrap.appendChild( tabcontent );
    if( isReomvealbe ) {container.appendChild( wrap );} else {
      container.insertBefore( wrap, container.childNodes[0] );
    }
    // console.log( container );
    document.querySelectorAll( 'li.listivo-panel-section__form-tabs-single' ).forEach( ( tab ) => {
      tab.addEventListener( 'click', ( e ) => {
        if( e.target.dataset.title ) {
          active = document.querySelector( '.listivo-panel-section__form-tabs-single.active' );
          if( active ) {active.classList.remove( 'active' );}e.target.classList.add( 'active' );
          document.querySelector( '.listivo-ps_form-tabs-hr' ).style.display = 'block';
          container = document.querySelector( '.listivo-psf-tab-container' );
          if( ! isReomvealbe ) {document.querySelector( tabswrap ).classList.remove( 'is-in-select' );}
          if( ! isReomvealbe ) {document.querySelector( '.listivo-panel-section__form.listivo-panel-form' ).classList.add( 'is-in-selecting' );}
          hasSubCats = ( cats[ e.target.dataset.nth ] && cats[ e.target.dataset.nth ].subcats && cats[ e.target.dataset.nth ].subcats.length >= 1 );

          setTimeout(() => {
            var cls = '.listivo-select-v2__placeholder';
            document.querySelector( cls ).click();
            setTimeout(() => {
              document.querySelectorAll( cls + ' + .listivo-select-v2__dropdown .listivo-select-v2__options .listivo-select-v2__option' ).forEach( ( opt, optI ) => {
                var title = opt.querySelector( '.listivo-select-v2__value' );
                if( title && title.innerText == e.target.dataset.title ) {
                  // console.log( title.innerText + ' == ' + e.target.dataset.title );
                  title.click();
                  if( ! hasSubCats && isReomvealbe ) {document.querySelector( tabswrap ).remove();}
                  if( hasSubCats && ! isReomvealbe ) {document.querySelector( tabswrap ).classList.add( 'is-in-select' );}
                } else {
                  // console.log( title.innerText + ' IS NOT EQUELTO ' + e.target.dataset.title );
                }
              } );
              if( ! isReomvealbe ) {setTimeout(() => {document.querySelector( '.listivo-panel-section__form.listivo-panel-form' ).classList.remove( 'is-in-selecting' );}, 200 );}
            }, 100 );
          }, 100 );
          
          body = document.createElement( 'div' );body.classList.add( 'listivo-psf-tab-body' );
          title = document.createElement( 'span' );title.classList.add( 'listivo-psf-tab-body-title' );
          title.innerHTML = ( e.target.dataset.term_id != 0 ) ? thisClass.i18n.urnowpostingin + ' <b>' + e.target.dataset.title + '</b>' : '<b>' + thisClass.i18n.slctcatulikeblw + '</b>';body.appendChild( title );

          if( hasSubCats ) {
            subcats = cats[ e.target.dataset.nth ].subcats;
            // console.log( subcats );
            div = document.createElement( 'div' );div.classList.add( 'listivo-psf-body-contents' );
            span = document.createElement( 'span' );span.classList.add( 'listivo-psf-body-subcat' );
            span.innerText = 'Sub category';div.appendChild( span );
            ul = document.createElement( 'ul' );ul.classList.add( 'listivo-psf-body-subcategories' );
            subcats.forEach( ( cat, cati ) => {
              li = document.createElement( 'li' );span = document.createElement( 'span' );span.innerHTML = cat.name;li.appendChild( span );ul.appendChild( li );
            } );
            div.appendChild( ul );body.appendChild( div );

            setTimeout(() => {
              document.querySelectorAll( 'ul.listivo-psf-body-subcategories > li' ).forEach( ( li, lI ) => {
                li.addEventListener( 'click', ( lie ) => {
                  var cls = '.listivo-select-v2__placeholder';
                  cls = document.querySelectorAll( cls );
                  if( cls && cls[1] ) {
                      cls = cls[1];cls.click();
                      setTimeout(() => {
                        cls.nextElementSibling.querySelectorAll( '.listivo-select-v2__options .listivo-select-v2__option' ).forEach( ( opt, optI ) => {
                            var title = opt.querySelector( '.listivo-select-v2__value' );
                            if( title && title.innerText == lie.target.innerText ) {
                              // console.log( title.innerText + ' == ' + lie.target.innerText );
                              title.click();if( isReomvealbe ) {document.querySelector( tabswrap ).remove();}
                              else {
                                document.querySelector( "ul.listivo-psf-body-subcategories" ).remove();
                                document.querySelector( tabswrap ).classList.remove( 'is-in-select' );
                              }
                            } else {
                              // console.log( title.innerText + ' IS NOT EQUELTO ' + lie.target.innerText );
                            }
                          } );
                      }, 100 );
                  }
                } );
              } );
            }, 100 );
          }
          
          container.innerHTML = '';container.appendChild( body );
        }
      } );
    } );
  }
}, 1000 );
    }

  }
  new FWPProject_addListingScreen();
})();
