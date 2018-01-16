<?php

use Illuminate\Database\Seeder;
use App\MRP;
use App\Pegawai;
use App\FormasiJabatan;
use Carbon\Carbon;

class MRPTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mrp = new MRP;
        $mrp->id = Uuid::generate();
        $mrp->registry_number = '7807299Z.Rotasi.151666060101_151666060302';
        $mrp->jenis_mutasi = 'Dinas';
        $mrp->mutasi = 'Rotasi';
        $mrp->jalur_mutasi = 'Intern Divisi Antar Bidang';
        $mrp->no_dokumen_unit_asal = '00215/SIM.03.01KDIVSTI/2017-R';
        $mrp->tgl_dokumen_unit_asal = '2017-06-05';
        $mrp->alasan_mutasi = 'Iseng aja';
        $mrp->no_dokumen_unit_mutasi = '4019289421';
        $mrp->tgl_dokumen_unit_mutasi = Carbon::parse('2017-01-01');
        $mrp->tgl_evaluasi = Carbon::parse('2017-01-11');
        $mrp->tgl_pooling = Carbon::parse('2017-01-16');
        $mrp->no_dokumen_mutasi = '387423423';
        $mrp->tgl_dokumen_mutasi = Carbon::parse('2017-01-05');
        $mrp->status = 1;
        $mrp->pegawai_id = Pegawai::first()->id;
        $mrp->formasi_jabatan_id = FormasiJabatan::first()->id;
        $mrp->save();

    }
}