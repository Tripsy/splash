<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Commercial extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commercial';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'type',
        'category_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'category_id' => 'integer',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'type' => 'basic',
    ];

    /**
     * Allowed values for type attribute.
     *
     * @var array
     */
    const TYPES = ['basic', 'extra', 'ultra'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    protected $appends = [
        'category'
    ];

    /**
     * @param string $value
     *
     * @return void
     */
    public function setTypeAttribute(string $value): void
    {
        if (in_array($value, self::TYPES)) {
            $this->attributes['type'] = $value;
        } else {
            $this->attributes['type'] = $this->attributes['type'];
        }
    }

    /**
     * Scope a query to filter by type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param int $category_id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeType(\Illuminate\Database\Eloquent\Builder $query, string $type): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('type', '=', $type);
    }

    /**
     * Scope a query to filter by category.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param int $category_id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategory(\Illuminate\Database\Eloquent\Builder $query, int $category_id): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('category_id', '=', $category_id);
    }

    /**
     * @return Category
     */
    public function getCategoryAttribute(): Category
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->first();
    }
}
