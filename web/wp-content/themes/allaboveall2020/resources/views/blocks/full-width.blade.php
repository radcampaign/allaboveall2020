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
         {{-- title --}}
         @if ($block['title'])
           <h2 class="{{ $block['background_image'] ? 'display-3' : 'h1' }} section-title">{{ $block['title'] }}</h2>
         @endif
         {!! $block['content'] !!}
       </div>
     </div>
   </div>
</div>
