<div class="container">
  <div class="row">
    <div class="col-lg-12">
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
          <div class="mb-4">
            @if (!empty(get_field('file')))
              <strong>File:</strong>  <a href="{!! the_field('file') !!}" target="_blank">Download File</a>
            @endif
          </div>
        </div>
      </article>
    </div>
  </div>
</div>
