<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 13:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UsersQuestion
 * 
 * @property int $id
 * @property float $complexity
 * @property string $state
 * @property int $user_id
 * @property int $question_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Question $question
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $complaints
 *
 * @package App\Models
 */
class UsersQuestion extends Eloquent
{
	protected $casts = [
		'complexity' => 'float',
		'user_id' => 'int',
		'question_id' => 'int'
	];

	protected $fillable = [
		'complexity',
		'state',
		'user_id',
		'question_id'
	];

	public function question()
	{
		return $this->belongsTo(\App\Models\Question::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function complaints()
	{
		return $this->hasMany(\App\Models\Complaint::class);
	}
}
