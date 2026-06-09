<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\AppRepository;

class UsersRepository extends AppRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function get($request)
    {
        $builder = $this->model;

        $builder = $builder->orderBy('name');
        return $builder->get();
    }
}
