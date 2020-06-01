@foreach($featuredaction as $fa)
<div class="two-col-flex bg-black">
  <div class="left">
    <div class="text">
      <h3 class="display-2">{{ $fa['title'] }}</h3>
      <p class="text-larger">{{ $fa['excerpt'] }}</p>
      <a href="{{ $fa['url'] }}" class="btn btn-green">Speak Up</a>
    </div>
  </div>
  <div class="right image">
    <img src="{{ $fa['image'] }}" alt="{{ $fa['title'] }}">
  </div>
</div>
@endforeach