<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;
    use HasUuids;

    /**
     * Summary of fillable
     * @var array<int, string>
     */
    protected $fillable = [
      'uuid'
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
     * Address relationship
     * @return HasOne
     */
    public function address(): HasOne
    {
      return $this->hasOne(Address::class, 'property_id', 'id');
    }
}
