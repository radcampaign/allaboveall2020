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
@if($block['data']['background'] == 'image_filter')
<div
  data-{{ $block['id'] }}
  class="homepage-hero {{ $block['classes'] }} bg-img-upload"
  {!! $block['background_image'] ? ' style="background-image: url(' . $block['background_image'] . ')"' : '' !!}
>
@elseif($block['data']['background'] == 'image_plain')
<div
  data-{{ $block['id'] }}
  class="{{ $block['classes'] }} bg-img-plain"
  {!! $block['background_image'] ? ' style="background-image: url(/)"' : '' !!}>
@else
<div
  data-{{ $block['id'] }}
  class="{{ $block['classes'] }}">
@endif
  <div class="full-width-text-inner">
     {{-- start container --}}
     <div class="container container-inner">
       <div class="row">
          <div class="col-lg-6 mx-auto">
            <h1>{!! $block['data']['left_headline'] !!}</h1>
          </div>
          <div class="col-lg-6 mx-auto">
            <div class="right-body">{!! $block['data']['right_text'] !!}</div>
            <a href="{!! $block['data']['button_url'] !!}" class="btn btn-green">{!! $block['data']['button_text'] !!}</a>
          </div>
       </div>
     </div>
   </div>
</div>
