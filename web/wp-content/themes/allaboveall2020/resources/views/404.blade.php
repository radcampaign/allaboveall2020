@extends('layouts.app')

@section('content')
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="page-header-inner">
            <h1>Oops!</h1>
          </div>
        </div>
      </div>
    </div>
    <img src="/wp-content/uploads/2020/05/asterisk-white.png" alt="white asterisk" class="header-asterisk" />
  </div>
  @if (!have_posts())
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          {{ __('The page you were trying to view could not be found.', 'sage') }}
          <div class="search-form col-lg-4 mt-5 mb-5">
            {!! get_search_form(false) !!}
          </div>
        </div>
      </div>
    </div>
  
  @endif
@endsection
