<?php

namespace ItLabs\Widgets\I18n;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Arr;
use Spatie\Url\Url;

class Locales extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $locales = app(LocaleStatement::class);

        $currentLocale = $locales->getCurrent();

        $currentSegments = Url::fromString(url()->full())->getSegments();

        if($locales->isDefault()){
            array_unshift($currentSegments, $locales->getDefault());
        }

        foreach (config('app.locales', []) as $locale){
            $segments = $currentSegments;

            if($locale === $currentLocale){
                continue;
            }

            if($locale === $locales->getDefault()){
                unset($segments[0]);
            }
            else{
                $segments[0] = $locale;
            }

            $urls[$locale] = '/' . implode('/', $segments);
        }

        $classes = Arr::get($this->config, 'classes', []);

        return view('i18nWidget::index', compact('currentLocale', 'urls', 'classes'));
    }
}
