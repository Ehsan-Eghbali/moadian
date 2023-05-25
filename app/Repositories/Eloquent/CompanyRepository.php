<?php

namespace App\Repositories\Eloquent;

use App\Models\Company;
use App\Repositories\CompanyRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class CompanyRepository.
 */
class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Company $model
     */
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function back()
    {
        return back()->with('message',trans('notification.message'));
    }
}
