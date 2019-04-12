<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 18:46:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CategoriesQuestion
 * 
 * @property int $id
 * @property int $question_id
 * @property int $category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\Question $question
 *
 * @package App\Models
 */
class CategoriesQuestion extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'question_id' => 'int',
		'category_id' => 'int'
	];

	protected $fillable = [
		'question_id',
		'category_id'
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
