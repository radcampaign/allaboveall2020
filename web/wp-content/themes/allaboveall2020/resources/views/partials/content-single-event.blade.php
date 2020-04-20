<article @php post_class() @endphp>
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
  </header>
  <div class="entry-content">
    @if ($featured_image) {!! $featured_image_url !!} @endif
    
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
