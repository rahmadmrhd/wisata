<?php

namespace App\Http\Requests;

use App\Models\TempatWisata;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TempatWisataRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array {
    return [
      'kode' => ['required', 'string', 'max:8', Rule::unique(TempatWisata::class)->ignore($this->tempat_wisata?->id ?? 0)],
      'nama' => ['required', 'string', 'min:3', 'max:255'],
      'tahun_buka' => ['required', 'string', 'size:4'],
      'harga_tiket' => ['required', 'numeric'],
      'jam_buka' => ['required', 'date_format:H:i'],
      'jam_tutup' => ['required', 'date_format:H:i', 'after:jam_buka'],
      'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
    ];
  }
}
