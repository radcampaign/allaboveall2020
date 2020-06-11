<div class="select">
  <select id="dynamic_select" class="form-control">
    <option>Select a state</option>
  @foreach($statetermlist as $state)
    <option value="/state/{{ $state->slug }}">{{ $state->name }}</option>
  @endforeach
  </select>
</div>
<a href="/abortion-coverage" class="image-hover"><img src="/wp-content/uploads/2020/06/bw-map.png" alt="state map" class="state-map" /></a>