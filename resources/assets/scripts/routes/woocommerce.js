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
        $('.products-list').addClass('list');
        $('.woocommerce-view-modes a').removeClass('active');
        $(this).addClass('active');
      }

      else {
        $('.products-list').removeClass('list');
        $('.woocommerce-view-modes a').removeClass('active');
        $(this).addClass('active');
      }

    });

    /**
     *
     * Remove an item list
     *
     */
    $('.remove-item').click(function(){
      let product_id = $(this).data().productId;
      let list       = $(this).closest('li');
      list.append('<div class="remove-item-preloader"></div>');

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "/wp-admin/admin-ajax.php",
        data: {action : 'remove_item_from_cart','product_id' : product_id},
        success: function(){

          list.remove();
          $('.remove-item-preloader').remove();

          // If no product is left on the list
          if ($('.menu-sc-list ul li').length < 1) {
            $('.menu-sc-list').html('<p>No products in the cart. No products in the cart.</p>');
          }

        },
      });
      return false;
    });

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
