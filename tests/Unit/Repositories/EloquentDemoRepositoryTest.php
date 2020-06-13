<?php

namespace Tests\Unit\Repositories;

use App\User;
use Mockery as m;
use Tests\TestCase;
use Illuminate\Support\Collection;
use Illuminate\Database\Query\Builder;
use App\Repositories\EloquentDemoRepository;
use App\Contracts\Repositories\DemoRepository;

class EloquentDemoRepositoryTest extends TestCase
{
    public $processRepository;

    public $eloquent;

    public $user;

    public $userItem;

    public function setUp() :void
    {
        parent::setUp();

        $this->user = m::mock(User::class);
        $this->processRepository = m::mock(ProcessTemplateRepository::class);
        $this->eloquent = new EloquentDemoRepository(
            $this->user
        );
    }

    public function test_find_by_id()
    {
        $this->userItem = m::mock(User::class)->makePartial();
        $this->userItem->id = 1;
        $this->user->shouldReceive('where->whereNull->get')->andReturn($this->userItem);

        $result = $this->eloquent->findById($this->userItem->id);
        $this->assertEquals($result, $this->userItem);
    }

    public function test_by_id_with_post()
    {
        $this->userItem = m::mock(User::class)->makePartial();
        $this->userItem->id = 1;
        $this->user->shouldReceive('where')->andReturn($this->user);
        $this->user
            ->shouldReceive('whereHas')
            ->with('post', m::on(function ($data) {
                $queryMock = m::mock(Builder::class);
                $queryMock->shouldReceive('where')->andReturnSelf();
                $data->__invoke($queryMock);

                return is_callable($data);
            })) ->andReturn($this->user);
        $this->user->shouldReceive('get')->andReturn($this->userItem);            

        $result = $this->eloquent->findByIdWithPosts($this->userItem, 1);
        $this->assertEquals($result, $this->userItem);
    }

    public function test_by_id_with_post_and_mutiple_condition()
    {
        $this->userItem = m::mock(User::class)->makePartial();
        $this->userItem->id = 1;
        $this->user->shouldReceive('where')->andReturn($this->user);
        $this->user
            ->shouldReceive('whereHas')
            ->with(m::on(function ($data) {
                $dataClosure = $data['post'];
                $queryMock = m::mock(Builder::class);
                $queryMock->shouldReceive('where')->andReturnSelf();
                $dataClosure->__invoke($queryMock);

                return is_callable($dataClosure);
            })) ->andReturn($this->user);
        $this->user->shouldReceive('get')->andReturn($this->userItem);            

        $result = $this->eloquent->findByIdWithPostsAndMultipleCondition($this->userItem, 1);
        $this->assertEquals($result, $this->userItem);
    }
}
