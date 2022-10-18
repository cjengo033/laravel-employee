@include('component.url_link')

<div class="shadow-lg p-3 mb-5 bg-white rounded m-5">
    <h1>Login</h1>
    <form action="/authentication/login/process" method="POST">
        @csrf

        <div>
            @error('email')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                name="password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <p><a href="/authentication/register">Don't have an account? Register</a></p>
    </form>


</div>
