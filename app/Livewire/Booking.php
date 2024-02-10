<?php

namespace App\Livewire;

use Livewire\Component;

class Booking extends Component
{
    // public $departureOption = 'timing option 1';
    // public $returnOption = 'timing option 1';
    public $selectedOptions = [];
    public $selectedCard = 1;

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

    public function updateSelectedOptions($index, $field, $value)
    {
        // $this->departureOption = $this->departureOption;
        // $this->returnOption = $this->returnOption;
        // $this->selectedOptions[$index]['departure'] = 'timing option 1';
        // $this->selectedOptions[$index]['return'] = 'timing option 1';
        // $this->selectedOptions[$index]['departure'] = $this->selectedOptions[$index]['departure'];
        // $this->selectedOptions[$index]['return'] = $this->selectedOptions[$index]['return'];
        $this->selectedCard = $index + 1;
        $this->selectedOptions[$index][$field] = $value;
    }

    public function submitForm()
    {
        // $this->departureOption = $this->departureOption;
        // $this->returnOption = $this->returnOption;
        // session()->flash('message', 'Form submitted successfully!');
        // dd($this->departureOption, $this->returnOption);
        foreach ($this->selectedOptions as $index => $options) {
            // Process the selected options for each card
            // You can perform any additional logic or validation here
            // For now, we'll just display a message
            session()->flash('message', 'Form submitted successfully for Card ' . ($index + 1));
        }
    }
}
