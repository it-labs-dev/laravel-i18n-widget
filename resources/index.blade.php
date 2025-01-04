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
                <a class="b-dropdown__item b-dropdown__item--link" href="{{ $url }}">
                    {{ ucfirst($locale) }}
                </a>
            </li>
        @endforeach
    </div>
</div>
