@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Categoria de produtos</h6>
                        <div>
                            <a href="{{ route('home') }}" class="btn btn-sm text-primary"><i class="fa fa-home" title="Home"></i></a>
                            <a href="{{ route('addedit-categoria') }}" class="btn btn-sm text-primary"><i
                                    class="fa fa-plus" title="Adicionar nova categoria"></i></a>
                        </div>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoria as $rst)
                                    <tr>
                                        <th scope="row">{{ $rst->categoria_id }}</th>
                                        <td>{{ $rst->categoria }}</td>
                                        <td><a href="{{ asset("categoria/addedit/{$rst->categoria_id}") }}"
                                                class="btn btn-xs text-success"><i class="fas fa-pencil-alt"></i></a>
                                            <button class="btn btn-xs text-warning"
                                                onclick="deletarCategoria({{ $rst->categoria_id }})"><i
                                                    class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $categoria->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js-pages/categoria/categoria.js') }}"></script>
