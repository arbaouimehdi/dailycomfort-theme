<div class="date">
  {{ __('By', 'sage') }} {{ get_the_author() }}
  <time class="updated" datetime="{{ get_post_time('c', true) }}">
    {{ get_the_date() }}
  </time>
</div>

