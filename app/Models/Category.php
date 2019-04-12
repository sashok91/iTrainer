<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 18:46:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $categories_questions
 * @property \Illuminate\Database\Eloquent\Collection $questions_categories
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'name'
	];

	public function categories_questions()
	{
		return $this->hasMany(\App\Models\CategoriesQuestion::class);
	}

	public function questions_categories()
	{
		return $this->hasMany(\App\Models\QuestionsCategory::class);
	}
}
