@include('component.header')
@include('component.url_link')
@foreach ($data_employee as $item)
    @include('component.add_modal', ['Name' => $item->name, 'Title' => 'Add Employee'])
    @include('component.edit_modal', [
        'Name' => $item->name,
        'Email' => $item->email,
        'ID' => $item->id,
        'Title' => 'Edit User',
    ])
@endforeach

<div class="shadow-lg p-3 mb-5 rounded m-5">
    {{-- <a href="/dashboard/show_add">Add Employee</a> --}}
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
        Add Employee
    </button>

    <table class="table text-center mt-3">
        <thead>
            <tr>
                {{-- <th scope="col">#</th> --}}
                <th scope="col">FULL NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">CREATED AT</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        @foreach ($data_employee as $item)
            <tbody>
                <tr>
                    {{-- @include('component.delete_modal', ['ID' => $item->id, 'Title' => 'Delete User']) --}}
                    {{-- <th scope="row">{{ $item->id }}</th> --}}
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>           
                        <button type="submit" class="btn btn-success "><a href="/dashboard/show_user/{{ $item->id }}" class="text-white text-decoration-none">View</a></button>
                       

                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>
