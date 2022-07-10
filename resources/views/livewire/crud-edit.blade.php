<div>
    @if($active == true)
        <h1 style="letter-spacing:2px;text-align:center;">User: {{ $edit_name}}</h1>
        <div style="width:60%; margin: 0 auto;background:greenyellow">
            <div style="padding:2rem;">
                <a class="border" style="padding:1rem; font-size:20px;cursor:pointer"  wire:click="back">Go back</a>
            </div>
            <div style="width:fit-content; margin:0 auto;"  class="wrapper">
                <div class="container">
                    <div class="each">
                        <input type="text" wire:model.defer="edit_name" >
                        @error('edit_name')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="each">
                        <input type="text" wire:model.defer="edit_email">
                        @error('edit_email')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="each">
                        <input type="password" wire:model.defer="edit_password" placeholder="New password...">
                        @error('edit_password')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="each">
                        <button wire:click="update({{ $ids }})"  class="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    @endif 

    @if($return == true)
        <livewire:crud-index />
    @endif
</div>
