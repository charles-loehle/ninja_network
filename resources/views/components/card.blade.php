@props(['highlight' => false])

<div @class(['highlight' => $highlight, 'card index__card'])>
  {{ $slot }}
  <a {{ $attributes }} class="btn">View Details</a>
</div>
