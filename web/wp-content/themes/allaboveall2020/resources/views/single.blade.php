@extends('layouts.app')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection
</div></div></div>