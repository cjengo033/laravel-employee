@include('component.header')

<h1>Employee Add</h1>
<form action="/dashboard/store_employee" method="POST">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter email" name="email" value="{{old('email')}}">
    </div>
    @error('email')
        <p class="text-danger"> {{ $message }} </p>
    @enderror
    <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name..." name="name" value="{{old('name')}}">
    </div>

    @error('name')
        <p class="text-danger"> {{ $message }} </p>
    @enderror
    {{-- <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
    <p><a href="/dashboard/homepage">Go back</a></p>
</form>


@include('component.footer');
