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
            @if (!empty(get_field('publication_name')))
              <strong>Publication Name:</strong>  {!! the_field('publication_name') !!}
            @endif
          </div>
          <div class="mb-4">
            @if (!empty(get_field('publication_link')))
              <strong>Link:</strong>  {!! the_field('publication_link') !!}
            @endif
          </div>
        </div>
      </article>
    </div>
  </div>
</div>
