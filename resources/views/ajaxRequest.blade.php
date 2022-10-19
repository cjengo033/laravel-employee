<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Ajax Request example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Laravel Ajax Post Request Example</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>

    <body>
        <div class="container">
            <h1>Laravel Ajax Post Request Example with <a href="https://codingdriver.com/">Coding Driver</a></h1>
            <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>

            <form id="ajaxform">
                @csrf
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                    <span class="text-danger" id="nameError"></span>
                </div>

                    
                {{-- @error('name')
                    <p> {{$message}}</p>
                @enderror --}}

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                    <span class="text-danger" id="emailError"></span>
                </div>

                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="text" name="password" class="form-control" placeholder="Enter Pass">
                    <span class="text-danger" id="passError"></span>
                </div>
           
                <div class="form-group">
                    <button class="btn btn-success save-data">Save</button>
                </div>
            </form>
        </div>
    </body>

    </html>

</body>



</html>

<script type="text/javascript">
    $(".save-data").click(function(event) {
        event.preventDefault();

        let name = $("input[name=name]").val();
        let email = $("input[name=email]").val();
        let password = $("input[name=password]").val();
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/ajax-request",
            type: "POST",
            data: {
                name: name,
                email: email,
                password: password,
                _token: _token
            },
            success: function(response) {
                console.log(response);
                if (response) {
                    $('.success').text(response.success);
                    $("#ajaxform")[0].reset();
                }
            },
            error: function(error) {
                $('#nameError').text(error.responseJSON.errors.name);
                $('#emailError').text(error.responseJSON.errors.email);
                $('#passError').text(error.responseJSON.errors.password);
            }
        });
    });
</script>
