<?php

namespace App\Http\Requests\V1\User\Balance;

use App\Enums\Currency\CurrencyNameEnum;
use App\Enums\Transaction\TransactionReasonEnum;
use App\Enums\Transaction\TransactionTypeEnum;
use App\Http\Requests\BaseRequest;
use App\Repository\Currency\CurrencyRepository;
use Illuminate\Validation\Rule;

/**
 * @property int $userId
 * @property string $type,
 * @property int $amount
 * @property string $currency,
 * @property string $reason
 */
class UpdateBalanceRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required','string', Rule::enum(TransactionTypeEnum::class)],
            'amount' => 'required|integer',
            'currency' => ['required','string', Rule::enum(CurrencyNameEnum::class)],
            'reason' => ['required', 'string', Rule::enum(TransactionReasonEnum::class)]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'type.required' => 'Transaction type is required',
            'type.string' => 'Transaction type mast be of string type',
            'type.enum' => 'Available only this transaction types: ' . implode(', ', TransactionTypeEnum::values()),
            'amount.required' => 'Amount is required',
            'amount.integer' => 'Amount mast be integer',
            'currency.required' => 'Currency is required',
            'currency.string' => 'Currency mast be string type',
            'currency.enum' => 'Available only this currencies: ' . implode(', ', CurrencyNameEnum::values()),
            'reason.required' => 'Reason is required',
            'reason.string' => 'Reason mast be string type',
            'reason.enum' => 'Available only this reasons: ' . implode(', ', TransactionReasonEnum::values()),
        ];
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation(): void
    {
        $this->merge([
            'userId' => $this->user()->id,
            'currencyId' => CurrencyRepository::byName(CurrencyNameEnum::from($this->currency))->id,
        ]);
    }
}
