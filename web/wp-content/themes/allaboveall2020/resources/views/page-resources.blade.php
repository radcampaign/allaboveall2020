@extends('layouts.app')
<div class="content">
      @section('content')
        @while(have_posts()) @php the_post() @endphp
          @include('partials.page-header')
          @include('partials.content-page')
        @endwhile
        @include('components.resourcelist', ['resourcelist' => App::resource_page()])
      @endsection
</div>
