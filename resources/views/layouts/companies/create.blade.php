<!-- Create Companies -->
<div class="modal fade" id="createcompany" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add About </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message')
                <form action="{{route('companies.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">

                        <div class="col">
                            <label> Name </label>
                            <input type="text" name="name" class="form-control">
{{--                            @error('name')--}}
{{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
                        </div>

                    </div>
                    <br>

                    <div class="col">
                        <label> E-mail </label>
                        <input type="email" name="email" class="form-control">
{{--                        @error('email')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>

                    <div class="col">
                        <label> Logo </label>
                        <input type="file" name="logo" class="form-control">
{{--                        @error('logo')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>

                    <div class="col">
                        <label> Website URL </label>
                        <input type="text" name="url" class="form-control">
{{--                        @error('url')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
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

