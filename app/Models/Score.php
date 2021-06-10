<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'scores';

    /**
     * Массово присваиваемые атрибуты.
     *
     * @var array
     */
    protected $fillable = ['student_id', 'group_id', 'value'];

    public $timestamps = true;

    /**
     * Получить предмет.
     */
    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
}
