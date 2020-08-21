@php
/*
 * Template Name: Content container
 * description: >-
  Page template without sidebar
 */
@endphp
@extends('layouts.app-container')
    @section('content')
      @while(have_posts()) @php the_post() @endphp
        @include('partials.page-header')
        @include('partials.content-page')
      @endwhile
    @endsection