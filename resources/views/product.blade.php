<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 Ajax Post Request Example - Nicesnippets.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<style type="text/css">
    .alert {
        padding: 15px 0px 0px 0px;
    }
</style>

<body>

    <div class="container">
        <div class="card mt-3">
            <div class="card-header text-center">
                <h3>Laravel 9 Ajax Post Request Example - Nicesnippets.com</h3>
            </div>
            <div class="card-body">

                <table class="table table-bordered mt-3">
                    <tr>
                        <th colspan="3">
                            List Of Products
                            <button type="button" class="btn btn-success float-end btn-sm" data-bs-toggle="modal"
                                data-bs-target="#postModal">
                                Create Product
                            </button>
                        </th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->detail }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>

                        <div class="mb-3">
                            <label for="titleID" class="form-label">Name:</label>
                            <input type="text" id="titleID" name="name" class="form-control" placeholder="Name"
                                required="">
                        </div>

                        <div class="mb-3">
                            <label for="bodyID" class="form-label">Detail:</label>
                            <textarea name="detail" class="form-control" id="bodyID" placeholder="Detail"></textarea>
                        </div>

                        <div class="mb-3 text-center">
                            <button class="btn btn-success btn-submit btn-sm">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e) {

        e.preventDefault();

        var name = $("#titleID").val();
        var detail = $("#bodyID").val();

        $.ajax({
            type: 'POST',
            url: "{{ route('products.store') }}",
            data: {
                name: name,
                detail: detail
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    alert(data.success);
                    location.reload();
                } else {
                    printErrorMsg(data.error);
                }
            }
        });
    });

    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function(key, value) {
            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
        });
    }
</script>

</html>
