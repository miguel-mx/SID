<?php

namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('country', array($this, 'countryCode')),
        );
    }

    public function countryCode($country_name)
    {
        $country_codes = array(
            'México' => 'mx',
            'Colombia' => 'co',
            'Venezuela' => 've',
            'Bolivia' => 'bo',
            'Alemania' => 'de',
        );

        return $country_codes[$country_name];
    }
}