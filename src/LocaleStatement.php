<?php

namespace ItLabs\Widgets\I18n;
class LocaleStatement
{
    protected array $primaryLocales = ['en', 'ru', 'pl'];

    protected array $locales;

    protected ?string $defaultLocale;

    public function __construct(?string $defaultLocale, array $locales)
    {
        $this->defaultLocale = $defaultLocale;
        $this->locales = $locales;
    }

    public function getList(): array
    {
        return $this->locales;
    }

    public function getListOfAdditional(): array
    {
        $locales = $this->locales;

        foreach ($this->primaryLocales as $locale) {
            if (($key = array_search($locale, $locales)) !== false) {
                unset($locales[$key]);
            }
        }

        return $locales;
    }

    public function getDefault(): ?string
    {
        return $this->defaultLocale;
    }

    public function getCurrent(): ?string
    {
        return app()->getLocale();
    }

    public function isDefault(): ?string
    {
        return $this->getCurrent() === $this->getDefault();
    }
}
