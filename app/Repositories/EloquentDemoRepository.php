<?php

namespace App\Repositories;

use App\Contracts\Repositories\DemoRepository;
use App\User;
use Illuminate\Support\Facades\Auth;

class EloquentDemoRepository extends EloquentRepository implements DemoRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findById($id)
    {
        return $this->model
                ->where('id', $id)
                ->whereNull('deleted_at')
                ->get();
    }

    public function findByIdWithPosts($id, $postId)
    {
        return $this->model
                ->where('id', $id)
                ->whereHas('post', function ($query) use ($postId) {
                    return $query->where('id', $postId);
                })
                ->get();
    }

    public function findByIdWithPostsAndMultipleCondition($id, $postId)
    {
        return $this->model
                ->where('id', $id)
                ->whereHas([
                    'post' => function ($query) use ($postId) {
                        return $query->where('id', $postId);
                    }
                ])
                ->get();
    }
    
}
