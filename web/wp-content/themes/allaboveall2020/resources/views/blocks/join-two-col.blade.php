{{--
  Title: Join 2 column block
  Description: Two column join us form embed
  Category: layout
  Icon: star-filled
  Keywords: join
  Mode: edit
  Align: none
  PostTypes: page
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

<div class="container">
  <div class="row">
    <div class="col-lg-3 offset-lg-1">
      <h2>{!! $block['data']['left_headline'] !!}</h2>
    </div>
    <div class="col-lg-7">
      {!! $block['data']['right_embed'] !!}
    </div>
  </div>
</div>
