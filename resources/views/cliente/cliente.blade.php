@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
                        <div>
                            <a href="" class="btn btn-sm text-primary"><i class="fa fa-home" title="Home"></i></a>
                            <a href="{{ route('novo-cliente') }}" class="btn btn-sm text-primary"><i class="fa fa-plus"
                                    title="Adicionar Cliente"></i></a>
                        </div>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Data Nascimento</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dadosClient as $rst)
                                    <tr>
                                        <th scope="row">{{ $rst->id }}</th>
                                        <td>{{ $rst->nome }}</td>
                                        <td>{{ date('d/m/Y', strtotime($rst->data_nascimento)) }}</td>
                                        <td><button href="" class="btn btn-xs text-success"><i
                                                    class="fas fa-pencil-alt"></i></button><button href=""
                                                class="btn btn-xs text-warning"><i class="fas fa-trash-alt"></i></button>
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
@endsection
