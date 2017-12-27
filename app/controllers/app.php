<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller {

  /**
   * @return string
   */
  public function siteName(){
    return get_bloginfo('name');
  }

  /**
   * @return string
   */
  public static function title(){
    if (is_home()) {
      if ($home = get_option('page_for_posts', true)) {
        return get_the_title($home);
      }
      return __('Latest Posts', 'sage');
    }
    if (is_archive()) {
      return get_the_archive_title();
    }
    if (is_search()) {
      return sprintf(__('Search Results for %s', 'sage'), get_search_query());
    }
    if (is_404()) {
      return __('Not Found', 'sage');
    }
    return get_the_title();
  }

  /**
   * @return string
   */
  public static function breadcrumbs(){
    if (!is_front_page()) {
      $sep = ' / ';
      // Start the breadcrumb with a link to your homepage
      echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_permalink(get_option( 'page_for_posts' ));
        echo '">';
        bloginfo('name');
        echo '</a>'.$sep;
        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
          $current_category = get_the_category()[0];
          $current_category_url = get_term_link($current_category->cat_ID);
          echo "<a href='$current_category_url'>";
          echo $current_category->name;
          echo "</a>";
        }
        elseif (is_archive() || is_single()){
          if ( is_day() ) {
            printf( __( '%s', 'text_domain' ), get_the_date() );
          }
          elseif ( is_month() ) {
            printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
          }
          elseif ( is_year() ) {
            printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
          }
          else {
            _e( 'Blog Archives', 'text_domain' );
          }
        }
        // If the current page is a single post, show its title with the separator
        if (is_single()) {
          echo $sep;
          the_title();
        }
        // If the current page is a static page, show its title.
        if (is_page()) {
          echo the_title();
        }
        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
          global $post;
          $page_for_posts_id = get_option('page_for_posts');
          if ($page_for_posts_id) {
            $post = get_page($page_for_posts_id);
            setup_postdata($post);
            the_title();
            rewind_posts();
          }
        }
      echo '</div>';
    }
  }

}
