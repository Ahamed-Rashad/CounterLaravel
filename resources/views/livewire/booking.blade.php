<div>
    @if(isset($selectedOptions))
        @foreach($selectedOptions as $index => $options)
            <form wire:submit.prevent="submitForm" wire:key="form{{ $index }}">
                <p>Departure</p>
                @foreach(['timing option 1', 'timing option 2', 'timing option 3'] as $option)
                    <input
                        type="radio"
                        wire:model="selectedOptions.{{ $index }}.departure"
                        wire:change="updateSelectedOptions({{ $index }})"
                        name="departure{{ $index }}"
                        value="{{ $option }}"
                        {{ $loop->first ? 'checked' : '' }}
                    > <label>{{ $option }}</label><br>
                @endforeach

                <p>Return</p>
                @foreach(['timing option 1', 'timing option 2', 'timing option 3'] as $option)
                    <input
                        type="radio"
                        wire:model="selectedOptions.{{ $index }}.return"
                        wire:change="updateSelectedOptions({{ $index }})"
                        name="return{{ $index }}"
                        value="{{ $option }}"
                        {{ $loop->first ? 'checked' : '' }}
                    > <label>{{ $option }}</label><br>
                @endforeach

                <button type="submit" wire:target="submitForm">Submit</button>

                <div>
                    <h3>Selected Options - Card {{ $index + 1 }}</h3>
                    <p>Departure: {{ $options['departure'] ?? '' }}</p>
                    <p>Return: {{ $options['return'] ?? '' }}</p>
                </div>
            </form>
        @endforeach
    @endif

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
</div>
