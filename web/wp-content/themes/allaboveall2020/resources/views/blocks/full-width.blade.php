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
  class="{{ $block['classes'] }}"
  {!! $block['background_image'] ? ' style="background-image: url(' . $block['background_image'] . ')"' : '' !!}
>
   {{-- start container --}}
   <div class="container">
     <div class="row">
       <div class="col-lg-10 mx-auto">
        <p>Columns - {{ $block['data']['columns'] }}</p>
        <p>Asterisk - {{ $block['data']['asterisk'][0] }}</p>
        <p>Asterisk Position - {{ $block['data']['asterisk_position'] }}</p>
        <div>One Col WYSIWYG</div>
        <div>{!! $block['data']['one_column_wiswyg'] !!}</div>
         <pre>{{ var_dump($block['data']) }}</pre>
       </div>
     </div>
   </div>
</div>
