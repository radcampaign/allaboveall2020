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
import { faFileAlt, faTimesCircle, faAngleDown, faCopyright } from '@fortawesome/pro-regular-svg-icons';
import { faFilePdf } from '@fortawesome/pro-light-svg-icons';

// add the imported icons to the library
library.add(faFacebookF, faTwitter, faInstagram, faSearch, faArrowUp, faBars, faRss, faFileAlt, faTimesCircle, faAngleDown, faFilePdf, faCopyright);
config.searchPseudoElements = true;

// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();

$(document).ready(function() { 
  var headerTopHeight = ''; 
  headerTopHeight = $('.header-top').outerHeight();
  $('.header-background-bar').height(headerTopHeight);

  $('#dynamic_select').on('change', function () {
    var url = $(this).val(); // get selected value
    if (url) { // require a URL
        window.location = url; // redirect
    }
    return false;
  });
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
