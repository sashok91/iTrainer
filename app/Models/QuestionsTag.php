<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 13:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class QuestionsTag
 * 
 * @property int $id
 * @property int $question_id
 * @property int $tag_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Question $question
 * @property \App\Models\Tag $tag
 *
 * @package App\Models
 */
class QuestionsTag extends Eloquent
{
	protected $casts = [
		'question_id' => 'int',
		'tag_id' => 'int'
	];

	protected $fillable = [
		'question_id',
		'tag_id'
	];

	public function question()
	{
		return $this->belongsTo(\App\Models\Question::class);
	}

	public function tag()
	{
		return $this->belongsTo(\App\Models\Tag::class);
	}
}
