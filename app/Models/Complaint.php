<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 13:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Complaint
 * 
 * @property int $id
 * @property string $text
 * @property int $users_question_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\UsersQuestion $users_question
 *
 * @package App\Models
 */
class Complaint extends Eloquent
{
	protected $casts = [
		'users_question_id' => 'int'
	];

	protected $fillable = [
		'text',
		'users_question_id'
	];

	public function users_question()
	{
		return $this->belongsTo(\App\Models\UsersQuestion::class);
	}
}
