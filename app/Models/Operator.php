<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Veelasky\LaravelHashId\Eloquent\HashableId;

class Operator extends Model
{
    use HasFactory;
    use HashableId;

    public const POSITION_KETUA_RW = "Ketua RW";
    public const POSITION_KETUA_RT = "Ketua RT";
    public const POSITION_WARGA = "Warga";

    protected $table = "operators";

    protected $primaryKey = "id";

    protected $fillable = [
        'region_rt',
        'position',
        'villager_id',
    ];

    protected $appends = ['hash'];
    protected $hidden = ['id'];
}
