@extends('layouts.app')

@php
  $tag = get_queried_object();
  $tag_des = $tag->description;
  $tag_id = $tag->term_id;
  $image = get_field('featured_image', $tag);
  $tag_content = get_field('taxonomy_content', $tag);
  $slug = $tag->slug;
  $box = get_field('feature_black_box', $tag);
@endphp

@section('content')
<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header-inner">
          <h1>Abortion Coverage in @php(single_term_title())</h1>
        </div>
      </div>
    </div>
  </div>
  <img src="/wp-content/uploads/2020/05/asterisk-white.png" alt="white asterisk" class="header-asterisk" />
</div>
<div class="tag-des background-image">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 offset-lg-1">
        {!! $tag_content !!}
      </div>
      <div class="col-lg-4 text-center">
        <div class="black-box box-shadow list-asterisk-green">
          {!! $box !!}
        </div>
      </div>
    </div>
  </div>
</div>
@include('components.featuredaction', ['featuredaction' => App::actionapp($tag_id, 'action_item')])
  <div class="container mt-5 mb-5">
    <div class="row">
      @include('components.taxlist', ['taxlisting' => App::taxlist($tag_id, 'resource', '3')])
      @include('components.taxlist', ['taxlisting' => App::taxlist($tag_id, 'update', '3')])
    </div>
  </div>
@endsection
