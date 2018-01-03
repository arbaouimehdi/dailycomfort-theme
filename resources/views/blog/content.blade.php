<article @php(post_class())>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @include('blog/entry-meta')
    {{ the_post_thumbnail('full')  }}
  </header>
  <div class="entry-summary">
    @php(the_excerpt())
  </div>

  <a href="{{ get_permalink() }}" class="btn btn-light">
    Read More
    <i class="arrow"></i>
  </a>
</article>
