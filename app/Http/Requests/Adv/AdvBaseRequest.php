<?php

namespace App\Http\Requests\Adv;

use App\Http\Requests\BaseRequest;

abstract class AdvBaseRequest extends BaseRequest
{
    public function __construct(array $query = [], array $request = [], array $attributes = [],
                                array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }
}
