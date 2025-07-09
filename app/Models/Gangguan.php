<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gangguan extends Model
{
    protected $fillable = ['nama_gangguan'];

    public function gejala()
    {
        return $this->hasMany(Gejala::class);
    }

    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
}