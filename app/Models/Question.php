<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 18:46:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Question
 * 
 * @property int $id
 * @property string $text
 * @property string $state
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $answers
 * @property \Illuminate\Database\Eloquent\Collection $categories_questions
 * @property \Illuminate\Database\Eloquent\Collection $questions_categories
 * @property \Illuminate\Database\Eloquent\Collection $tags
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Question extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'text',
		'state'
	];

	public function answers()
	{
		return $this->hasOne(\App\Models\Answer::class);
	}

	public function categories_questions()
	{
		return $this->hasMany(\App\Models\CategoriesQuestion::class);
	}

	public function questions_categories()
	{
		return $this->hasMany(\App\Models\QuestionsCategory::class);
	}

	public function tags()
	{
		return $this->belongsToMany(\App\Models\Tag::class, 'questions_tags')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class, 'users_questions')
					->withPivot('id', 'complexity', 'state', 'deleted_at')
					->withTimestamps();
	}
}
