<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryRepository
{

    public function getCategories(array $filters)
    {
        $builder = Category::query()->withCount('products');

        // Search Filter
        if (!empty($filters['search'])) {
            $builder->where('name', 'like', '%' . $filters['search'] . '%');
        }

        // Status Filter
        if (isset($filters['status']) && $filters['status'] !== '') {
            $builder->where('status', $filters['status']);
        }


        return $builder->paginate(10)->withQueryString();
        // $categories = $builder->latest()->paginate(10)->withQueryString();

    }

    public function getAll()
    {
        return Category::get();
    }
    // function to store the validated data from controller

    public function store(array $data)
    {
        return Category::create($data);
    }
}
