<?php

namespace App\Repositories;

use App\Models\StockHistory;
use App\Repositories\AppRepository;

class StockHistoryRepository extends AppRepository
{

    protected $model;

    public function __construct(StockHistory $model)
    {
        $this->model = $model;
    }

    public function paginate($request)
    {
        $items = StockHistory::with([
            'user',
            'product.category',
            'product.supplier'
        ])
            ->whereType($request->input('type'))
            ->whereProductKeywords($request->input('search'))

            // User Filter
            ->when($request->filled('user_id'), function ($query) use ($request) {

                $query->where('user_id', $request->user_id);
            })

            // From Date
            ->when($request->filled('from'), function ($query) use ($request) {

                $query->whereDate('created_at', '>=', $request->from);
            })

            // To Date
            ->when($request->filled('to'), function ($query) use ($request) {

                $query->whereDate('created_at', '<=', $request->to);
            })->latest()->paginate(10)->withQueryString();

        return $items;
    }
}
