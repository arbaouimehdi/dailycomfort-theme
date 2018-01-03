<?php

namespace Blog;

use Sober\Controller\Controller;

class Blog extends Controller {

  /**
   * @return array|string|void
   */
  public static function posts_pagination() {
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    echo paginate_links(
      array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => __('Prev'),
	      'next_text' => __('Next'),
      )

    );
  }

}