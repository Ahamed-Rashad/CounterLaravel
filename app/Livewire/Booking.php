<?php

namespace App\Livewire;

use Livewire\Component;

class Booking extends Component
{
    // public $departureOption = 'timing option 1';
    // public $returnOption = 'timing option 1';
    public $selectedOptions = [];

    public function render()
    {
        return view('livewire.booking');
    }

    public function mount()
    {
        for ($i = 0; $i < 3; $i++) {
            $this->selectedOptions[$i] = [
                'departure' => 'timing option 1',
                'return' => 'timing option 1',
            ];
        }
    }

    public function updateSelectedOptions($index)
    {
        // $this->departureOption = $this->departureOption;
        // $this->returnOption = $this->returnOption;
        // $this->selectedOptions[$index]['departure'] = 'timing option 1';
        // $this->selectedOptions[$index]['return'] = 'timing option 1';
        $this->selectedOptions[$index]['departure'] = $this->selectedOptions[$index]['departure'];
        $this->selectedOptions[$index]['return'] = $this->selectedOptions[$index]['return'];
    }

    public function submitForm()
    {
        // $this->departureOption = $this->departureOption;
        // $this->returnOption = $this->returnOption;
        session()->flash('message', 'Form submitted successfully!');
        // dd($this->departureOption, $this->returnOption);
    }
}
