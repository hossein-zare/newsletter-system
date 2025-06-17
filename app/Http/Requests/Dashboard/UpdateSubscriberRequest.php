<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;

class UpdateSubscriberRequest extends StoreSubscriberRequest
{
    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:100', Rule::unique('subscribers')->ignoreModel($this->subscriber)],
        ] + parent::rules();
    }
}
