@if(!empty($camplisting))
@php
  $b = false;
  if($camplisting[0]['tax'] == 'Update') {
    $title = 'News';
  }
  else {
    $title = $camplisting[0]['tax'].'s';
  }
@endphp
  <div class="col-lg-6">
    <h3><i class="{{ $camplisting[0]['icon'] }} text-green"></i> {{ $title }}</h3>
    <ul class="pl-0 list-style-none tax-list">
      @foreach($camplisting as $n)
        @php
          if(!$b) {
            $b = true;
            continue;
          }
        @endphp
        <li class="tax-list-item">
          <h4><a href="{{ $n['url'] }}">{{ $n['title'] }}</a></h4>
          @if((!empty($n['date'])))
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
      <a href="{{ $n['url'] }}" class="btn btn-white btn-black-outline uppercase">More {{ $title }}</a>
  </div>
@endif