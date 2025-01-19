@php
    /**
     * @var string $currentLocale
     * @var array $urls
     * @var array $classes
     * @var string $itemView
     */
@endphp
<div @class($classes)>
    <span>
        {{ ucfirst($currentLocale) }}
    </span>
    <ul>
        @foreach($urls as $locale)
            @include($itemView, $locale)
        @endforeach
    </ul>
</div>
