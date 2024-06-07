<?php

namespace Modules\User\Repository\Impl;

use Core\Repository\BaseRepository;
use Modules\User\Repository\LoginRepository;
use Modules\User\Model\Login;

class LoginRepositoryImpl implements LoginRepository {
    public function getModel() {
        return Login::class;
    }

    public function isLogin($idUser) {
        return $this->findOne(["iduser"=>$idUser,"status"=>1]);
    }

}
