@extends('layouts.app')
@section('title', 'Categorias')
@section('content')
    <section class="content">
        <div class="container">
            <div class="card card-primary">
                <div class="card-header d-flex justify-content-center">
                    <h3 class="card-title mb-0 p-3">Cadastrar</h3>
                </div>
                <form action="{{ route('categoria.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror"
                                    id="nome" name="nome" value="{{ old('nome') }}" placeholder="Nome da Categoria">
                                @error('nome')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label for="icone">Ícone</label>
                                <input type="file" class="form-control @error('icone') is-invalid @enderror"
                                       id="icone" name="icone" accept="image/*" onchange="previewIcon(event)">
                                @error('icone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 d-flex justify-content-center align-items-center">
                                <img id="icone-preview" src="#" alt="Prévia do Ícone" class="img-thumbnail" style="display: none; max-width: 150px; max-height: 150px;">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control @error('descricao') is-invalid @enderror"
                                    id="descricao" name="descricao" value="{{ old('descricao') }}">
                                @error('descricao')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-secondary btn-block">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function previewIcon(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('icone-preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
