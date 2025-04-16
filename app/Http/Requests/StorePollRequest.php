<?php

namespace App\Http\Requests;

use App\Enums\AnswerType;
use App\Enums\PollType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StorePollRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question' => [
                'required',
                'string',
                'max:255',
            ],
            'details' => [
                'string',
                'nullable',
            ],
            'type' => [
                'required',
                'string',
                Rule::enum(PollType::class),
            ],
            'answerType' => [
                'required',
                'string',
                Rule::enum(AnswerType::class),
            ],
            'answer' => [
                'required',
                'array',
                'min:2',
            ],
            'answer.*' => [
                'required',
                'string',
                'max:255',
            ],
            'additional' => [
                'sometimes',
                'array',
                'min:2',
            ],
            'additional.*' => [
                'sometimes',
                'string',
                'nullable',
            ],
        ];
    }
}
