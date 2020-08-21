@extends('layouts.app')
@php
  $statevalue = '';
  $campvalue = '';

  if(!empty($_GET['keyword'])) {
    $key = $_GET['keyword'];
  }
  if(!empty($_GET['state'])) {
    $statevalue = $_GET['state'];
  }
  if(!empty($_GET['campaign'])) {
    $campvalue = $_GET['campaign'];
  }
  if(!empty($_GET['resourcetype'])) {
    $typevalue = $_GET['resourcetype'];
  }
@endphp
      @section('content')
        @while(have_posts()) @php the_post() @endphp
          @include('partials.page-header')
          @include('partials.content-page')
        @endwhile
        <div class="content-filters">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <form method="GET" action="/resources" class="resource-filter-form">
                  @include('components.state_select', ['state_select' => App::stateFilter($statevalue)])
                  @include('components.camp_select', ['campaign_select' => App::campaignFilter($campvalue)])
                  @include('components.type_select', ['type_select' => App::typeFilter($typevalue)])
                  <div class="filter-control"><input type="text" name="keyword" placeholder="Enter Keyword" value="{{ $key }}"  class="form-control" /></div>
                  <input type="submit" class="btn btn-black mr-3" value="Filter" />
                  <a href="/resources" class="reset text-small">Reset</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        @include('components.resourcelist', ['contentlist' => App::listing_page('resource')])
        @include('partials.joinblock-bg')
      @endsection
