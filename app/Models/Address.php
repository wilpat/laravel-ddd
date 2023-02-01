<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    use HasUuids;

    /**
     * Summary of fillable
     * @var array<int, string>
     */
    protected $fillable = [
      'uuid',
      'property_id',
      'line_1',
      'line_2',
      'postcode',
    ];

    /**
     * Unique IDs to use in uuid generation
     * @return array<string>
     */
    public function uniqueIds()
    {
      return ['uuid'];
    }

    /**
     * Property relationship
     * @return BelongsTo
     */
    public function property(): BelongsTo
    {
      return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
