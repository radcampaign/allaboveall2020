{{--
  Title: BOLD block
  Description: BOLD section
  Category: layout
  Icon: star-filled
  Keywords: bold
  Mode: edit
  Align: none
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}
<div class="bold-block">
  <div class="container">
    <div class="row">
      <div class="row">
        <div class="col-lg-6">
          {!! $block['data']['b_text_area'] !!}
        </div>
        <div class="col-lg-6">
          {!! $block['data']['o_text_area'] !!}
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          {!! $block['data']['l_text_area'] !!}
        </div>
        <div class="col-lg-6">
          {!! $block['data']['d_text_area'] !!}
        </div>
      </div>
    </div>
  </div>
</div>