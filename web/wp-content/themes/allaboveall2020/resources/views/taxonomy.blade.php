@extends('layouts.app')

@php
  $tag = get_queried_object();
  $tagarray = get_object_vars($tag);
  $tag_des = $tagarray['description'];
  $tag_id = $tagarray['term_id'];
  $image = get_field('featured_image', $tagarray);
  $tag_content = get_field('taxonomy_content', $tag);
  $slug = $tagarray['slug'];
  $box = get_field('feature_black_box', $tag);
  $join = get_field('show_join_form', $tag);
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
</div>
@if(!empty($tag_content))
<div class="tag-des background-image">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
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
@endif
@include('components.featuredaction', ['featuredaction' => App::actionappcamp($tag_id, 'action_item')])
<div class="bg-gray">
  <div class="container pt-3 pb-5">
    <div class="row" id="campaignResourceUpdateRow">
      @include('components.camplist', ['camplisting' => App::campaignlist($slug, 'resource', '3', $tag_id)])
      @include('components.camplist', ['camplisting' => App::campaignlist($slug, 'update', '3', $tag_id)])
    </div>
  </div>
</div>
  @if($join[0] == 'yes')
    @include('partials.joinblock')
  @endif
@endsection
