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

                                <form action="{{route('fornecedor.store')}}" method="POST">
                                    @csrf
                                <div class="row mb-3 mt-4">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nome do fornecedor</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nome" placeholder="Nome"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Registrar</button>
                            </form>
                            <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Todos fornecedores</h4>

                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome do fornecedor</th>
                                        <th>Acções</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($fornecedores as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nome}}</td>
                                            <td>
                                                <a href="{{route('fornecedor.edit',$item->id)}}" style="font-size:20px; color:green;"> <i class="ri-edit-box-fill"></i></a>
                                                <a href="http://" style="font-size:20px; color:red;"> <i class="ri-delete-bin-fill"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection
