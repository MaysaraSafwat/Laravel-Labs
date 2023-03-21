<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'title' => ['required', 'min:3'],
                'description' => ['required', 'min:10'],
                'post_id' => ['exists:posts,post_id']
          
        ];
    }

    public function messages():array{
        return [
            'title.required'=> 'Please fill the title',
            'description.required'=> "Please fill the description"
            
        ];
    }
    
}
