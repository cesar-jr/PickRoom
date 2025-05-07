<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleByRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($locale = $this->detectLocale($request)) {
            App::setLocale($locale);
        }
        return $next($request);
    }

    private function detectLocale(Request $request)
    {
        $allowedLocales = ['pt_BR', 'en'];
        $weightedLocales = [];
        $httpAcceptLanguageHeader = $request->header('Accept-Language');
        if (!is_string($httpAcceptLanguageHeader)) return null;

        // Adapted from: https://phrase.com/blog/posts/detecting-a-users-locale/
        // We break up the string 'en-CA,ar-EG;q=0.5' along the commas,
        // and iterate over the resulting array of individual locales. Once
        // we're done, $weightedLocales should look like
        // [['locale' => 'en-CA', 'q' => 1.0], ['locale' => 'ar-EG', 'q' => 0.5]]
        foreach (explode(',', $httpAcceptLanguageHeader) as $locale) {
            // separate the locale key ("ar-EG") from its weight ("q=0.5")
            $localeParts = explode(';', $locale);
            $weightedLocale = ['locale' => str_replace('-', '_', $localeParts[0])];
            if (count($localeParts) == 2) {
                // explicit weight e.g. 'q=0.5'
                $weightParts = explode('=', $localeParts[1]);
                // grab the '0.5' bit and parse it to a float
                $weightedLocale['q'] = floatval($weightParts[1]);
            } else {
                // no weight given in string, ie. implicit weight of 'q=1.0'
                $weightedLocale['q'] = 1.0;
            }
            $weightedLocales[] = $weightedLocale;
        }

        usort($weightedLocales, function ($a, $b) {
            if ($a['q'] == $b['q']) {
                return 0;
            }
            return ($a['q'] > $b['q']) ? -1 : 1;
        });

        foreach ($weightedLocales as $weightedLocale) {
            if (in_array($weightedLocale['locale'], $allowedLocales)) {
                return $weightedLocale['locale'];
            }
        }
        return null;
    }
}
