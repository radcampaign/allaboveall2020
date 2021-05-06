{{--
  Title: Homepage hero block
  Description: Full width section with two columns for the homepage.
  Category: layout
  Icon: star-filled
  Keywords: full image text
  Mode: edit
  Align: none
  PostTypes: page
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}
@php
  $heroimg = wp_get_attachment_image_src($block['data']['background_image'], 'full', false)[0];
@endphp
<div
  data-{{ $block['id'] }}
  class="homepage-hero {{ $block['classes'] }} bg-img-upload" style="background-image: url('{{ $heroimg }}'); background-position: cover;">
  <div class="full-width-text-inner">
    <div class="container container-inner">
      <div class="row">
        <div class="col-lg-5">
          <h1 class="display-1">
            <div class="hero-top">{!! $block['data']['left_headline_top'] !!}</div>
            <div class="hero-bottom">{!! $block['data']['left_headline_bottom'] !!}</div>
          </h1>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="right-body mb-3">{!! $block['data']['right_text'] !!}</div>
          <a href="{!! $block['data']['button_url'] !!}" class="btn btn-green">{{ $block['data']['button_text'] }}</a>
        </div>
      </div>
    </div>
  </div>
</div>
