<?php

namespace Bantenprov\BGBurukPerawatan\Models\Bantenprov\BGBurukPerawatan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BGBurukPerawatan extends Model
{

    protected $table = 'bg_buruk_perawatans';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\BGBurukPerawatan\Models\Bantenprov\BGBurukPerawatan\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\BGBurukPerawatan\Models\Bantenprov\BGBurukPerawatan\Regency','id','regency_id');
    }

}

