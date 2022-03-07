<!-- delete -->
<div class="modal fade" id="deletedcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete About Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
{{--            @include('message')--}}
            <form action="{{route('companies.destroy','test')}}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <p class="text-center">
                    <h6 style="color:red">Are you sure of deleting About section ?</h6>
                    </p>
                    <input type="hidden" name="company_id" id="company_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
