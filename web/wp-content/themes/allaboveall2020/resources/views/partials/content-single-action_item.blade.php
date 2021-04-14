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
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
          <div class="entry-content">
            @php the_content() @endphp
            <!-- <a href="{{ get_field('button_url') }}" class="btn">{{ get_field('button_text') }}</a> -->
            @if(!empty(wp_get_post_terms($post->ID, 'campaign')))
            <div class="post-campaign flex">
              <label>Campaign</label>
              <ul>
                @php($campaigns = wp_get_post_terms($post->ID, 'campaign'))
                  @foreach ($campaigns as $c)
                    <li><a href="{{ get_term_link( $c->slug, 'campaign') }}">{{ $c->name }}</a></li>
                  @endforeach
              </ul>
            </div>
            @endif
            @if(!empty(wp_get_post_terms($post->ID, 'state')))
            <div class="post-state flex">
              <label>State</label>
              <ul>
                @php($states = wp_get_post_terms($post->ID, 'state'))
                  @foreach ($states as $sl)
                    <li><a href="{{ get_term_link( $sl->slug, 'state') }}">{{ $sl->name }}</a></li>
                  @endforeach
              </ul>
            </div>
            @endif
          </div>
      </div>
      <div class="col-lg-6">
        <div class="action-embed">
          @php(the_field('form_embed'))
        </div>
      </div>
    </div>
  </div>
</article>