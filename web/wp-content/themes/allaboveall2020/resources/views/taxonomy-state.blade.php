@extends('layouts.app')

@php
  $tag = get_queried_object();
  $tag_des = $tag->description;
  $tag_id = $tag->term_id;
  $image = get_field('featured_image', $tag);
  $tag_content = get_field('taxonomy_content', $tag);
  $slug = $tag->slug;
  $box = get_field('feature_black_box', $tag);
  $boxcheck = get_field('add_featured_black_box', $tag);
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
</div>
<div class="tag-des background-image">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        {!! $tag_content !!}
      </div>
      <div class="col-lg-4">
        @if($boxcheck[0] == 'yes')
          <div class="black-box box-shadow list-asterisk-green">
            {!! $box !!}
          </div>
        @else
          <div class="state-box list-asterisk-green">
            @include('components.statedropdown', ['statedropdown' => App::mapapp()])
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
@include('components.featuredaction', ['featuredaction' => App::actionapp($tag_id, 'action_item')])
<div class="bg-gray">
  <div class="container pt-3 pb-5">
    <div class="row">
      @include('components.taxlist', ['taxlisting' => App::taxlist($tag_id, 'resource', '3')])
      @include('components.taxlist', ['taxlisting' => App::taxlist($tag_id, 'update', '3')])
    </div>
  </div>
</div>
  @include('partials.joinblock')
@endsection
