export default {
  init() {
    // JavaScript to be fired on the Woocommerce Pages

    /**
     *
     * Grid & List View Modes
     *
     */
    $('.woocommerce-view-modes a').on('click', function(){

      if ($(this).hasClass('list-mode')) {
        $('.products-list').addClass('list').find('> .col').removeClass('col-md-4');
        $('.woocommerce-view-modes a').removeClass('active');
        $(this).addClass('active');
      }

      else {
        $('.products-list').removeClass('list').find('> div').addClass('col-md-4');
        $('.woocommerce-view-modes a').removeClass('active');
        $(this).addClass('active');
      }

    });

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
