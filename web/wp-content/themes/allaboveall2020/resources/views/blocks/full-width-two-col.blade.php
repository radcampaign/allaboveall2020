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
  $imgleft = wp_get_attachment_image_src($block['data']['left_column_image'], 'full', false)[0];
  $imgright = wp_get_attachment_image_src($block['data']['right_column_image'], 'full', false)[0];
  $imgstat = wp_get_attachment_image_src($block['data']['right_column_statistics_image'], 'full', false)[0];
  $asterisk = 'no-asterisk';
  $statnums = get_field('statistics_two_numbers');
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
  class="{{ $block['classes'] }} {{ $asterisk }} bg-img-plain" style="background-image: url('/wp-content/uploads/2020/06/bgd-texture.jpg'); background-position: cover; background-repeat: repeat;">
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
        @if($block['data']['column_width'] == 'narrow')
          <div class="col-lg-10 offset-lg-1">
            <div class="row">
        @endif
        @if($block['data']['right_column_content'] == 'statistics')
          <div class="col-lg-8">
            <div class="map-left">
              {!! $block['data']['state_column_text'] !!}
              @include('components.statelist', ['statetermlist' => App::stateTerms()])
            </div>
          </div>
          <div class="col-lg-4">
            <div class="black-box text-center">
              @if($block['data']['statistics_options'] == 'numbers')
                <div class="stats-trio">
                  <div class="num-large">{{ $statnums['first_number'] }}</div>
                  <div class="text-mid">{{ $statnums['middle_text'] }}</div>
                  <div class="num-large">{{ $statnums['second_number'] }}</div>
                </div>
              @elseif($block['data']['statistics_options'] == 'number')
                <div class="stats-large-num">
                  {!! $block['data']['statistic_one_large_number'] !!}
                </div>
              @endif
              <div class="mb-3">
                {!! $block['data']['right_column_statistics_text'] !!}
              </div>
              <img src="{{ $imgstat }}" />
            </div>
          </div>
          @if($block['data']['column_width'] == 'narrow')
              </div>
            </div>
          @endif
        @else
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
        @endif
       </div>
     </div>
   </div>
</div>
