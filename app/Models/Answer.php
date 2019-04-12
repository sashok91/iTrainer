<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 18:46:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Answer
 * 
 * @property int $id
 * @property string $short_answer
 * @property string $long_answer
 * @property bool $is_correct
 * @property int $question_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Question $question
 * @property \Illuminate\Database\Eloquent\Collection $links
 *
 * @package App\Models
 */
class Answer extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'is_correct' => 'bool',
		'question_id' => 'int'
	];

	protected $fillable = [
		'short_answer',
		'long_answer',
		'is_correct',
		'question_id'
	];

	public function question()
	{
		return $this->belongsTo(\App\Models\Question::class);
	}

	public function links()
	{
		return $this->hasMany(\App\Models\Link::class);
	}
}
