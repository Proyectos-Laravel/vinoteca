<?php

namespace App\Traits;

use NumberFormatter;

trait WithCurrencyFormatter
{

    public function formatCurrency($value):string
    {
        $formatter = new NumberFormatter(locale: 'es_ES', style:NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($value, currency:'EUR');
    }
}
