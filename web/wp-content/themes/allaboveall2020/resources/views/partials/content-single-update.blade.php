<article @php post_class('mb-4') @endphp>
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="page-header-inner">
            <h1>{!! get_the_title() !!}</h1>
          </div>
        </div>
      </div>
    </div>
    <img src="/wp-content/uploads/2020/05/asterisk-white.png" alt="white asterisk" class="header-asterisk" />
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
          <div class="entry-content">
            @if ($featured_image) {!! $featured_image_url !!} @endif
            
            @php the_content() @endphp
            <div class="post-campaign flex">
              <label>Campaign</label>
              <ul>
                @php($campaigns = wp_get_post_terms($post->ID, 'campaign'))
                  @foreach ($campaigns as $c)
                    <li><a href="{{ get_term_link( $c->slug, 'campaign') }}">{{ $c->name }}</a></li>
                  @endforeach
              </ul>
            </div>
            <div class="post-state flex">
              <label>State</label>
              <ul>
                @php($states = wp_get_post_terms($post->ID, 'state'))
                  @foreach ($states as $sl)
                    <li><a href="{{ get_term_link( $sl->slug, 'state') }}">{{ $sl->name }}</a></li>
                  @endforeach
              </ul>
            </div>
            <!--<div class="mb-4">
              @if (!empty(get_field('press_release')))
                <strong>Press Release:</strong>  {!! the_field('press_release') !!}
              @endif
            </div>-->
          </div>
      </div>
    </div>
  </div>
</article>
