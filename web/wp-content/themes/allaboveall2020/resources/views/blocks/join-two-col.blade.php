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
@php
  $asterisk = 'no-asterisk';
  if($block['data']['asterisk'][0] == '1') {
    $asterisk = 'asterisk-yes asterisk-right join-asterisk';
    $asteriskblock = '<div class="asterisk-container"><img src="/wp-content/themes/allaboveall2020/dist/images/asterisk-new.png"></div>';
  }
@endphp
{{ $opendiv }}
  @if($block['data']['join_embed_background'] == 'default')
    <div class="data-{{ $block['id'] }} {{ $asterisk }} pt-5 pb-5" style="background-image: url('/wp-content/uploads/2020/06/bgd-texture.jpg'); background-position: cover; background-repeat: repeat;">
  @else
    <div class="data-{{ $block['id'] }} {{ $asterisk }} bg-white">
  @endif
  <div class="full-width-text-inner">
    {!! $asteriskblock !!}
    <div class="container container-inner">
      <div class="row join-embed">
        <div class="col-lg-5">
          <h2>{!! $block['data']['left_headline'] !!}</h2>
        </div>
        <div class="col-lg-5 offset-lg-1">
          {!! $block['data']['right_embed'] !!}
        </div>
      </div>
    </div>
  </div>
</div>
