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
      </article>
    </div>
  </div>
</div>
