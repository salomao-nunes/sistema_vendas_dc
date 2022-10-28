@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Actualizar Cliente</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Actualizar Cliente</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">Preencha os campos</h4>
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{route('cliente.update',$cliente->id)}}" method="POST">
                                    @csrf
                     
                                <div class="row mb-3 mt-4">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nome do Cliente</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nome" value="{{$cliente->nome}}"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3 mt-4">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">E-mail do Cliente</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" name="email" value="{{$cliente->email}}"
                                            id="example-text-input">
                                    </div>
                                </div>

                                <!-- end row -->
                                <button class="btn btn-primary" type="submit">Actualizar Cliente</button>
                            </form>
                            <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
