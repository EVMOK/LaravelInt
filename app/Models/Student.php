<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * Массово присваиваемые атрибуты.
     *
     * @var array
     */
    protected $fillable = ['name', 'group_id', 'date_born'];

    public $timestamps = true;
    
    /**
     * Получить группу студента.
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Получить все оценки студента.
     */
    public function scores()
    {
        return $this->belongsToMany(Score::class);
    }
}
