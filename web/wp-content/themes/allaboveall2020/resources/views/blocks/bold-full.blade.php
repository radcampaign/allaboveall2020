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
      <div class="col-lg-8 offset-lg-2 top-text text-center">
        <h2 class="text-white text-uppercase">{!! $block['data']['bold_title'] !!}</h2>
        <p class="text-white text-large">{!! $block['data']['bold_text'] !!}</p>
      </div>
    </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="letter-block">
            @if(!empty($block['data']['b_info_b_link']['url']))
              <div class="letter"><a class="letter-link" href="{!! $block['data']['b_info_b_link']['url'] !!}">B</a></div>
            @else
              <div class="letter">B</div>
            @endif
            <div class="content">
              <h3 class="text-uppercase mt-0">{!! $block['data']['b_info_b_title'] !!}</h3>
              <p>{!! $block['data']['b_info_b_text'] !!}</p>
              @if(!empty($block['data']['b_info_b_link']['url']))
                <a href="{!! $block['data']['b_info_b_link']['url'] !!}">Learn More</a>
              @endif
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="letter-block">
            @if(!empty($block['data']['o_info_o_link']['url']))
              <div class="letter"><a class="letter-link" href="{!! $block['data']['o_info_o_link']['url'] !!}">O</a></div>
            @else
              <div class="letter">O</div>
            @endif
            <div class="content">
              <h3 class="text-uppercase mt-0">{!! $block['data']['o_info_o_title'] !!}</h3>
              <p>{!! $block['data']['o_info_o_text'] !!}</p>
              @if(!empty($block['data']['o_info_o_link']['url']))
                <a href="{!! $block['data']['o_info_o_link']['url'] !!}">Learn More</a>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="letter-block">
            @if(!empty($block['data']['l_info_l_link']['url']))
              <div class="letter"><a class="letter-link" href="{!! $block['data']['l_info_l_link']['url'] !!}">L</a></div>
            @else
              <div class="letter">L</div>
            @endif
            <div class="content">
              <h3 class="text-uppercase mt-0">{!! $block['data']['l_info_l_title'] !!}</h3>
              <p>{!! $block['data']['l_info_l_text'] !!}</p>
              @if(!empty($block['data']['l_info_l_link']['url']))
                <a href="{!! $block['data']['l_info_l_link']['url'] !!}">Learn More</a>
              @endif
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="letter-block">
            @if(!empty($block['data']['d_info_d_link']['url']))
              <div class="letter"><a class="letter-link" href="{!! $block['data']['d_info_d_link']['url'] !!}">D</a></div>
            @else
              <div class="letter">D</div>
            @endif
            <div class="content">
              <h3 class="text-uppercase mt-0">{!! $block['data']['d_info_d_title'] !!}</h3>
              <p>{!! $block['data']['d_info_d_text'] !!}</p>
              @if(!empty($block['data']['d_info_d_link']['url']))
                <a href="{!! $block['data']['d_info_d_link']['url'] !!}">Learn More</a>
              @endif
              @if(!empty($block['data']['d_info_click_to_tweet_link']))
                @if(!empty($block['data']['d_info_click_to_tweet_button_text']))
                  @php($text = $block['data']['d_info_click_to_tweet_button_text'])
                @else
                  @php($text = 'Tweet')
                @endif
                <div class="tweet-block mb-3 mt-3 tweet-block-black">
                  <div class="row tweet-row">
                    <div class="col-lg-3"><i class="fab fa-twitter"></i></div>
                    <div class="col-lg-9">
                      <p>{!! $block['data']['d_info_click_to_tweet_info_text'] !!}</p>
                    </div>
                  </div>
                  <div class="row pb-3">
                    <div class="col-lg-12 mt-3 text-center">
                      <a href="{!! $block['data']['d_info_click_to_tweet_link'] !!}" target="_blank" class="btn btn-black-outline">{{ $text }}</a>
                    </div>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div> 
      </div>
  </div>
</div>