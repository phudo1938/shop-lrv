<?php
namespace Modules\User\Service;

use Modules\User\Model\User;

interface LoginService {
    public function create($input);
}