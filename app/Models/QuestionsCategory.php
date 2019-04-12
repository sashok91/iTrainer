<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 18:46:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class QuestionsCategory
 * 
 * @property int $id
 * @property int $category_id
 * @property int $question_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\Question $question
 *
 * @package App\Models
 */
class QuestionsCategory extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'category_id' => 'int',
		'question_id' => 'int'
	];

	protected $fillable = [
		'category_id',
		'question_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function question()
	{
		return $this->belongsTo(\App\Models\Question::class);
	}
}
