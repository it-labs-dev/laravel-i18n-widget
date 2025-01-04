<?php

/**
 * Generate the URL to a named route.
 */
function i18nRoute(string $name, array $parameters = [], $absolute = true): string
{
    $locale = app()->getLocale();
    $defaultLocale = config('app.defaultLocale');

    if ($locale !== $defaultLocale) {
        $parameters['lang'] = $locale;
        $name = 'i18n.' . $name;
    }

    return app('url')->route($name, $parameters, $absolute);
}
