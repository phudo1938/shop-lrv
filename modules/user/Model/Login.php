<?php

namespace Modules\User\Model;
use Illuminate\Database\Eloquent\Model;

/** 
 * Lưu thông tin người dùng đang đăng nhập (session)
 * 
 * @property string $_id
 * @property string $iduser _id của Modules\User\Model\User
 * @property string $session_id session của server
 * @property string $access_token token dùng cho api
 * @property string $remember_token dùng cho chức năng ghi nhớ đăng nhập
 * @property string $ip
 * @property int $timed thời gian đăng nhập
 * @property int $status ???w
 * 
*/

class Login extends Model{

    // use SoftDeletes;

    protected $connection = "shop";
	public $timestamps = false;

    protected $fillable = [
        "_id",
        "iduser",
        "session_id",
        "access_token",
        "remember_token",
        "ip",
        "timed",
        "status",
    ];   

    protected $attributes = [
        "iduser" => "",
        "session_id" => "",
        "remember_token" => "",
        "ip" => "",
        "timed" => 0,
        "status" => 0,
        "user" => null,
    ];   

	protected $hidden = [
		'session_id', 'remember_token', 'access_token'
	];
}