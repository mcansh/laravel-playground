<?php

namespace App\Helpers;

function dropQueryParams(string ...$params): array
{
    return array_filter(request()->except($params));
}
