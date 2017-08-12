/**
 * chris
 * http://www.chrisbonfatti.com.br/
 *
 * Theme javascript
 */

(function ($) {
  'use strict';

  $(document).ready(function () {
    if ($('.bxslider')) {
      $('.bxslider').bxSlider({
        auto: true
      });

      $('.slider').css('opacity', '1.0');
    }

  });


})(jQuery);