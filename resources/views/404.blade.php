@extends('layouts.app')

@section('content')
  <div class="page-container">
    @if (!have_posts())
      <section>
        <header>
          <h1>404</h1>
          <h2>Page Not Found!</h2>
          <a href="#" class="btn btn-light">
            Back to homepage
            <i class="arrow"></i>
          </a>
        </header>
      </section>
    @endif
  </div>

@endsection
