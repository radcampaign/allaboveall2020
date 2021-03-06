@if(!empty($taxlisting))
@php
  $b = false;
  if($taxlisting[0]['tax'] == 'Update') {
    $title = 'News';
  }
  else {
    $title = $taxlisting[0]['tax'].'s';
  }
@endphp
  <div class="col-lg-6">
    <h3><i class="{{ $taxlisting[0]['icon'] }} text-green"></i> {{ $title }}</h3>
    <ul class="pl-0 list-style-none tax-list">
      @foreach($taxlisting as $n)
        @php
          if(!$b) {
            $b = true;
            continue;
          }
        @endphp
        <li class="tax-list-item">
          @if($n['posttype'] == 'news')
            @if(!empty($n['link']))
              <h4><a href="{{ $n['link'] }}" target="_blank">{!! $n['title'] !!}</a><i class="far fa-external-link-alt"></i></h4>
            @else
              <h4><a href="{{ $n['url'] }}"> {!! $n['title'] !!}</a></h4>
            @endif
          @else
            <h4><a href="{{ $n['url'] }}">{!! $n['title'] !!}</a></h4>
          @endif
          @if((!empty($n['date'])))
            <div class="meta">
              <div class="date">{{ $n['date'] }}</div>
              @if($n['posttype'] == 'news')
                <div class="name">{{ $n['name'] }}</div>
              @endif
            </div>
          @endif
          @if(!empty($n['excerpt']))
            <div class="excerpt">
              {!! $n['excerpt'] !!}
            </div>
          @endif
        </li>
      @endforeach
    </ul>
      <a href="/{{ $taxlisting[0]['base'] }}?state={{ $taxlisting[0]['baseid'] }}" class="btn btn-white btn-black-outline uppercase">More {{ $title }}</a>
  </div>
@endif