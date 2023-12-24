<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Veelasky\LaravelHashId\Eloquent\HashableId;

class Submission extends Model
{
    use HasFactory;
    use HashableId;

    public const TYPE_BORN = "Akta Kelahiran";
    public const TYPE_DIE = "Akta Kematian";
    public const TYPE_POOR = "Keterangan Tidak Mampu";

    public const STATUS_APPROVE = "Disetujui";
    public const STATUS_NEED_VERIF = "Perlu di verifikasi";
    public const STATUS_REJECT = "Ditolak";

    public const MARITAL_STATUS_MARRIED = "Kawin";
    public const MARITAL_STATUS_SINGLE = "Tidak Kawin";

    protected $table = "submissions";

    protected $primaryKey = "id";

    protected $fillable = [
        'villager_id',
        'region_rt',
        'type',
        'name',
        'nik',
        'gender',
        'religion',
        'address',
        'job',
        'nationaly',
        'place_of_birth',
        'date_of_birth',
        'attachment',
        'description',
        'marital_status',
        'is_rw_approve',
        'is_rt_approve',
        'letter_number',
        'status'
    ];

    protected $appends = ['hash'];
    protected $hidden = ['id'];

    /**
     * Get the user that owns the Submission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function villager()
    {
        return $this->belongsTo(Villager::class, 'villager_id');
    }
}
