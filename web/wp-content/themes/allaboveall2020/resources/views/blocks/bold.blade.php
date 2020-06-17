{{--
  Title: BOLD one column block
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
<div class="bold-block bold-tall">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 top-text text-center">
        <h2 class="text-uppercase">{!! $block['data']['bold_title'] !!}</h2>
        <p class="text-large">{!! $block['data']['bold_text'] !!}</p>
      </div>
    </div>
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="letter-block">
            <div class="letter">B</div>
            <div class="content">
              <h3 class="text-uppercase">{!! $block['data']['b_info_b_title'] !!}</h3>
              <p>{!! $block['data']['b_info_b_text'] !!}</p>
              @if(!empty($block['data']['b_info_b_link']['url']))
                <a href="{!! $block['data']['b_info_b_link']['url'] !!}" class="btn btn-white-outline">Learn More</a>
              @endif
            </div>
          </div>
        </div>
        <div class="col-lg-8 offset-lg-2">
          <div class="letter-block">
            <div class="letter">O</div>
            <div class="content">
              <h3 class="text-uppercase">{!! $block['data']['o_info_o_title'] !!}</h3>
              <p>{!! $block['data']['o_info_o_text'] !!}</p>
              @if(!empty($block['data']['o_info_o_link']['url']))
                <a href="{!! $block['data']['o_info_o_link']['url'] !!}" class="btn btn-white-outline">Learn More</a>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="letter-block">
            <div class="letter">L</div>
            <div class="content">
              <h3 class="text-uppercase">{!! $block['data']['l_info_l_title'] !!}</h3>
              <p>{!! $block['data']['l_info_l_text'] !!}</p>
              @if(!empty($block['data']['l_info_l_link']['url']))
                <a href="{!! $block['data']['l_info_l_link']['url'] !!}" class="btn btn-white-outline">Learn More</a>
              @endif
            </div>
          </div>
        </div>
        <div class="col-lg-8 offset-lg-2">
          <div class="letter-block">
            <div class="letter">D</div>
            <div class="content">
              <h3 class="text-uppercase">{!! $block['data']['d_info_d_title'] !!}</h3>
              <p>{!! $block['data']['d_info_d_text'] !!}</p>
              @if(!empty($block['data']['d_info_d_link']['url']))
                <a href="{!! $block['data']['d_info_d_link']['url'] !!}" class="btn btn-white-outline">Learn More</a>
              @endif
            </div>
          </div>
        </div>
      </div>
  </div>
</div>