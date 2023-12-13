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

    protected $table = "submissions";

    protected $primaryKey = "id";

    protected $fillable = [
        'villager_id',
        'type',
        'name',
        'nik',
        'gender',
        'attachment',
        'description',
        'date',
        'is_rw_approve',
        'is_rt_approve',
        'letter_number'
    ];

    protected $appends = ['hash'];
    protected $hidden = ['id'];
}
