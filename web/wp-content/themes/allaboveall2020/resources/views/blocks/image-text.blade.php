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
      @if(!empty($block['data']['section_title']))
        <div class="row">
          <div class="col-lg-12">
            <h2>{!! $block['data']['section_title'] !!}</h2>
          </div>
        </div>
      @endif
       <div class="row">
          @php
            $rows = get_field('row');
            if( $rows ) {
              foreach( $rows as $row ) {
                if($block['data']['columns'] == 'one') {
                  echo '<div class="col-lg-12 mb-5 mt-3">';
                }
                else {
                  echo '<div class="col-lg-6 mb-5">';
                }
                echo '<div class="row"><div class="col-lg-4 text-center">';
                if(!empty($row['image'])) {
                  $image = $row['image'];
                  echo '<img src="'.$image.'">';
                }
                
                echo '</div><div class="col-lg-8">'.$row['text'].'</div></div></div>';
              }
            }
          @endphp
       </div>
     </div>
   </div>
</div>
