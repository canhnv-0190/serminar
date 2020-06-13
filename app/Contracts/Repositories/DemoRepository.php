<?php

namespace App\Contracts\Repositories;

use App\User;

interface DemoRepository extends Repository
{
	public function findById($id);

    public function findByIdWithPosts($id, $postId);
}
