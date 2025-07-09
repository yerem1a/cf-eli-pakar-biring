<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = ['gangguan_id', 'gejala_id', 'cf_pakar'];

    public function gangguan()
    {
        return $this->belongsTo(Gangguan::class);
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}