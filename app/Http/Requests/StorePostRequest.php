<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
                'title' => ['required', 'min:3','unique:App\Models\Post,title'],
                'description' => ['required', 'min:10']
           
          
        ];
    }

    public function messages():array{
        return [
            'title.required'=> 'Please fill the title',
            'description.required'=> "Please fill the description",
            'image' => ['required','mimes:jpg,png'],
            'post_id' => ['exists:posts,post_id']
        ];
    }
    
}
