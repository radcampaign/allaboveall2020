{{--
  Title: Recent News & Resources
  Description: Full width section with recent news & resources
  Category: layout
  Icon: star-filled
  Keywords: full image text
  Mode: edit
  Align: none
  PostTypes: page
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: true
--}}

@php
  $option = $block['data']['content_options'];

  if($option == 'both') {
    $numposts = 3;
  }
  else {
    $numposts = 4;
  }
  $new = '';
  $rec = '';

  if($option == 'updates') {
    $rec = ' hide';
    $new = ' two-col';
  }
  if($option == 'resource') {
    $new = ' hide';
    $rec = ' two-col';
  }

  $campaign = $block['data']['campaign'];
  $camp = '';

  if(!empty($block['data']['campaign'])) {
    $camp = array(
            'taxonomy' => 'campaign',
            'terms' => $campaign,
            'field' => 'term_id',
    );
  }


  $args_news = array(
    'post_type' => 'news',
    'posts_per_page' => $numposts,
    'orderby' => 'date',
    'order'   => 'DESC',
    'post_status' => 'publish',
    'tax_query' => array($camp),
  );
  $args_re = array(
    'post_type' => 'resource',
    'posts_per_page' => $numposts,
    'orderby' => 'date',
    'order'   => 'DESC',
    'post_status' => 'publish',
    'tax_query' => array($camp),
  );
  add_filter('posts_distinct', 'search_distinct');
    $query_news = new WP_Query( $args_news );
    $query_re = new WP_Query( $args_re );
  remove_filter('posts_distinct', 'search_distinct');

  $newslisting = array();
  $relisting = array();

  if ($query_news->have_posts()) {
    while ( $query_news->have_posts() ) : $query_news->the_post();

      $link = get_field('publication_link');
      $name = get_field('publication_name');
      $id = get_the_ID();
    
      $newslisting[] = $id;

    endwhile;
    wp_reset_postdata();       
  }
  if ($query_re->have_posts()) {
    while ( $query_re->have_posts() ) : $query_re->the_post();
      $id = get_the_ID();
      $relisting[] = $id;

    endwhile;
    wp_reset_postdata(); 
  }
@endphp

<div data-{{ $block['id'] }} class="full-news-resources {{ $block['classes'] }}">
  <div class="full-width-text-inner bg-gray">
     {{-- start container --}}
     <div class="container container-inner">
       <div class="row">
            @if($option == 'both')
              <div class="col-lg-6 mb-5">
            @else
              <div class="col-lg-12 mb-5">
            @endif
              <div class="resources{{ $rec }}">
                <h3><i class="far fa-file-alt text-green"></i> Resources</h3>
                <ul class="pl-0 list-style-none tax-list">
                  @foreach($relisting as $n)
                    <li class="tax-list-item pr-5">
                      @php($post = get_post($n))
                      @php($link = get_permalink($n))
                      @php($name = get_field( "publication_name", $n))
                      <h4><a href="{{ $link }}">{!! $post->post_title !!}</a></h4>
                      @if((!empty($post->post_date)))
                        <div class="meta">
                          <div class="date">{{ $post->post_date }}</div>
                        </div>
                      @endif
                      @if(!empty($post->post_content))
                        <div class="excerpt">
                          {!! $post->post_excerpt !!}
                        </div>
                      @endif
                    </li>
                  @endforeach
                </ul>
                  <a href="/resources" class="btn btn-white btn-black-outline uppercase mb-5">More Resources</a>
              </div>
          @if($option == 'both')
            </div>
            <div class="col-lg-6 mb-5">
          @else
            </div>
          @endif
            <div class="news{{ $new }}">
                <h3><i class="fas fa-rss text-green"></i> News</h3>
                <ul class="pl-0 list-style-none tax-list">
                  @foreach($newslisting as $n)
                    <li class="tax-list-item pr-5">
                      @php($post = get_post( $n ))
                      @php($link = get_field( "publication_link", $n ))
                      @php($name = get_field( "publication_name", $n ))
                      <h4><a href="{{ $link }}" target="_blank">{!! $post->post_title !!}</a><i class="far fa-external-link-alt"></i></h4>
                      @if((!empty($post->post_date)))
                        <div class="meta">
                          <div class="date">{{ $post->post_date }}</div>
                          <div class="name">{{ $name }}</div>
                        </div>
                      @endif
                      @if(!empty($post->post_content))
                        <div class="excerpt">
                          {!! $post->post_excerpt !!}
                        </div>
                      @endif
                    </li>
                  @endforeach
                </ul>
                  <a href="/news-updates" class="btn btn-white btn-black-outline uppercase mb-5">More News</a>
              </div>
            </div>
       </div>
     </div>
   </div>
</div>