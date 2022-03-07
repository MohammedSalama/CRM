@extends('layouts.admin.master')
@section('css')
@endsection

@section('title')
    Contact Persons
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6"> Contact Persons <h4 class="mb-0"> </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> Contact Persons </a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('message')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <button class="btn btn-success btn-sm" title="create" data-toggle="modal"
                            data-target="#createcontact" >
                        Create Contact Person </button>
                    @include('layouts.contacts.create')
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>E-mail</th>
                                <th>Phone Number</th>
                                <th>LinkedIn Profile</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contacts)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td>{{ $contacts -> first_name }}</td>
                                    <td>{{ $contacts -> last_name}}</td>
                                    <td>{{ $contacts -> company -> name}}</td>
                                    <td>{{ $contacts -> email }}</td>
                                    <td>{{ $contacts -> phone }}</td>
                                    <td>{{ $contacts -> url }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" data-contact_id="{{$contacts->id}}"
                                                data-toggle="modal" data-target="#deletedcontact"><i
                                                class="fa fa-trash"></i></button>

                                        <button class="btn btn-success btn-sm" title="Edit" data-toggle="modal"
                                                data-target="#Editcontact{{$contacts->id}}" ><i
                                                class="fa fa-edit"></i></button>

                                        @include('layouts.contacts.deleted')

                                        @include('layouts.contacts.edit')

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        $('#deletedcontact').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var contact_id = button.data('contact_id')
            var modal = $(this)
            modal.find('.modal-body #contact_id').val(contact_id);
        })
    </script>
@endsection
