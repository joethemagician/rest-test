
// Load Angular JS
require('angular');


// jQuery and bootstrap.js

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

