@if ($showIndex == true)
    <div>
    <h1 style="text-align:center;letter-spacing:2px;">Hello World!</h1>
        @if(Session::has('message'))
            <p style="width:100%; padding:1rem 0; background:red;color:white;text-align:center;font-size:2rem;shadow-box:3px solid #000;">{{ Session::get('message') }}</p>
        @endif
        <div style="width:60%; margin: 0 auto;background:greenyellow">
            <div style="padding:2rem;">
                <a class="border" style="padding:1rem; font-size:20px;text-decoration:none;" wire:click="show('showCreate')">Add User</a>
            </div>
            <table style="width:fit-content; margin:0 auto;">
                <thead>
                    <tr>
                        <th class="border">Name</th>
                        <th class="border">Email</th>
                        <th class="border">Photo</th>
                        <th class="border">Color</th>
                        <th class="border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border">{{ $user->name }}</td>
                            <td class="border">{{ $user->email }}</td>
                            <td style="text-align:center;vertical-align: middle;" class="border">
                                <img style="width:30px; height:30px;max-width:30px;max-height:30px; margin:0 auto;vertical-align: middle;" src="{{ asset('storage/' . $user->media->url) }}" alt="img">
                            </td>
                            <td class="border">
                                <div style="width:30px; height:30px; margin:0 auto;background-color: {!! $user->color !!}" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    &nbsp;
                                </div>
                            </td>
                            <td class="border">
                                <div style="display:flex;">
                                    <div>
                                        <button style="margin-left:0.5rem;cursor:pointer;" wire:click="show('showEdit', {{ $user->id }})" class="button">Edit</button>
                                    </div>
                                    <div>
                                        <button style="margin-left:1rem; margin-right:0.5rem; background:red;cursor:pointer;" wire:click="delete({{ $user->id }})" class="button">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif 

@if ($showCreate == true)
    <div>
        <livewire:crud-create />
    </div>
@endif

@if ($showEdit == true)
    <div>
        <livewire:crud-edit :userID="$ids" />
    </div>
@endif

