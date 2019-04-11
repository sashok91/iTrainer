<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 13:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class QuestionComment
 * 
 * @property int $id
 * @property string $text
 * @property string $state
 * @property int $users_question_id
 * @property int $comment_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\QuestionComment $question_comment
 * @property \Illuminate\Database\Eloquent\Collection $question_comments
 *
 * @package App\Models
 */
class QuestionComment extends Eloquent
{
	protected $casts = [
		'users_question_id' => 'int',
		'comment_id' => 'int'
	];

	protected $fillable = [
		'text',
		'state',
		'users_question_id',
		'comment_id'
	];

	public function question_comment()
	{
		return $this->belongsTo(\App\Models\QuestionComment::class, 'comment_id');
	}

	public function question_comments()
	{
		return $this->hasMany(\App\Models\QuestionComment::class, 'comment_id');
	}
}
