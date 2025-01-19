@php
    /**
     * @var string $currentLocale
     * @var array $locales
     * @var array $classes
     * @var string $itemView
     */
@endphp
<div @class($classes)>
    <span>
        {{ ucfirst($currentLocale) }}
    </span>
    <ul>
        @foreach($locales as $locale)
            @include($itemView, $locale)
        @endforeach
    </ul>
</div>
