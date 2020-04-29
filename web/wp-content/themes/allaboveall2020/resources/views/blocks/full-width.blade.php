{{--
  Title: Full-width text section
  Description: Full width section with a content area and options for background color or image.
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
@php($asterisk = 'no-asterisk')
@if($block['data']['asterisk'][0] == 'yes')
  @php($asterisk = 'asterisk-yes asterisk-'.$block['data']['asterisk_position'])
@endif
@if($block['data']['background'] == 'image_filter')
<div
  data-{{ $block['id'] }}
  class="{{ $block['classes'] }} {{ $asterisk }}  border bg-img-upload"
  {!! $block['background_image'] ? ' style="background-image: url(' . $block['background_image'] . ')"' : '' !!}
>
@elseif($block['data']['background'] == 'image_plain')
<div
  data-{{ $block['id'] }}
  class="{{ $block['classes'] }} {{ $asterisk }} border bg-img-plain"
  {!! $block['background_image'] ? ' style="background-image: url(/)"' : '' !!}>
@else
<div
  data-{{ $block['id'] }}
  class="{{ $block['classes'] }} {{ $asterisk }} border">
@endif
  <div class="full-width-text-inner">
  @if($block['data']['asterisk'][0] == 'yes')
    <div class="asterisk-container"><img src="/wp-content/uploads/2020/04/asterisk-green.png"></div>
  @endif
     {{-- start container --}}
     <div class="container container-inner">
       <div class="row">
        @if($block['data']['columns'] == 'one')
          <div class="col-lg-10 mx-auto">
            {!! $block['data']['one_column_wiswyg'] !!}
          </div>
        @elseif($block['data']['columns'] == 'two')
          <div class="col-lg-6 mx-auto">
            {!! $block['data']['left_column_text'] !!}
          </div>
          <div class="col-lg-6 mx-auto">
            @if($block['data']['right_column_content'] == 'right_embed')
              <div>{!! $block['data']['right_column_embed'] !!}</div>
            @elseif($block['data']['right_column_content'] == 'right_text')
              <div>{!! $block['data']['right_column_text'] !!}</div>
            @else
              <div>{{!! $block['data']['right_column_image'] !!}}</div>
            @endif
          </div>
        @endif
       </div>
     </div>
   </div>
</div>
