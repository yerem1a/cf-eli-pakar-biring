<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilDiagnosa extends Model
{
        protected $table = 'hasil_diagnosa'; // ← tambahkan ini

    protected $fillable = ['gangguan_id', 'cf_hasil'];

    public function gangguan()
    {
        return $this->belongsTo(Gangguan::class);
    }

}