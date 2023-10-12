<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use function Webmozart\Assert\Tests\StaticAnalysis\integer;

class ItemCreateRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|max:255',
            'stock' => 'required',
            'album_id' => 'required',
            'precio' => 'required',
        ];
    }
}
