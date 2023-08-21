<?php

namespace Plenta\ExtendedCheckbox;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PlentaExtendedCheckboxBundle extends Bundle
{
    public function getPath(): string
    {
        return dirname(__DIR__);
    }
}