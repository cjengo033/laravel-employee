@include('component.header')
<h1>Your id is {{$employee->id}}</h1>
<h1>Your name is {{$employee->name}}</h1>
<h1>Your email is {{$employee->email}}</h1>

<h1>Employee Edit</h1>
<form action="/authentication/login/process" method="POST">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Full Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter email" name="email" value="{{$employee->name}}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter email" name="email" value="{{$employee->email}}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    {{-- <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
    <p><a href="/dashboard/homepage">Go back</a></p>
</form>

<p><a href="/dashboard/delete/{{$employee->id}}">Delete this data</a></p>
@include('component.footer')