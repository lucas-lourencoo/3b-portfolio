<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BullRepository;
use App\Entities\Bull;
use App\Validators\BullValidator;

/**
 * Class BullRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BullRepositoryEloquent extends BaseRepository implements BullRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bull::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
