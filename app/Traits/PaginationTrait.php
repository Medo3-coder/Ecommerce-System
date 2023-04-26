<?php

namespace App\Traits;

trait PaginationTrait
{

    public function paginationModel($col)
    {
        return [
            'total_items'   => $col->total(),
            'count_items'   => (int) $col->count(),
            'per_page'      => $col->perPage(),
            'total_pages'   => $col->lastPage(),
            'current_page'  => $col->currentPage(),
            'next_page_url' => (string) $col->nextPageUrl(),
            'perv_page_url' => (string) $col->previousPageUrl(),
        ];

    }
}
