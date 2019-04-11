<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 13:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tag
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $questions
 *
 * @package App\Models
 */
class Tag extends Eloquent
{
	protected $fillable = [
		'name'
	];

	public function questions()
	{
		return $this->belongsToMany(\App\Models\Question::class, 'questions_tags')
					->withPivot('id')
					->withTimestamps();
	}
}
