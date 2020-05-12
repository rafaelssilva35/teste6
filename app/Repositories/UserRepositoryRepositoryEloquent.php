<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\User;

/**
 * Class UserRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryRepositoryEloquent extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function paginates()
    {              
        if (request()->searchType == 'name') {
            $key = trim(request()->searchKey);
            $this->model = $this->model->where('name','LIKE', "%$key%");
        }     
        
        if (request()->searchType == '10menosLogin') {
            $key = trim(request()->searchKey);
            return  ['data' => $this->model->has('acess')->withCount('acess')->orderBy('acess_count', 'asc')->take(10)->get()];
        }
        
        if (request()->searchType == '10maisLogin') {
            $key = trim(request()->searchKey);
            return ['data' => $this->model->has('acess')->withCount('acess')->orderBy('acess_count', 'desc')->take(10)->get()];
        }


        return $this->model        
            ->whereHas('acess', function( $query){
                if (request()->searchType == 'beetwen') {
                    $dates = (json_decode(request()->searchKey, true));
                    $start = $dates['start']['date'];
                    $end =  $dates['end']['date'];
        
                    $beetwen = [now()->createFromFormat('d/m/Y', $start), now()->createFromFormat('d/m/Y', $end)];
                    $query->whereBetween('last_login', $beetwen);
                }

            })
            ->paginate(request()->per_page??10);
    }    
}
