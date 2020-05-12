<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryRepositoryEloquent;

class UsersController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryRepositoryEloquent $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->userRepository->paginates();
    }
}
