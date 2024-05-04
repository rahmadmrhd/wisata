<?php

namespace App\Http\Requests;

use App\Models\Pengunjung;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PengunjungRequest extends FormRequest {
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
      'kode' => ['required', 'string', 'max:8', Rule::unique(Pengunjung::class)->ignore($this->pengunjung?->id ?? 0)],
      'no_ktp' => ['required', 'string', 'max:16'],
      'nama' => ['required', 'string', 'min:3', 'max:255'],
      'alamat' => ['required', 'string', 'max:255'],
      'jenis_kelamin' => ['required', 'string', 'in:L,P'],
      'tgl_berkunjung' => ['required', 'date'],
    ];
  }
}
