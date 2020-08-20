// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

import { config } from '@fortawesome/fontawesome-svg-core';
// import then needed Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';
// import the icons
import { faFacebookF, faTwitter, faInstagram } from '@fortawesome/free-brands-svg-icons';
import { faSearch, faArrowUp, faBars, faRss } from '@fortawesome/free-solid-svg-icons';
import { faFileAlt, faTimesCircle, faAngleDown, faCopyright, faExternalLinkAlt } from '@fortawesome/pro-regular-svg-icons';
import { faFilePdf } from '@fortawesome/pro-light-svg-icons';

// add the imported icons to the library
library.add(faFacebookF, faTwitter, faInstagram, faSearch, faArrowUp, faBars, faRss, faFileAlt, faTimesCircle, faAngleDown, faFilePdf, faCopyright, faExternalLinkAlt);
config.searchPseudoElements = true;

// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();
$('iframe.advocacy-actionwidget-iframe').attr('scrolling', 'none');

$(document).ready(function() { 
  $('.wp-block-group__inner-container').addClass('container');
  $('.wp-block-columns').addClass('row');
  $('.wp-block-column').addClass('col');
  $('.dropdown-item.child-active').parents('.nav-item').addClass('active');
  /*var headerTopHeight = ''; 
  headerTopHeight = $('.header-top').height();
  $('.header-background-bar').height(headerTopHeight);*/

  $('#dynamic_select').on('change', function () {
    var url = $(this).val(); // get selected value
    if (url) { // require a URL
        window.location = url; // redirect
    }
    return false;
  });
  if(! $('#campaignResourceUpdateRow').children().length > 0 ) {
    $('#campaignResourceUpdateRow').parents('.bg-gray').addClass('hide');
  }
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
