<div>
    @if($active == true)
        <h1 style="letter-spacing:2px;text-align:center;">Hello World!</h1>
        <div style="width:60%; margin: 0 auto;background:greenyellow">
            <div style="padding:2rem;">
                <a class="border" style="padding:1rem; font-size:20px;cursor:pointer"  wire:click="back">Go back</a>
            </div>
            <div style="width:fit-content; margin:0 auto;" class="wrapper">
                <div class="container">
                    <div class="each">
                        <input type="text" wire:model.defer="name" placeholder="Name...">
                        @error('name')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="each">
                        <input type="text" wire:model.defer="email" placeholder="Email...">
                        @error('email')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="each">
                        <input type="password" wire:model.defer="password" placeholder="Password...">
                        @error('password')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="each" wire:ignore >
                        <input wire:model.lazy="date" class="form-control" type="text" id="date">
                    </div>
                    <input wire:model="color" type="color" class="inputs">
                    <input wire:model="photo" type="file" class="inputs upload">
                    <div wire:loading wire:target="photo">Uploading...</div>
                    
                    <div class="each">
                        <button wire:click="create"  class="button">Submit</button>
                    </div>

                    <div class="each">
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" class="imgs" alt="image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($return == true)
        <livewire:crud-index />
    @endif
</div>

<script>
    new Pikaday({ field: document.getElementById('date') })
        
    picker = new Pikaday({
    field: document.getElementById('date'),
    firstDay: 0,
    // pickWholeWeek: true,
    setDefaultDate: true,
    minDate: new Date(2021, 11, 14),
    maxDate: new Date(2030, 12, 14),
    yearRange: [2021,2030],

    disableDayFn: function(theDate) {
    return false;
    }
    });
</script>
