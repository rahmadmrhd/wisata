<?php

namespace App\Exports;

use App\Models\Pengunjung;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithProperties;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PengunjungExport implements WithHeadings,  FromCollection, WithMapping, ShouldAutoSize, WithColumnFormatting {
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection() {
    return Pengunjung::latest()->get();
  }
  public function map($row): array {
    return [
      "'" . $row->kode,
      "'" . $row->no_ktp,
      $row->nama,
      $row->alamat,
      $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
      Date::dateTimeToExcel(\Carbon\Carbon::parse($row->tgl_berkunjung)),
      Date::dateTimeToExcel($row->created_at),
    ];
  }

  public function columnFormats(): array {
    return [
      'A' => NumberFormat::FORMAT_GENERAL,
      'B' => NumberFormat::FORMAT_GENERAL,
      'C' => NumberFormat::FORMAT_TEXT,
      'D' => NumberFormat::FORMAT_TEXT,
      'E' => NumberFormat::FORMAT_TEXT,
      'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
      'G' => NumberFormat::FORMAT_DATE_DATETIME,
    ];
  }

  public function headings(): array {
    return [
      'Kode Pengunjung',
      'NIK',
      'Nama',
      'Alamat',
      'Jenis Kelamin',
      'Tanggal Berkunjung',
      'Tanggal Dibuat',
    ];
  }
}
