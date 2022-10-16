

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $Title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="submit" action="/dashboard/store_employee" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input wire:model="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email" name="email"
                            value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input wire:model="name" type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Name..." name="name" value="{{ old('name') }}">
                    </div>
                    <div>
                        <span class="text-danger" id="nameErrorMsg"></span>
                        <span class="text-danger" id="emailErrorMsg"></span>
                    </div>

                    @error('name')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>

        </div>
    </div>
</div>
