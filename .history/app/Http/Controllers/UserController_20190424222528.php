<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Services\Domain\UserService;

class UserController extends AuthApiBaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $userService;

    public function __construct(UserService $userService)
    {
        parent::__construct();

        $this->userService = $userService;
    }

    public function index()
    {
        $data = $this->userService->getAllUsers();
        return $this->returnSuccess($data);
    }

    public function resetPass(Request $request, $id)
    {
    	$data = $this->userService->UpdatePassWord($request->password, $id);
        return $this->returnSuccess($data);
    }
}