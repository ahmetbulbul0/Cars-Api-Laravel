<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;

class ReqFilterGenerator extends Controller
{
    static function limit($request, $model)
    {
        if ($request->limit) {
            $limit = intval($request->limit);
            $model = $model->limit($limit);
        }
        return $model;
    }
}
