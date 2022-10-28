@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Clientes</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Clientes</li>
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

                            <h4 class="card-title">Todos Clientes</h4>

                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome do cliente</th>
                                        <th>E-mail do cliente</th>
                                        <th>CPF do cliente</th>
                                        <th>Registrado por</th>
                                        <th>Acções</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($clientes as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->nome}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->cpf}}</td>
                                            <td>{{$item['admin']['name'] }} </td>
                                            <td>
                                                <a href="{{route('cliente.edit',$item->id)}}" style="font-size:20px; color:green;"> <i class="ri-edit-box-fill"></i></a>
                                                <a href="{{route('cliente.destroy',$item->id)}}" style="font-size:20px; color:red;"> <i class="ri-delete-bin-fill"></i> </a>
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
