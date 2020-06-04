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
            @if (!empty(the_post_thumbnail())) {{ the_post_thumbnail() }} @endif
            
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
            <div>
              <p><strong>Form Embed</strong></p>
              @php(the_field('form_embed'))
            </div>
            <div>
              <p><strong>Button:</strong> <a href="{{ get_field('button_url') }}" class="btn">{{ get_field('button_text') }}</a></p>
            </div>
          </di>
      </div>
    </div>
  </div>
</article>