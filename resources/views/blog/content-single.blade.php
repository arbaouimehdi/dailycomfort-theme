<article @php(post_class())>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @include('blog/entry-meta')
    {{ the_post_thumbnail('full')  }}
  </header>
  <div class="entry-content">
    @php(the_content())
  </div>

  @php(comments_template('blog/comments.blade.php'))
</article>
