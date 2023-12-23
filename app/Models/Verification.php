<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Veelasky\LaravelHashId\Eloquent\HashableId;

class Verification extends Model
{
    use HasFactory;
    use HashableId;

    public const STATUS_APPROVE = "Disetujui";
    public const STATUS_REVISION = "Perlu diperbaiki";
    public const STATUS_REJECT = "Ditolak";

    protected $table = "verifications";

    protected $primaryKey = "id";

    protected $fillable = [
        'submission_id',
        'operator_id',
        'status',
        'description',
    ];

    protected $appends = ['hash'];
    protected $hidden = ['id'];

    /**
     * Get the user that owns the Verification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function villager()
    {
        return $this->belongsTo(Villager::class, 'villager_id');
    }

}
