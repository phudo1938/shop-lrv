<?php
namespace Modules\User\Service\Impl;

use Modules\User\Service\LoginService;

use stdClass;
use Session;

class LoginServiceImpl implements LoginService {
    public function create($input) {
        $login = [
            "iduser" => $input["iduser"] ?? "",
            "access_token" => $input["access_token"] ?? "",
            "session_id" => Session::get("auth_id"),
            "timed" => time(),
            "status" => 1,
            "remember_token" => $input["remember_token"] ?? "",
            "user" => $input["user"] ?? new stdClass,
        ];
        $result = $this->create($login);
        return $result;
        
    }
}