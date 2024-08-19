@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card card-secondary mb-3">
            <div class="card-header bg-secondary text-white d-flex">
                <h4 class="card-title mb-0 p-1">Pesquisar Categorias</h4>
            </div>
            <form id="search_form" class="needs-validation" action="{{ route('categoria.index') }}">
                <div class="card-body">

                    <div class="form-floating mb-3 form-group col-md-4">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Nome da categoria"
                            value="{{ request()->nome ?? '' }}">
                        <label for="floatingInput">Nome da categoria</label>
                    </div>


                    <a href="{{ route('categoria.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i>
                        Cadastrar</a>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a class="btn btn-outline-danger float-right" href="{{ route('categoria.index') }}"
                        style="margin-right: 10px;"><i class="fas fa-times"></i> Limpar Campos</a>
                        
                    <button type="submit" class="btn btn-outline-info float-right" style="margin-right: 10px;"><i
                            class="fas fa-search"></i>
                        Pesquisar</button>

                </div>
            </form>
        </div>
        <div class="card card-secondary card-outline">
            <div class="card-body table-responsive p-0">
                @if ($categorias->count() > 0)
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th style="width: 1%;">Ícone</th>
                                <th>Nome</th>
                                <th style="width: 1%;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->icone }}</td>
                                    <td>{{ $categoria->nome }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('categoria.show', $categoria->id) }}" type="button"
                                                class="btn btn-default border border-secondary-subtle" title="Visualizar">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{ route('categoria.edit', $categoria->id) }}" type="button"
                                                class="btn btn-primary" title="Editar">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a href="#" type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal-default{{ $categoria->id }}" title="Excluir">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                        <div class="modal fade" id="modal-default{{ $categoria->id }}"
                                            style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Excluir Categoria</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Caso prossiga com a exclusão do item, o mesmo não poderá ser mais
                                                            recuperado. Deseja realmente excluir?</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Fechar</button>
                                                        <form method="post"
                                                            action="{{ route('categoria.destroy', $categoria->id) }}"
                                                            novalidate>
                                                            @method('delete')
                                                            @CSRF
                                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-3 d-flex justify-content-center align-items-center"> <i>Nenhum registro encontrado</i>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
