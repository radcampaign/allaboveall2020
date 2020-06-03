@php
  $bg_img = $modal['background_image'] ?? FALSE;
  $modal_classes = implode(' ', array_filter([
    'modal',
    'fade',
    $bg_img ? 'bg-image' : '',
  ]));
  $dialog_classes = implode(' ', array_filter([
    'modal-dialog',
    'modal-dialog-centered',
    !empty($modal['size']) ? "modal-{$modal['size']}" : '',
  ]));
@endphp
<div class="{{ $modal_classes }}" {!! $bg_img ? 'style="background-image:url(' . $bg_img . ')"' : '' !!} id="{{ $modal['id'] }}" tabindex="-1" role="dialog" aria-labelledby="{{ $modal['id'] }}-title" aria-hidden="true">
  <div class="{{ $dialog_classes }}" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title mb-4" id="{{ $modal['id'] }}-title">{{ $modal['title'] }}</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="mb-5 lead">
          {!! $modal['content'] !!}
        </div>
        @if (!empty($modal['button']))
          @include ('components.button', ['button' => $modal['button']])
        @endif
      </div>
    </div>
  </div>
</div>
