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

<div
  data-{{ $block['id'] }}
  class="{{ $block['classes'] }} border mb-4 mt-4 p-4"
  {!! $block['background_image'] ? ' style="background-image: url(' . $block['background_image'] . ')"' : '' !!}
>
@if($block['data']['asterisk'][0] == 'yes')
  <div class="asterisk asterisk-{!! $block['data']['asterisk_position'] !!}">Asterisk</div>
@endif
   {{-- start container --}}
   <div class="container">
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
          <div>{!! $block['data']['right_column_text'] !!}</div>
        </div>
      @endif
     </div>
   </div>
</div>
