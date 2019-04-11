<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 13:10:33 +0000.
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
 * 
 * @property \Illuminate\Database\Eloquent\Collection $questions
 * @property \Illuminate\Database\Eloquent\Collection $questions_categories
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $fillable = [
		'name'
	];

	public function questions()
	{
		return $this->hasMany(\App\Models\Question::class);
	}

	public function questions_categories()
	{
		return $this->hasMany(\App\Models\QuestionsCategory::class);
	}
}
