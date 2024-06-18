<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController {

    public function index()
    {
        $size = request()->input('length') ?? 10;
        $order = request()->input('order') ? request()->input('columns')[request()->input('order')[0]['column']]['data'] : 'id';
        $direction = request()->input('order') ? request()->input('order')[0]['dir'] : 'asc';
        $search = request()->input('search')['value'];
        $query = Product::query()
            ->select('id', 'name', 'price')
            ->orderBy($order, $direction);
        $recordsTotal = $query->count();
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        $paginate = $query->paginate($size);
        return [ 'draw' => request()->input('draw'), 'recordsTotal' => $recordsTotal, 'recordsFiltered' => $paginate->total(), 'data' => $paginate->items() ];
    }
}