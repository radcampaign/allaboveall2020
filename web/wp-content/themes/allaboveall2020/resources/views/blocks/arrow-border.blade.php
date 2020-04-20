{{--
  Title: Arrow border block
  Description: Full width section with 2 columns and a border and an arrow.
  Category: layout
  Icon: star-filled
  Keywords: arrow border
  Mode: edit
  Align: none
  PostTypes: page post
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}
<div class="arrow-block">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 arrow-border">
        <div class="arrow">
          <div class="icon"><i class="fas fa-arrow-up"></i></div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            {!! $block['data']['left_column_text_area'] !!}
          </div>
          <div class="col-lg-6">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>