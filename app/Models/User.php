<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 18:46:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $role
 * @property string $password
 * @property string $api_token
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $questions
 *
 * @package App\Models
 */
class User extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'api_token',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'role',
		'password',
		'api_token',
		'remember_token'
	];

	public function questions()
	{
		return $this->belongsToMany(\App\Models\Question::class, 'users_questions')
					->withPivot('id', 'complexity', 'state', 'deleted_at')
					->withTimestamps();
	}
}
