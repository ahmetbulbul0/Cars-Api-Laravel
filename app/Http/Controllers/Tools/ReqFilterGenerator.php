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

    static function paginate($request, $model) {

        $response["pagination"] = null;
        
        if ($request->paginate && $request->limit) {

            $limit = intval($request->limit);
            $page = isset($request->page) ? intval($request->page) : 1;

            $totalDataCount = $model->count();
            $totalPageNumber = ReqFilterGenerator::getTotalPageNumber($totalDataCount, $limit);

            if ($page <= $totalPageNumber) {
                $offsetValue = ($page * $limit) - $limit;
                $model = $model->limit($limit);
                $model = $model->offset($offsetValue);

                $response["pagination"] = [
                    "nowPage" => $page,
                    "previousPage" => $page > 1 ? $page - 1 : null,
                    "previousPreviousPage" => $page > 2 ? $page - 2 : null,
                    "nextPage" => $page < $totalPageNumber ? $page + 1 : null,
                    "nextNextPage" => $page + 1 < $totalPageNumber ? $page + 2 : null,
                    "totalPageNumber" => $totalPageNumber,
                ];
            }
        }

        $response["data"] = $model->get();

        return $response;
    }

    static function getTotalPageNumber($totalDataCount, $itemPerPage)
    {
        $totalPageNumber = 1;
        if ($totalDataCount > $itemPerPage) {
            $totalPageNumber = intval($totalDataCount / $itemPerPage);
            if (($totalDataCount % $itemPerPage) > 0) {
                $totalPageNumber++;
            }
        }
        return $totalPageNumber;
    }
}
