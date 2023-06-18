<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class LanguageFactory extends Factory
{
    protected $model = Language::class;

    public function definition()
    {
        $locales = ['ru', 'en', 'ua'];

        $locale = $this->faker->randomElement($locales);

        return [
            'locale' => $locale,
            'prefix' => $this->getPrefixByLocale($locale),
        ];
    }

    private function getPrefixByLocale($locale)
    {
        switch ($locale) {
            case 'ru':
                return 'ru';
            case 'en':
                return 'en';
            case 'ua':
                return 'ua';
            default:
                return '';
        }
    }
}
