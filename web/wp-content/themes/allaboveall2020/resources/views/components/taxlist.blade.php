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
          <h4><a href="{{ $n['url'] }}">{{ $n['title'] }}</a></h4>
          @if((!empty($n['date'])) && ($n['posttype'] == 'news'))
            <div class="date">{{ $n['date'] }}</div>
          @endif
          @if(!empty($n['excerpt']))
            <div class="excerpt">
              {!! $n['excerpt'] !!}
            </div>
          @endif
        </li>
      @endforeach
    </ul>
    @if(substr($n['posttype'], -1) == 's')
      <a href="{{ $n['url'] }}" class="btn btn-white btn-black-outline uppercase">More {{ $n['posttype'] }}</a>
    @else
      <a href="{{ $n['url'] }}" class="btn btn-white btn-black-outline uppercase">More {{ $n['posttype'] }}s</a>
    @endif
  </div>
@endif