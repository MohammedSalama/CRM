<!-- Edit Companies -->
<div class="modal fade" id="Editcompany{{$company->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Company </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('companies.update',$company->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    {{--Input hidden id--}}
                    <input type="hidden" name="id" value="{{$company->id}}"/>

                    <div class="row">

                        <div class="col">
                            <label> Name </label>
                            <input type="text" name="name" class="form-control">
                            {{ $company -> name }}
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col">
                            <label> E-mail </label>
                            <input type="email" name="email" class="form-control">
                            {{ $company -> email }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label> Logo </label>
                            <input type="file" name="logo" class="form-control">
                            {{ $company -> logo }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label> Website URL </label>
                            <input type="text" name="url" class="form-control">
                            {{ $company -> url }}
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Confirm</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

