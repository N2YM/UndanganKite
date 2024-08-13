<?php
namespace App\Models\Admin\SampelUndangan\Kategori;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SampelUndangan\SampelUndangan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wedding extends Model
{
    use HasFactory;
    protected $table = 'user__wedding';

    protected $fillable = [
        'judul_acara',
        'kata_sambutan',
        'countdown',
        'np_pria',
        'np_wanita',
        'nl_pria',
        'nl_wanita',
        'inisial_pria',
        'inisial_wanita',
        'foto_pria',
        'foto_wanita',
        'ucapan_terima_kasih',
        'ayah_pria',
        'ibu_pria',
        'alamat_org_tua_mp',
        'ayah_wanita',
        'ibu_wanita',
        'alamat_org_tua_mw',
        'lokasi_acara_akad',
        'jam_mulai_akad',
        'jam_selesai_akad',
        'latitude_akad',
        'longitude_akad',
        'lokasi_acara_resepsi',
        'jam_mulai_resepsi',
        'jam_selesai_resepsi',
        'latitude_resepsi',
        'longitude_resepsi',
        'tanggal_kenalan',
        'cerita_kenalan',
        'tanggal_jadian',
        'cerita_jadian',
        'tanggal_tunangan',
        'cerita_tunangan',
        'tanggal_nikah',
        'cerita_nikah',
        'font',
        'gallery',
    ];

    public function sampelUndangans()
    {
        return $this->hasMany(SampelUndangan::class, 'wedding_id');
    }
}
