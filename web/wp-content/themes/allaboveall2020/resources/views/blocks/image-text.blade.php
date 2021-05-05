{{--
  Title: Staff Image & Text
  Description: Full width section with image and text, 1 or 2 columns
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

<div data-{{ $block['id'] }} class="full-image-text {{ $block['classes'] }}>
  <div class="full-width-text-inner">
     {{-- start container --}}
     <div class="container container-inner">
       <div class="row">
          @if($block['data']['columns'] == 'one')
            <div class="col-lg-12">
          @else
            <div class="col-lg-6">
          @endif
              <div class="col-lg-3 text-right">{{ $block['data']['image'] }}</div>
              <div class="col-lg-9">{{ $block['data']['text'] }}</div>
            </div>
       </div>
     </div>
   </div>
</div>
