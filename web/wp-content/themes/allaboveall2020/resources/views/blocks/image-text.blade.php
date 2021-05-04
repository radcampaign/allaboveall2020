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
          @if($block['data']['cols'][0] == 'yes')
            <div class="col-lg-12">
          @else
            <div class="col-lg-6">
          @endif
            </div>
       </div>
     </div>
   </div>
</div>
