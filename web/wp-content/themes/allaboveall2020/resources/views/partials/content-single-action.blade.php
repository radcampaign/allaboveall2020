<article @php post_class() @endphp>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
  </header>
  <div class="entry-content">
    @if (!empty(the_post_thumbnail())) {{ the_post_thumbnail() }} @endif
    
    @php the_content() @endphp
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
      <p><strong>Form Embed</strong></p>
      @php(the_field('form_embed'))
    </div>
    <div>
      <p><strong>Button:</strong> <a href="{{ get_field('button_url') }}" class="btn">{{ get_field('button_text') }}</a></p>
    </div>
  </div>
</article>
