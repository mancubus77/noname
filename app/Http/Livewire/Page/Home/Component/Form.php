<?php

namespace App\Http\Livewire\Page\Home\Component;

use Illuminate\Validation\Rule;
use Livewire\Component;

class Form extends Component
{
    /**
     * @var integer
     */
    public $step = 1;

    /**
     * @var boolean
     */
    public $submited = false;

    /**
     * @var array[]
     */
    public $fields = [];

    /**
     * Rules validation.
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'fields'                     => ['required', 'array'],

            # Main information
            'fields.first_name'           => ['required', 'string'],
            'fields.preferred_name'      => ['string'],
            'fields.middle_initial'      => ['required', 'string'],
            'fields.last_name'           => ['required', 'string'],
            'fields.dob'                 => ['required', 'string'],
            'fields.gender'              => ['required', 'in:male,female'],
            'fields.marital_status'      => ['nullable', 'in:single,married,defacto,divorsed'],

            # Contact information
            'fields.phone'               => ['required'],
            'fields.email'               => ['required', 'email'],
            'fields.address'             => ['required', 'string'],
            'fields.australian_resident' => ['required', 'in:yes,no'],

            # Occupation
            'fields.occupation'          => ['required', 'string'],
            'fields.employment_status'   => ['required', 'in:full_time,ocasional,half_time,other'],
            'fields.custom_employment_status' => [
                Rule::requiredIf(fn() => $this->fields['employment_status'] == 'other')
            ],

            # Bank information
            'fields.tfn'                 => ['required', 'numeric', 'min:1'],
            'fields.bank_name'           => ['required', 'string'],
            'fields.bank_bsd'            => ['required', 'numeric', 'min:1'],
            'fields.bank_number'         => ['required', 'numeric', 'min:1'],

            # Invest information
            'fields.have_initially'      => ['numeric', 'min:1'],
            'fields.income_month'        => ['nullable', 'in:yes,no'],
            'fields.amount'              => ['required', 'in:yes,no'],
            'fields.investment_advice'   => ['required', 'in:yes,no'],
            'fields.personal_detail'     => [ Rule::requiredIf(fn() => $this->fields['investment_advice'] == 'yes')],
            'fields.step_children'       => [ Rule::requiredIf(fn() => $this->fields['investment_advice'] == 'yes')],
            'fields.name_dob_gender_age' => [ Rule::requiredIf(fn() => $this->fields['investment_advice'] == 'yes')],
            'fields.financial_assistance' => [ Rule::requiredIf(fn() => $this->fields['investment_advice'] == 'yes')],
            'fields.involved_financially' => [ Rule::requiredIf(fn() => $this->fields['investment_advice'] == 'yes')],
        ];
    }

    /**
     * updated field.
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Mount component.
     */
    public function mount(): void
    {
        # Set default values
        $this->fields['dob'] = now()->format('d.m.Y');
        $this->fields['gender'] = 'male';
        $this->fields['australian_resident'] = 'yes';
        $this->fields['employment_status'] = 'full_time';
        $this->fields['amount'] = 'yes';
        $this->fields['investment_advice'] = 'yes';
    }

    /**
     * Next step.
     */
    public function nextStep(): void
    {
        switch ($this->step) {
            case 1:
                $this->validateOnly('fields.first_name');
                $this->validateOnly('fields.preferred_name');
                $this->validateOnly('fields.middle_initial');
                $this->validateOnly('fields.last_name');
                $this->validateOnly('fields.dob');
                $this->validateOnly('fields.gender');
                $this->validateOnly('fields.marital_status');
            break;

            case 2:
                $this->validateOnly('fields.phone');
                $this->validateOnly('fields.email');
                $this->validateOnly('fields.address');
                $this->validateOnly('fields.australian_resident');
            break;

            case 3:
                $this->validateOnly('fields.occupation');
                $this->validateOnly('fields.employment_status');
                $this->validateOnly('fields.custom_employment_status');
            break;

            case 4:
                $this->validateOnly('fields.tfn');
                $this->validateOnly('fields.bank_name');
                $this->validateOnly('fields.bank_bsd');
                $this->validateOnly('fields.bank_number');
            break;

            case 5:
                $this->validateOnly('fields.have_initially');
                $this->validateOnly('fields.income_month');
                $this->validateOnly('fields.amount');
                $this->validateOnly('fields.investment_advice');
                $this->validateOnly('fields.personal_detail');
                $this->validateOnly('fields.step_children');
                $this->validateOnly('fields.name_dob_gender_age');
                $this->validateOnly('fields.financial_assistance');
                $this->validateOnly('fields.involved_financially');

                $this->submited = true;
            break;
        }

        $this->step++;
    }

    /**
     * Back step.
     */
    public function backStep(): void
    {
        $this->step--;
    }
}
