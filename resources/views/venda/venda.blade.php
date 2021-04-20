@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Vendas</h6>
                        <div>
                            <a href="{{ route('home') }}" class="btn btn-sm text-primary"><i class="fa fa-home" title="Home"></i></a>
                            <a href="{{ route('nova-venda') }}" class="btn btn-sm text-primary"><i class="fa fa-plus"
                                    title="Nova Venda"></i></a>
                        </div>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <h1>Seja bem vindo,<h1>
                                 Nova venda
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
