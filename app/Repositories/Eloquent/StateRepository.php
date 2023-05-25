<?php

namespace App\Repositories\Eloquent;

use App\Models\State;
use App\Repositories\StateRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class StateRepository.
 */
class StateRepository extends BaseRepository implements StateRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param State $model
     */
    public function __construct(State $model)
    {
        parent::__construct($model);
    }
    public function back()
    {
        return back()->with('message',trans('notification.message'));
    }
}
