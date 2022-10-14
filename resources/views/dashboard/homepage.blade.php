@include('component.header')
<p><a href="/logout">Logout</a></p>

    <h1>Welcome to home page</h1>
    <p><a href="/dashboard/show_add">Add Employee</a></p>

        
  
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach ($data_employee as $item)
            <tbody>
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a href="#">Delete</a> 
                        <a href="/dashboard/show_user/{{$item->id}}">View</a> 
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

@include('component.footer')
