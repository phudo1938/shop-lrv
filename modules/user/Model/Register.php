<?php

namespace Modules\User\Model;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
class Register extends Authenticatable
{
    protected $connection = 'shop';
    protected $collection = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'status',
    ];
    public function __get($field) {
        switch ($field) {
            case 'canSaleTakeCare':
                return $this->getField($field, function() {
                    return Auth::check() && (Auth::user()->isPermission() || $this->idsale == Auth::user()->_id);
                });
            default:
                return parent::__get($field);
        }
    }
}