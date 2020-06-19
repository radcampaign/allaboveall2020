@php
/*
 * Template Name: Content container
 * description: >-
  Page template without sidebar
 */
@endphp
@extends('layouts.app-container')
  <div class="content">
    @section('content')
      @while(have_posts()) @php the_post() @endphp
        @include('partials.page-header')
        @include('partials.content-page-container')
      @endwhile
    @endsection
  </div>