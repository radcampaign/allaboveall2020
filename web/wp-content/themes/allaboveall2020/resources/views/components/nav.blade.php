<ul class="navbar-nav">
  @foreach($navitems as $nav_item)
    @if($nav_item['level'] == 1)
      @if($nav_item['children'] == 'yes')
        <li class="nav-item dropdown {{ $nav_item['active'] }}"> 
          <a class="nav-link dropdown-toggle desktop-toggle" href="{{ $nav_item['url'] }}" aria-haspopup="true" aria-expanded="false">
            {{ $nav_item['title'] }}
          </a>
          <a class="nav-link mobile-link" href="{{ $nav_item['url'] }}">
            {{ $nav_item['title'] }}
          </a>
          <a class="mobile-toggle dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+</a>
          <div class="dropdown-menu">
            @foreach($nav_item['child'] as $child)
              <a href="{{ $child['url'] }}" class="dropdown-item">{{ $child['title'] }}</a>
            @endforeach
          </div>
        </li>
      @else
        <li class="nav-item {{ $nav_item['active'] }}"><a class="nav-link" href="{{ $nav_item['url'] }}">{{ $nav_item['title'] }}</a></li>
      @endif
    @endif
  @endforeach
</ul>
