@php
  if(!empty(get_field('publication_link'))) {
    $icon = 'far fa-external-link-alt';
    $link = '<a href="'.get_field('publication_link').'" target="_blank">'.get_the_title().'</a> <i class="'.$icon.'"></i>';
  }
  else {
    $link = '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
  }
@endphp

<article @php post_class() @endphp>
  <header>
    <h3 class="entry-title">{!! $link !!}</h3>
    @if (get_post_type() === 'post')
      @include('partials/entry-meta')
    @endif
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
