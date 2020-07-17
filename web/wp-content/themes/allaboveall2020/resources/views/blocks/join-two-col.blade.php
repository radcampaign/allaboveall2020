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
    $asteriskblock = '<div class="asterisk-container"><img src="/wp-content/uploads/2020/04/asterisk-green.png"></div>';
  }
  
@endphp
<div class="data-{{ $block['id'] }} {{ $asterisk }}">
  <div class="full-width-text-inner">
    {!! $asteriskblock !!}
    <div class="container container-inner">
      <div class="row join-embed">
        <div class="col-lg-3 offset-lg-1">
          <h2>{!! $block['data']['left_headline'] !!}</h2>
        </div>
        <div class="col-lg-5 offset-lg-1">
          {!! $block['data']['right_embed'] !!}
        </div>
      </div>
    </div>
  </div>
</div>
