<form wire:submit.prevent="finish">

    @if($submited)
        <div class="flex flex-col items-center justify-center space-y-6">
            @if($fields['have_initially'] >= 100000)
                <img src="/img/1.jpeg" class="w-full rounded overflow-hidden" alt="">
            @else
                <img src="/img/2.jpeg" class="w-full rounded overflow-hidden" alt="">
            @endif
            <a href="{{ route('home') }}" class="text-xs text-gray-400 underline hover:no-underline">Back to home</a>
        </div>
    @else
        <header class="flex items-center justify-between">
            <div class="flex-1">
                <h1 class="text-lg font-medium">Expert system</h1>
                <div class="text-gray-500 text-sm uppercase">
                    @switch($step)
                        @case(1) Personal information @break
                        @case(2) Contact information @break
                        @case(3) Occupation @break
                        @case(4) Bank information @break
                        @case(5) Invest information @break
                    @endswitch
                </div>
            </div>
            <div class="font-bold text-indigo-500">
                Step {{ $step }}/5
            </div>
        </header>

        <section class="mt-6">
            @switch($step)
                @case(1)
                    <div class="flex flex-col space-y-4">
                        <!-- first_name -->
                        <x-input.group label="First Name" for="first_name" :error="$errors->first('fields.first_name')" required>
                            <x-input.text wire:model.lazy="fields.first_name" id="first_name" type="text" placeholder="First Name" />
                        </x-input.group>

                        <!-- preferred_name -->
                        <x-input.group label="Preferred name" for="preferred_name" :error="$errors->first('fields.preferred_name')">
                            <x-input.text wire:model.lazy="fields.preferred_name" id="preferred_name" type="text" placeholder="Preferred name" />
                        </x-input.group>

                        <!-- preferred_name -->
                        <x-input.group label="Middle Initial" for="middle_initial" :error="$errors->first('fields.middle_initial')" required>
                            <x-input.text wire:model.lazy="fields.middle_initial" id="middle_initial" type="text" placeholder="Middle Initial" />
                        </x-input.group>

                        <!-- last_name -->
                        <x-input.group label="Last Name" for="last_name" :error="$errors->first('fields.last_name')" required>
                            <x-input.text wire:model.lazy="fields.last_name" id="last_name" type="text" placeholder="Last Name" />
                        </x-input.group>

                        <!-- dob -->
                        <x-input.group label="DOB" for="dob" :error="$errors->first('fields.dob')" required>
                            <x-input.date wire:model.lazy="fields.dob" id="dob" type="text" placeholder="DOB" />
                        </x-input.group>

                        <!-- gender  -->
                        <x-input.group label="Gender" for="gender" :error="$errors->first('fields.gender')" required>
                            <x-input.select wire:model.lazy="fields.gender" id="gender" type="text" placeholder="Gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </x-input.select>
                        </x-input.group>

                        <!-- marital_status -->
                        <x-input.group label="Marital Status" for="marital_status" :error="$errors->first('fields.marital_status')">
                            <x-input.select wire:model.lazy="fields.marital_status" id="marital_status" type="text" placeholder="Marital Status">
                                <option value=""></option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="defacto">Defacto</option>
                                <option value="divorsed">Divorsed</option>
                            </x-input.select>
                        </x-input.group>
                    </div>
                @break

                @case(2)
                    <div class="flex flex-col space-y-4">
                        <!-- phone -->
                        <x-input.group label="Phone" for="phone" :error="$errors->first('fields.phone')" required>
                            <x-input.text wire:model.lazy="fields.phone" id="phone" type="text" placeholder="Phone" />
                        </x-input.group>

                        <!-- email -->
                        <x-input.group label="Email" for="email" :error="$errors->first('fields.email')" required>
                            <x-input.text wire:model.lazy="fields.email" id="email" type="text" placeholder="Email address" />
                        </x-input.group>

                        <!-- address -->
                        <x-input.group label="Address" for="address" :error="$errors->first('fields.address')" required>
                            <x-input.text wire:model.lazy="fields.address" id="address" type="text" placeholder="Address" />
                        </x-input.group>

                        <!-- australian_resident -->
                        <x-input.group label="Australian Resident" for="australian_resident" :error="$errors->first('fields.australian_resident')" required>
                            <x-input.select wire:model.lazy="fields.australian_resident" id="australian_resident" type="text" placeholder="Australian Resident">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </x-input.select>
                        </x-input.group>
                    </div>
                @break

                @case(3)
                    <div class="flex flex-col space-y-4">
                        <!-- occupation -->
                        <x-input.group label="Occupation" for="occupation" :error="$errors->first('fields.occupation')" required>
                            <x-input.text wire:model.lazy="fields.occupation" id="occupation" type="text" placeholder="Occupation" />
                        </x-input.group>

                        <!-- australian_resident -->
                        <x-input.group label="Employment Status" for="employment_status" :error="$errors->first('fields.employment_status')" required>
                            <x-input.select wire:model.lazy="fields.employment_status" id="employment_status" type="text" placeholder="Employment Status">
                                <option value="full_time">Full time</option>
                                <option value="ocasional">Ocasional</option>
                                <option value="half_time">Half-Time</option>
                                <option value="other">Other</option>
                            </x-input.select>
                        </x-input.group>

                        <!-- custom_employment_status -->
                        @if($fields['employment_status'] === 'other')
                            <x-input.group label="Custom Employment Status" for="custom_employment_status" :error="$errors->first('fields.custom_employment_status')" required>
                                <x-input.text wire:model.lazy="fields.custom_employment_status" id="custom_employment_status" type="text" placeholder="Custom Employment Status" />
                            </x-input.group>
                        @endif
                    </div>
                @break

                @case(4)
                    <div class="flex flex-col space-y-4">
                        <!-- tfn -->
                        <x-input.group label="TFN" for="tfn" :error="$errors->first('fields.tfn')" required>
                            <x-input.text wire:model.lazy="fields.tfn" id="tfn" type="text" placeholder="TFN" />
                        </x-input.group>

                        <!-- Bank Acct - Bank Name  -->
                        <x-input.group label="Bank Acct - Bank Name" for="bank_name" :error="$errors->first('fields.bank_name')" required>
                            <x-input.text wire:model.lazy="fields.bank_name" id="bank_name" type="text" placeholder="Bank Acct - Bank Name" />
                        </x-input.group>

                        <!-- Bank Account - BSB -->
                        <x-input.group label="Bank Account - BSB" for="bank_bsd" :error="$errors->first('fields.bank_bsd')" required>
                            <x-input.text wire:model.lazy="fields.bank_bsd" id="bank_bsd" type="text" placeholder="Bank Account - BSB " />
                        </x-input.group>

                        <!-- Bank Account - Acct Number -->
                        <x-input.group label="Bank Account - Acct Number" for="bank_number" :error="$errors->first('fields.bank_number')" required>
                            <x-input.text wire:model.lazy="fields.bank_number" id="bank_number" type="text" placeholder="Bank Account - Acct Number" />
                        </x-input.group>
                    </div>
                @break

                @case(5)
                    <div class="flex flex-col space-y-4">
                        <!-- How much do you have to invest initially? -->
                        <x-input.group label="How much do you have to invest initially" for="have_initially" :error="$errors->first('fields.have_initially')">
                            <x-input.text wire:model.lazy="fields.have_initially" id="have_initially" type="text" placeholder="How much do you have to invest initially?" />
                        </x-input.group>

                        <!-- Are you willing to invest a percentage of your take home income each month? -->
                        <x-input.group label="Are you willing to invest a percentage of your take home income each month?" for="income_month" :error="$errors->first('fields.income_month')">
                            <x-input.select wire:model.lazy="fields.income_month" id="income_month" type="text" placeholder="Are you willing to invest a percentage of your take home income each month?">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </x-input.select>
                        </x-input.group>

                        <!-- If yes above, how much…possibly have a drop down $amount -->
                        <x-input.group label="If yes above, how much…possibly have a drop down $amount" for="amount" :error="$errors->first('fields.amount')">
                            <x-input.select wire:model.lazy="fields.amount" id="amount" type="text" placeholder="If yes above, how much…possibly have a drop down $amount">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </x-input.select>
                        </x-input.group>

                        <!-- Are you needing advice beyond one off and/or regular investment advice? -->
                        <x-input.group label="Are you needing advice beyond one off and/or regular investment advice?" for="investment_advice" :error="$errors->first('fields.investment_advice')">
                            <x-input.select wire:model.lazy="fields.investment_advice" id="investment_advice" type="text" placeholder="Are you needing advice beyond one off and/or regular investment advice?">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </x-input.select>
                        </x-input.group>

                        @if($fields['investment_advice'] === 'yes')
                            <!-- Tell us more about your personal details -->
                            <x-input.group label="Tell us more about your personal details" for="personal_detail" :error="$errors->first('fields.personal_detail')" required>
                                <x-input.text wire:model.lazy="fields.personal_detail" id="personal_detail" type="text" placeholder="Tell us more about your personal details" />
                            </x-input.group>

                            <!-- Any children or dependants? - ncluding Grand and Step children -->
                            <x-input.group label="Any children or dependants? - ncluding Grand and Step children" for="step_children" :error="$errors->first('fields.step_children')" required>
                                <x-input.text wire:model.lazy="fields.step_children" id="step_children" type="text" placeholder="Any children or dependants? - ncluding Grand and Step children" />
                            </x-input.group>

                            <!-- Name & DOB & gender and Age Dependant to -->
                            <x-input.group label="Name & DOB & gender and Age Dependant to " for="name_dob_gender_age" :error="$errors->first('fields.name_dob_gender_age')" required>
                                <x-input.text wire:model.lazy="fields.name_dob_gender_age" id="name_dob_gender_age" type="text" placeholder="Name & DOB & gender and Age Dependant to" />
                            </x-input.group>

                            <!-- To what age will your dependants receive financial assistance -->
                            <x-input.group label="To what age will your dependants receive financial assistance" for="financial_assistance" :error="$errors->first('fields.financial_assistance')" required>
                                <x-input.text wire:model.lazy="fields.financial_assistance" id="financial_assistance" type="text" placeholder="To what age will your dependants receive financial assistance" />
                            </x-input.group>

                            <!-- Any other family, Parents, or Siblings in particular that may be involved financially in your life -->
                            <x-input.group label="To what age will your dependants receive financial assistance" for="involved_financially" :error="$errors->first('fields.involved_financially')" required>
                                <x-input.text wire:model.lazy="fields.involved_financially" id="involved_financially" type="text" placeholder="Any other family, Parents, or Siblings in particular that may be involved financially in your life" />
                            </x-input.group>
                        @endif
                    </div>
                @break
            @endswitch
        </section>

        <footer class="mt-6 flex justify-end space-x-2">
            @if($step > 1)
                <button type="button" wire:click.prevent="backStep" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-xs uppercase font-medium rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none">
                    Back
                </button>
            @endif

            @if($step == 5)
                <button type="button" wire:click.prevent="nextStep" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-xs uppercase font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                    Finish
                </button>
            @else
                <button type="button" wire:click.prevent="nextStep" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-xs uppercase font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none">
                    Next
                </button>
            @endif
        </footer>
    @endif
</form>
