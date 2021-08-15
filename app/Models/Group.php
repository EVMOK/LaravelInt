<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * Массово присваиваемые атрибуты.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public $timestamps = true;

    /**
     * Получить всех студентаов группы.
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public static function groupList(): array
    {
        return self::pluck('name', 'id')->toArray();
    }
}
