@extends('layouts.app')

@php
  $tag = get_queried_object();
  $tag_des = $tag->description;
  $tag_id = $tag->term_id;
  $image = get_field('featured_image', $tag);
  $tag_content = get_field('taxonomy_content', $tag);
  $slug = $tag->slug;
@endphp

@section('content')
<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header-inner">
          <h1>@php(single_term_title())</h1>
        </div>
      </div>
    </div>
  </div>
  <img src="/wp-content/uploads/2020/05/asterisk-white.png" alt="white asterisk" class="header-asterisk" />
</div>
<div class="tag-des background-image">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 offset-lg-1">
        {!! $tag_content !!}
      </div>
      <div class="col-lg-6 text-center">
        <div class="black-box box-shadow">
          <h3>The EACH Women Act</h3>
          <ul class="asterisk-list">
            <li>Ensures coverage for abortion for every woman, transgender and gender non-conforming person.</li>
            <li>Stops politicians from interfering in a wooman's decision to get an abortion</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="image">
  <img src="{{ $image }}" alt="{{ $slug }} state image">
</div>
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-lg-6">
        <h3><i class="far fa-file-alt text-green"></i> Resources</h3>
        @include('components.taxlist', ['taxlisting' => App::taxlist($tag_id, 'resource', '3')])
      </div>
      <div class="col-lg-6">
        <h3><i class="fas fa-rss text-green"></i> News</h3>
        @include('components.taxlist', ['taxlisting' => App::taxlist($tag_id, 'news', '2')])
      </div>
    </div>
  </div>
@endsection
