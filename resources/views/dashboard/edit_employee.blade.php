@include('component.header')
@include('component.url_link')

<div class="shadow-lg p-3 mb-5 bg-white rounded m-5">
    <form action="/dashboard/edit/{{ $employee->id }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" name="name" value="{{ $employee->name }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" name="email" value="{{ $employee->email }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        {{-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-danger "><a href="/dashboard/delete/{{ $employee->id }}" class="text-white text-decoration-none">Delete</a></button>
        <p><a href="/dashboard/homepage">Go back</a></p>
    </form>
</div>
