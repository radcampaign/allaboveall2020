@extends('layouts.app')
<div class="content">
      @section('content')
        @while(have_posts()) @php the_post() @endphp
          @include('partials.page-header')
          <h3>Resource Listing</h3>
          
          @include('partials.content-page')
        @endwhile
      @endsection
</div>
