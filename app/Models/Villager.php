<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Veelasky\LaravelHashId\Eloquent\HashableId;

class Villager extends Model
{
    use HasFactory;
    use HashableId;

    public const RT1 = "RT 01";
    public const RT2 = "RT 02";
    public const RT3 = "RT 03";
    public const RT4 = "RT 04";
    public const RT5 = "RT 05";

    public const RELIGION_ISLAM = "Islam";
    public const RELIGION_KRISTEN = "Kristen";
    public const RELIGION_KATOLIK = "Katolik";
    public const RELIGION_HINDHU = "Hindhu";
    public const RELIGION_BUDHA = "Budha";
    public const RELIGION_KONGHUCU = "Konghucu";

    public const GENDER_MAN = "Laki-Laki";
    public const GENDER_WOMEN = "Perempuan";

    protected $table = "villagers";
    protected $primaryKey = "id";
    protected $fillable = [
        'region_rt',
        'nik',
        'number_kk',
        'name',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'religion',
        'address',
        'job',
        'nationaly',
        'phone_number',
        'status_account',
        'is_operator',
    ];

    protected $appends = ['hash'];
    protected $guarded = ['id'];

    /**
     * Get the user associated with the Villager
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the user associated with the Villager
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function operator()
    {
        return $this->hasOne(Operator::class);
    }

    /**
     * Get the user associated with the Villager
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function submission()
    {
        return $this->hasOne(Submission::class);
    }
}
