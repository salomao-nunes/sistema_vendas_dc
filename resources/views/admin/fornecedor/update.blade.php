@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Fornecedores</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Fornecedores</li>
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

                            <h4 class="card-title mb-4">Registre um novo fornecedor</h4>
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{route('fornecedor.update',$fornecedor->id)}}" method="POST">
                                    @csrf
                                <div class="row mb-3 mt-4">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nome do fornecedor</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nome" value="{{$fornecedor->nome}}"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Actualizar Fornecedor</button>
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
