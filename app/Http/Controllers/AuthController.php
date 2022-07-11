<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\UpdateAuthRequest;
use App\interfaces\AuthInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthInterface $authInterface;
    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface=$authInterface;
    }
    public function addingAuth(StoreAuthRequest $request)
    {
        return $this->authInterface->addAuth($request);
    }
    public function loggingAuth(Request $request)
    {
        return $this->authInterface->loginAuth($request);
    }
    public function loggingAdminAuth(Request $request){
        return $this->authInterface->loginAdminAuth($request);
    }
}
