<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    protected $fillable = ['name', 'group_id', 'date_born', 'user_id'];

    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить группу студента.
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Получить все оценки студента.
     */
    public function scores(): BelongsToMany
    {
        return $this->belongsToMany(Score::class);
    }
}
