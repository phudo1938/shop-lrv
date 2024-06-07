<?php
namespace Modules\User;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

use Modules\User\Model\User;

class UserProviderCustom extends EloquentUserProvider {
    
    public function __construct(HasherContract $hasher, $model) {
        parent::__construct($hasher, $model);
    }

    public function retrieveById($iduser) {
        $user = $this->retrieveUser($iduser);
        return $user;
    }

    public function retrieveByToken($iduser, $token) {
        $user = $this->retrieveUser($iduser, $token);
        // dd($token);
        // if($user) {
        //     $userService = app("Modules\User\Service\UserService");
        //     $user = $userService->get($iduser);
        //     if($user) {
        //         $userService->loginUser($user, true, false, null);
        //         return $user;
        //     }
        // }
        // app("Modules\User\Service\LoginService")->logoutUser($iduser);
        return $user;
    }

    private function retrieveUser($iduser, $rememberToken = null) {
        $user = app("Modules\User\Service\LoginService")->get($iduser);
        
        return $user;
    }
    
    private function retrieveExtraData($user) {

        $user->profile = app("Modules\User\Service\UserService")->getProfile($user->_id, ["shop"]);
        
        return $user;
    }

     /**

     * Update the "remember me" token for the given user in storage.

     *

     * @param  \Illuminate\Contracts\Auth\Authenticatable|\Illuminate\Database\Eloquent\Model  $user

     * @param  string  $token

     * @return void

     */

    public function updateRememberToken(UserContract $user, $token) {

        $user->setRememberToken($token);
        $timestamps = $user->timestamps;

        $user->timestamps = false;

        $user->update();

        $user->timestamps = $timestamps;

    }


}