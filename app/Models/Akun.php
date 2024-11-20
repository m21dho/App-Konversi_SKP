<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akuns';
    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $fillable = ['nidn', 'id', 'nama', 'jabatan', 'foto'];
    
    public function user()
    {
    return $this->belongsTo(User::class, 'id', 'id');
    }
    public function akun()
    {
        return $this->hasOne(Akun::class, 'id', 'id');
    }
    
}
