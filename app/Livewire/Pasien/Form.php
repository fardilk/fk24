<?php

namespace App\Http\Livewire\Pasien;

use Livewire\Component;
use App\Models\Pasien;

class Form extends Component
{
    public $pasien_id;

    // Data pasien
    public $nama_lengkap, $tempat_lahir, $tanggal_lahir, $jenis_kelamin;
    public $golongan_darah, $agama, $status_perkawinan, $kewarganegaraan;
    public $bahasa, $suku_bangsa, $pendidikan_terakhir, $pekerjaan;

    // Alamat
    public $alamat_ktp, $alamat_domisili, $kelurahan, $kecamatan;
    public $kota, $provinsi, $kode_wilayah;

    // Kontak
    public $kode_negara = '+62', $no_hp, $email;

    // Kontak darurat
    public $hubungan_darurat, $nama_kontak_darurat;
    public $kode_negara_darurat = '+62', $no_hp_darurat, $email_darurat;

    public function save()
    {
        $data = $this->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required',
            'no_hp' => 'nullable|string',
            'email' => 'nullable|email',
            // Tambahkan validasi lainnya sesuai field
        ]);

        $data['kode_negara'] = $this->kode_negara;
        $data['kode_negara_darurat'] = $this->kode_negara_darurat;

        Pasien::updateOrCreate(
            ['id' => $this->pasien_id],
            array_merge($this->all(), $data)
        );

        session()->flash('message', 'Data pasien berhasil disimpan.');

        return redirect()->route('master.pasien');
    }

    public function render()
    {
        return view('livewire.pasien.form');
    }
}





