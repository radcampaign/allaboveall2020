{{--
  Title: Full-width one column
  Description: Full width section with one column and options for background and asterisk.
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
  $asterisk = 'no-asterisk';
@endphp
@if($block['data']['asterisk'][0] == 'yes')
  @php($asterisk = 'asterisk-yes asterisk-'.$block['data']['asterisk_position'])
@endif
@if($block['data']['background'] == 'image_filter')
<div
  data-{{ $block['id'] }}
  class="full-one-col {{ $block['classes'] }} {{ $asterisk }} bg-img-upload"
  {!! $block['background_image'] ? ' style="background-image: url(' . $block['background_image'] . ')"' : '' !!}
>
@elseif($block['data']['background'] == 'image_plain')
<div
  data-{{ $block['id'] }}
  class="{{ $block['classes'] }} {{ $asterisk }} bg-img-plain" style="background-image: url('/wp-content/uploads/2020/06/bgd-texture.jpg'); background-position: cover; background-repeat: repeat;">
@else
<div
  data-{{ $block['id'] }}
  class="{{ $block['classes'] }} {{ $asterisk }} bg-{!! $block['data']['background'] !!}">
@endif
  <div class="full-width-text-inner">
  @if($block['data']['asterisk'][0] == 'yes')
    <div class="asterisk-container"><img src="/wp-content/themes/allaboveall2020/dist/images/asterisk-new.png"></div>
  @endif
     {{-- start container --}}
     <div class="container container-inner">
       <div class="row">
          <div class="col-lg-10 mx-auto">
            {{ the_field('one_column_wiswyg') }}
          </div>
       </div>
     </div>
   </div>
</div>
