<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Manage_tution_fees_model;

class TutionFeeCalculator extends Component
{
    public $tutionFees;
    public $tution_fees_id;
    public $semester = 6;
    public $tutionFeeById;

    protected $validationAttributes = [
        'tution_fees_id' => 'Program Name'
    ];

    protected function rules()
    {
        return [
            'tution_fees_id' => 'required|integer',
            'semester' => 'required|integer|min:6|max:24',
        ];
    }

    public function updated($propertyName)
    {
        $this->reset('tutionFeeById');
        $this->validateOnly($propertyName);
    }

    public function getTutionFeeById()
    {
        $this->validate();

        $this->tutionFeeById = Manage_tution_fees_model::where('session', session()->get('school')->default_session)->where('tution_fees_id', $this->tution_fees_id)->first();
        
    }

    public function render()
    {
        return view('livewire.frontend.tution-fee-calculator');
    }
}
