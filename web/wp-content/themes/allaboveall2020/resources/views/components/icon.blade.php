@php
  $icon_classes = implode(' ', array_filter([
    "fa-{$icon['name']}",
    'fa'. ($icon['style'] ?? 'regular')[0],
    !empty($icon['size']) ? "fa-{$icon['size']}" : '',
  ]));
@endphp
<i class="{{ $icon_classes }}"></i>
