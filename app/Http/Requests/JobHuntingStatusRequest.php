<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class JobHuntingStatusRequest extends FormRequest
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
            'corporation_id' => 'required|integer',
            'priority' => 'sometimes|integer',
            'user_id' => 'required|integer',
            'way_id' => 'required|integer',
            'note' =>  'present|string|max:255',
            'status_id' => 'required|integer',
            'submit' => 'sometimes|date',
            'interview1' => 'sometimes|date',
            'interview2' => 'sometimes|date',
            'interview_last' => 'sometimes|date',
        ];
    }

    public function messages()
    {
        return [
            'corporation_id.required' => '対象企業を指定してください。',
            'way_id.required' => '就活に用いたサイトを指定してください',
            'note.max' => '備考欄は255文字以内である必要があります。',
            'status_id.required' => '選考状況を指定してください',
            'submit.date' => '書類提出日をstrtotime形式で入力してください',
            'interview1.date' => '1次選考日をstrtotime形式で入力してください',
            'interview2.date' => '2次選考日をstrtotime形式で入力してください',
            'interview_last.date' => '最終選考日をstrtotime形式で入力してください',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
