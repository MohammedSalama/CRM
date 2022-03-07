<!-- Edit Contacts -->
<div class="modal fade" id="Editcontact{{$contacts->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Contact Persons </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('contacts.update',$contacts->id)}}" method="post" autocomplete="off" >
                    @method('POST')
                    @csrf
                    {{--Input hidden id--}}
                    <input type="hidden" name="id" value="{{$contacts->id}}"/>

                    <div class="row">

                        <div class="col">
                            <label> First Name </label>
                            <input type="text" name="first_name" class="form-control">
                            {{ $contacts -> first_name }}
                        </div>

                    </div>
                    <br>

                    <div class="row">

                        <div class="col">
                            <label> Last Name </label>
                            <input type="text" name="last_name" class="form-control">
                            {{ $contacts -> last_name }}
                        </div>

                    </div>

                    <div class="col">
                        <label> Company </label>

                        <select name="company_id">
                            @foreach($company as $company)
                                <option value="{{$company->id}}" {{$company->id == $contacts->company_id ? 'selected' : ''}}>
                                    {{$company->name}} </option>
                            @endforeach
                        </select>
                        @error('company_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col">
                            <label> E-mail </label>
                            <input type="email" name="email" class="form-control">
                            {{ $contacts -> email }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label> Phone </label>
                            <input type="text" name="phone" class="form-control">
                            {{ $contacts -> phone }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label> LinkedIn Profile </label>
                            <input type="text" name="url" class="form-control">
                            {{ $contacts -> url }}
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

