@extends('layouts.admin.master')
@section('css')
@endsection

@section('title')
    Companies
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6"> Companies <h4 class="mb-0"> </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> Companies </a></li>
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
                            data-target="#createcompany" >
                        Create Company</button>
                    @include('layouts.companies.create')
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Logo</th>
                                <th>Website URL</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($company as $company)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td>{{ $company -> name}}</td>
                                    <td>{{ $company -> email }}</td>
                                    <td>
                                        <img style="width: 50%; height: 50%;"
                                             src="
                                                {{--  مسار الصور --}}
                                        {{ asset('storage/'. $company -> logo) }}"
                                        ></td>
                                    </td>
                                    <td>{{ $company -> url }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" data-company_id="{{$company->id}}"
                                                data-toggle="modal" data-target="#deletedcompany"><i
                                                class="fa fa-trash"></i></button>

                                        <button class="btn btn-success btn-sm" title="Edit" data-toggle="modal"
                                                data-target="#Editcompany{{$company->id}}" ><i
                                                class="fa fa-edit"></i></button>

                                        @include('layouts.companies.deleted')

                                        @include('layouts.companies.edit')

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
        $('#deletedcompany').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var company_id = button.data('company_id')
            var modal = $(this)
            modal.find('.modal-body #company_id').val(company_id);
        })
    </script>
@endsection
