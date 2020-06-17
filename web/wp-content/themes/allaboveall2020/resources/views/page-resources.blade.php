@extends('layouts.app')
<div class="content">
      @section('content')
        @while(have_posts()) @php the_post() @endphp
          @include('partials.page-header')
          <h3>Resource Listing</h3>
          @include('components.resourcelist', ['resourcelisting' => App::resource_page()])
          @include('partials.content-page')
        @endwhile
      @endsection
</div>
