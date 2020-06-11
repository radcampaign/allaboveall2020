@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
<div class="container">
  <div class="row">
    <div class="col-lg-10 offset-lg-1">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-search')
      @endwhile
      {!! get_the_posts_navigation() !!}
    </div>
  </div>
</div>
@endsection
