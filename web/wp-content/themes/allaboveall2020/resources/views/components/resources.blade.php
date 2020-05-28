<ul>
  @foreach($resourcelisting as $r)
    <li>
      <h4>{{ $r['title'] }}</h4>
    </li>
  @endforeach
</ul>

<pre>@php(print_r($resourcelisting))</pre>