<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\AppRepository;

class UserRepository extends AppRepository
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

    //function to  store the user throught request and than repository
    public function store(array $data)
    {
        return User::create($data);
    }

    //function to update the user
    public function update(int $id, array $data)
    {

        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }
}
