{{--
  Title: Full-width two columns
  Description: Full width section with two columns and options for background and asterisk.
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
  $imgleft = wp_get_attachment_image_src($block['data']['left_column_image'], 'full')[0];
  $imgright = wp_get_attachment_image_src($block['data']['right_column_image'], 'full')[0];
  $asterisk = 'no-asterisk';
@endphp
@if($block['data']['asterisk'][0] == 'yes')
  @php($asterisk = 'asterisk-yes asterisk-'.$block['data']['asterisk_position'])
@endif
@if($block['data']['background'] == 'image_filter')
<div
  data-{{ $block['id'] }}
  class="full-two-col {{ $block['classes'] }} {{ $asterisk }} bg-img-upload"
  {!! $block['background_image'] ? ' style="background-image: url(' . $block['background_image'] . ')"' : '' !!}
>
@elseif($block['data']['background'] == 'image_plain')
<div
  data-{{ $block['id'] }}
  class="{{ $block['classes'] }} {{ $asterisk }} bg-img-plain" style="background-image: url('');">
@else
<div
  data-{{ $block['id'] }}
  class="{{ $block['classes'] }} {{ $asterisk }} bg-{!! $block['data']['background'] !!}">
@endif
  <div class="full-width-text-inner">
  @if($block['data']['asterisk'][0] == 'yes')
    <div class="asterisk-container"><img src="/wp-content/uploads/2020/04/asterisk-green.png"></div>
  @endif
     {{-- start container --}}
     <div class="container container-inner">
       <div class="row">
          <div class="col-lg-6 mx-auto">
            @if($block['data']['left_column_content'] == 'text')
              <div>{!! $block['data']['left_column_text'] !!}</div>
            @else
              <div><img src="{{ $imgleft }}"></div>
            @endif
          </div>
          <div class="col-lg-6 mx-auto">
            @if($block['data']['right_column_content'] == 'right_embed')
              <div>{!! $block['data']['right_column_embed'] !!}</div>
            @elseif($block['data']['right_column_content'] == 'right_text')
              <div>{!! $block['data']['right_column_text'] !!}</div>
            @else
              <div><img src="{{ $imgright }}"></div>
            @endif
          </div>
       </div>
     </div>
   </div>
</div>
