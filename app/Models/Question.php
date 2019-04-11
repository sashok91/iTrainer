<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 13:10:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Question
 * 
 * @property int $id
 * @property string $text
 * @property string $state
 * @property int $category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Category $category
 * @property \Illuminate\Database\Eloquent\Collection $answers
 * @property \Illuminate\Database\Eloquent\Collection $questions_categories
 * @property \Illuminate\Database\Eloquent\Collection $tags
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Question extends Eloquent
{
	protected $casts = [
		'category_id' => 'int'
	];

	protected $fillable = [
		'text',
		'state',
		'category_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function answers()
	{
		return $this->hasMany(\App\Models\Answer::class);
	}

	public function questions_categories()
	{
		return $this->hasMany(\App\Models\QuestionsCategory::class);
	}

	public function tags()
	{
		return $this->belongsToMany(\App\Models\Tag::class, 'questions_tags')
					->withPivot('id')
					->withTimestamps();
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class, 'users_questions')
					->withPivot('id', 'complexity', 'state')
					->withTimestamps();
	}
}
