<pre>@php(print_r($resourcelisting))</pre>
@foreach($resourcelisting as $r)
  <h4>{{ $r['title'] }}</h4>
@endforeach