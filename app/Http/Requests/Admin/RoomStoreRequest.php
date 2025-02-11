<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoomStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'room_number' => ['required', 'string', 'max:255'],
            'bed_count' => ['required', 'integer'],
            'room_type' => ['required', 'string', 'in:General,Private,ICU'],
            'room_status' => ['required', 'string', 'in:Available,Occupied,Maintenance'],
        ];
    }
}