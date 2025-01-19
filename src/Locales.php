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

    protected ?LocaleStatement $localeStatement;

    public function __construct(array $config = [])
    {
        $this->addConfigDefaults([
            'view' => 'i18nWidget::index',
            'itemView' => 'i18nWidget::item',
            'classes' => []
        ]);

        parent::__construct($config);
    }

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $this->localeStatement = app(LocaleStatement::class);

        return view($this->config['view'], $this->config, [
            'locales' => $this->buildLocales(),
            'currentLocale' => $this->localeStatement->getCurrent(),
        ]);
    }

    protected function buildLocales(): array
    {
        $locales = [];
        $currentLocale = $this->localeStatement->getCurrent();
        $currentSegments = Url::fromString(url()->full())->getSegments();

        $defaultLocale = $this->localeStatement->getDefault();

        if($this->localeStatement->isDefault()){
            array_unshift($currentSegments, $defaultLocale);
        }

        foreach ($this->localeStatement->getList() as $locale){
            $segments = $currentSegments;

            if($locale === $defaultLocale){
                unset($segments[0]);
            }
            else{
                $segments[0] = $locale;
            }

            $locales[] = [
                'href' => '/' . implode('/', $segments),
                'locale' => $locale,
                'name' => $this->buildName($locale),
                'isActive' => $locale === $currentLocale
            ];
        }

        return $locales;
    }

    protected function buildName(string $locale): string
    {
        $key = 'locales.' . $locale;
        $name = __($key);

        if(!$name || $key === $name){
            $name = ucfirst($locale);
        }

        return $name;
    }
}
