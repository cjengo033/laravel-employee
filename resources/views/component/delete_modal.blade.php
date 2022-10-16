{{-- 
<style>
    a {
        color: white;
    }
</style> --}}
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
    Delete User {{$ID}}
</button>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$ID}}</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> X </button> --}}
            </div>
            <div class="modal-body">
                Do you really want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary"><a href="/dashboard/delete/{{$ID}}"
                        class="text-reset">Yes</a></button>
            </div>
        </div>
    </div>
</div>




