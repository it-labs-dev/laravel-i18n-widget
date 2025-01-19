@php
    /**
     * @var string $href
     * @var string $locale
     * @var string $name
     * @var bool $isActive
     */
@endphp
<li @class(['is-active' => $isActive])>
    <a href="{{ $url }}">
        {{ $name }}
    </a>
</li>
