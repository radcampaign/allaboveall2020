<ul class="pl-0 list-style-none tax-list">
  @foreach($taxlisting as $n)
    <li class="tax-list-item">
      <h4><a href="{{ $n['url'] }}">{{ $n['title'] }}</a></h4>
      @if((!empty($n['date'])) && ($n['posttype'] == 'news'))
        <div class="date">{{ $n['date'] }}</div>
      @endif
      @if(!empty($n['excerpt']))
        <div class="excerpt">
          {{ $n['excerpt'] }}
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