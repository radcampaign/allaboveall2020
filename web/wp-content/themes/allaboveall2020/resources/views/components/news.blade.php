<ul>
  @foreach($newslisting as $n)
    <li>
      <h4>{{ $n['title'] }}</h4>
    </li>
  @endforeach
</ul>

<pre>@php(print_r($newslisting))</pre>