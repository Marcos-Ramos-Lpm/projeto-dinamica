@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Nova categoria de produto</h6>
                        <div>
                            <a href="{{ route('home') }}" class="btn btn-sm text-primary"><i class="fa fa-home" title="Home"></i></a>
                        </div>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" action="">
                                    @csrf
                                    <input type="hidden" name="categoria_id" value="{{ $categoria->categoria_id }}" />
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="categoria">Titulo da categoria</label>
                                                <input type="text" class="form-control" name="categoria" id="categoria"
                                                    placeholder="Digite o titulo da nova categoria"
                                                    value="{{ $categoria->categoria }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js-pages/categoria/addedit.js') }}"></script>
@endsection
