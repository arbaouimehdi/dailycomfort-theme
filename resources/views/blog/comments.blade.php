@php
if (post_password_required()) {
  return;
}
@endphp

<section id="comments" class="comments">
  @if (have_comments())
    <h2>
     {{ number_format_i18n(get_comments_number()) }} Comment(s)
    </h2>

    <ol class="comment-list">
      {!! wp_list_comments([
        'style'       => 'ol',
        'avatar_size' => 65,
        'max_depth'   => 0,
        'short_ping'  => true
        ])
      !!}
    </ol>

  @endif

  @if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments'))
    <div class="alert alert-warning">
      {{ __('Comments are closed.', 'sage') }}
    </div>
  @endif

  @php(comment_form())
</section>
