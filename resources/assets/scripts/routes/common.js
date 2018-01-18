export default {
  init() {
    // JavaScript to be fired on all pages

    /**
     *
     * Remove item from cart list
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
        data: {action : 'removeItemFromCart','product_id': product_id},
        success: function(data){

          console.log(data);

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

    /**
     *
     * Add item to cart list
     *
     */
    $('.add-to-cart').click(function(){
      let product_id = $(this).data().productId;
      let product_quantity = $(this).data().productQuantity;

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "/wp-admin/admin-ajax.php",
        data: {action : 'addItemToCart', 'product_id': product_id, 'product_quantity': product_quantity},
        success: function(data){
          console.log(data);
        },
      });
      return false;
    });

    /**
     *
     * Toggle Search
     *
     */
    $('.nav-search a').click(function(){
      $('.main-header  .search').show();
    });

    $('.search .la-close').click(function(){
      $('.main-header .search').hide();
    })

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
