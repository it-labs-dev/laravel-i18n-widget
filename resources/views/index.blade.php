@php
    /**
     * @var string $currentLocale
     * @var array $urls
     * @var array $classes
     */
@endphp
<div @class($classes)>
    <span>
        {{ ucfirst($currentLocale) }}
    </span>
    <ul>
        @foreach($urls as $locale => $url)
            <li>
                <a href="{{ $url }}">
                    {{ ucfirst($locale) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
