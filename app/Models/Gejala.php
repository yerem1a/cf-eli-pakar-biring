<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $fillable = ['gangguan_id', 'pertanyaan'];

    public function gangguan()
    {
        return $this->belongsTo(Gangguan::class);
    }

    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
}