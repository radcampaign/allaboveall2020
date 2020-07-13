{{--
  Title: BOLD two columns block
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
      <div class="col-lg-6 offset-lg-3 top-text text-center">
        <h2 class="text-white text-uppercase">{!! $block['data']['bold_title'] !!}</h2>
        <p class="text-white text-large">{!! $block['data']['bold_text'] !!}</p>
      </div>
    </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="letter-block">
            <div class="letter"><a class="letter-link" href="{!! $block['data']['b_info_b_link']['url'] !!}">B<a></div>
            <div class="content">
              <h3 class="text-uppercase mt-0">{!! $block['data']['b_info_b_title'] !!}</h3>
              <p>{!! $block['data']['b_info_b_text'] !!}</p>
              <a href="{!! $block['data']['b_info_b_link']['url'] !!}">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="letter-block">
            <div class="letter"><a class="letter-link" href="{!! $block['data']['o_info_o_link']['url'] !!}">O</a></div>
            <div class="content">
              <h3 class="text-uppercase mt-0">{!! $block['data']['o_info_o_title'] !!}</h3>
              <p>{!! $block['data']['o_info_o_text'] !!}</p>
              <a href="{!! $block['data']['o_info_o_link']['url'] !!}">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="letter-block">
            <div class="letter"><a class="letter-link" href="{!! $block['data']['l_info_l_link']['url'] !!}">L</a></div>
            <div class="content">
              <h3 class="text-uppercase mt-0">{!! $block['data']['l_info_l_title'] !!}</h3>
              <p>{!! $block['data']['l_info_l_text'] !!}</p>
              <a href="{!! $block['data']['l_info_l_link']['url'] !!}">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="letter-block">
            <div class="letter"><a class="letter-link" href="{!! $block['data']['d_info_d_link']['url'] !!}">D</a></div>
            <div class="content">
              <h3 class="text-uppercase mt-0">{!! $block['data']['d_info_d_title'] !!}</h3>
              <p>{!! $block['data']['d_info_d_text'] !!}</p>
              <a href="{!! $block['data']['d_info_d_link']['url'] !!}">Learn More</a>
            </div>
          </div>
        </div> 
      </div>
  </div>
</div>