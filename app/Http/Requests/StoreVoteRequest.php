<?php

namespace App\Http\Requests;

use App\Enums\AnswerType;
use App\Models\Option;
use App\Models\Vote;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Closure;

class StoreVoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->route('poll')->active &&
            !Vote::whereBelongsTo($this->user())->whereBelongsTo($this->route('poll'))->first();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'options' => [
                'required',
                'array',
                'list',
                'min:1',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (
                        $this->route('poll')->answer_type == AnswerType::SINGLE &&
                        is_array($value) && count($value) > 1
                    ) {
                        $fail("The attribute {$attribute} is invalid.");
                    }
                },
                // the following rule will throw SQL error if someone tries to tamper values (not numbers)
                // it's not ideal but it shouldn't cause trouble, if it does, custom rule will be the way...
                // Btw it's defined here instead of on its children below due to N+1 query problems
                Rule::exists(Option::class, 'id')->where('poll_id', $this->route()->originalParameter('poll')),
            ],
            'options.*' => [
                'required',
                'distinct',
            ],
        ];
    }
}
