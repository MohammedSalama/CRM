<!-- Create Company -->
<div class="modal fade" id="createcontact" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Create Contacts </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('contacts.store')}}" method="post" autocomplete="off">
                    @method('POST')
                    @csrf
                    <div class="row">

                        <div class="col">
                            <label> First Name </label>
                            <input type="text" name="first_name" class="form-control">
                            @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <br>

                    <div class="col">
                        <label> Last Name </label>
                        <input type="text" name="last_name" class="form-control">
                        @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label> Company </label>

                        <select name="company_id">
                            @foreach($company as $company)
                            <option value="{{$company->id}}"> {{$company->name}}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label> E-mail </label>
                        <input type="text" name="email" class="form-control">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="col">
                        <label> Phone </label>
                        <input type="text" name="phone" class="form-control">
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label> LinkedIn Profile </label>
                        <input type="text" name="url" class="form-control">
                        @error('url')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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

