<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SalespeopleRepository;
use App\Entities\Salespeople;
use App\Validators\SalespeopleValidator;

/**
 * Class SalespeopleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SalespeopleRepositoryEloquent extends BaseRepository implements SalespeopleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Salespeople::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
