<?php

namespace App\Models;

use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

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

    /**
     * @param Builder $builder
     * @param QueryFilter $filter
     */
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        $filter->apply($builder);
    }
}
