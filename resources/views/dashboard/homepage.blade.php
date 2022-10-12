@include('component.header')
<p><a href="/logout">Logout</a></p>

    <h1>Welcome to home page</h1>
    <p><a href="/dashboard/show_add">Add Employee</a></p>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <a href="#">Delete</a> 
                        <a href="/dashboard/show_user">View</a> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@include('component.footer')
