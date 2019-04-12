<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 11 Apr 2019 18:46:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Link
 * 
 * @property int $id
 * @property string $href
 * @property string $text
 * @property int $answer_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Answer $answer
 *
 * @package App\Models
 */
class Link extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'answer_id' => 'int'
	];

	protected $fillable = [
		'href',
		'text',
		'answer_id'
	];

	public function answer()
	{
		return $this->belongsTo(\App\Models\Answer::class);
	}
}
