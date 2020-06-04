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
            <div class="mb-4">
              @if (!empty(get_field('datetime')))
                <strong>Date time:</strong>  {!! the_field('datetime') !!}
              @endif
            </div>
            <div class="mb-4">
              @if (!empty(get_field('location')))
                <strong>Location:</strong>  {!! the_field('location') !!}
              @endif
            </div>
          </div>
      </div>
    </div>
  </div>
</article>
