<article @php post_class() @endphp>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
  </header>
  <div class="entry-content">
    @if ($featured_image) {!! $featured_image_url !!} @endif
    
    @php the_content() @endphp
    <p><strong>Author(s):</strong></p>
    <ul>
      @php($authors = wp_get_post_terms($post->ID, 'author'))
        @foreach ($authors as $a)
          <li><a href="{{ get_term_link( $a->slug, 'author') }}">{{ $a->name }}</a></li>
        @endforeach
    </ul>
    <p><strong>Campaign(s):</strong></p>
    <ul>
      @php($campaigns = wp_get_post_terms($post->ID, 'campaign'))
        @foreach ($campaigns as $c)
          <li><a href="{{ get_term_link( $c->slug, 'campaign') }}">{{ $c->name }}</a></li>
        @endforeach
    </ul>
    <p><strong>State/Locality:</strong></p>
    <ul>
      @php($states = wp_get_post_terms($post->ID, 'state'))
        @foreach ($states as $sl)
          <li><a href="{{ get_term_link( $sl->slug, 'state') }}">{{ $sl->name }}</a></li>
        @endforeach
    </ul>
    <div>
      <p><strong>Button:</strong> <a href="{{ get_field('button_url') }}" class="btn">{{ get_field('button_text') }}</a></p>
    </div>
  </div>
</article>
