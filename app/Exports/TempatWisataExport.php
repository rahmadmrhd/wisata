<?php

namespace App\Exports;

use App\Models\TempatWisata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class TempatWisataExport implements WithHeadings,  FromCollection, WithMapping, ShouldAutoSize, WithColumnFormatting {
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection() {
    return TempatWisata::latest()->get();
  }

  public function map($row): array {
    return [
      "'" . $row->kode,
      $row->nama,
      $row->tahun_buka,
      $row->harga_tiket,
      \Carbon\Carbon::createFromFormat('H:i:s', $row->jam_buka)->format('h:i') . " - " . \Carbon\Carbon::createFromFormat('H:i:s', $row->jam_tutup)->format('h:i'),
      Date::dateTimeToExcel($row->created_at),
    ];
  }

  public function columnFormats(): array {
    return [
      'A' => NumberFormat::FORMAT_GENERAL,
      'B' => NumberFormat::FORMAT_TEXT,
      'C' => NumberFormat::FORMAT_TEXT,
      'D' => NumberFormat::FORMAT_NUMBER_00,
      'E' => NumberFormat::FORMAT_DATE_TIME1,
      'F' => NumberFormat::FORMAT_DATE_DATETIME,
    ];
  }

  public function headings(): array {
    return [
      'Kode',
      'Nama',
      'Tahun Buka',
      'Harga Tiket',
      'Jam Operasional',
      'Tanggal Dibuat',
    ];
  }
}
