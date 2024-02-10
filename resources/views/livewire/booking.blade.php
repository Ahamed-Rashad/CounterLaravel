<!-- resources/views/livewire/booking.blade.php -->

<div>
    @if(isset($selectedOptions))
        <form wire:submit.prevent="submitForm">
            @foreach($selectedOptions as $index => $options)
                <div wire:key="card{{ $index }}">
                    <p>Card {{ $index + 1 }}</p>

                    <p>Departure</p>
                    @foreach(['timing option 1', 'timing option 2', 'timing option 3'] as $option)
                        <input
                            type="radio"
                            wire:model="selectedOptions.{{ $index }}.departure"
                            wire:change="updateSelectedOptions({{ $index }}, 'departure', '{{ $option }}')"
                            name="departure{{ $index }}"
                            value="{{ $option }}"
                            {{ $loop->first && $index === 0 ? 'checked' : '' }}
                        > <label>{{ $option }}</label><br>
                    @endforeach

                    <p>Return</p>
                    @foreach(['timing option 1', 'timing option 2', 'timing option 3'] as $option)
                        <input
                            type="radio"
                            wire:model="selectedOptions.{{ $index }}.return"
                            wire:change="updateSelectedOptions({{ $index }}, 'return', '{{ $option }}')"
                            name="return{{ $index }}"
                            value="{{ $option }}"
                            {{ $loop->first && $index === 0 ? 'checked' : '' }}
                        > <label>{{ $option }}</label><br>
                    @endforeach

                    <hr>
                </div>
            @endforeach

            <button type="submit">Submit</button>
        </form>

        <div>
            <p>
                Selected Options - Card {{ $selectedCard }}:
                Departure: {{ $selectedOptions[$selectedCard - 1]['departure'] }}
                Return: {{ $selectedOptions[$selectedCard - 1]['return'] }}
            </p>
        </div>
    @endif

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
</div>
