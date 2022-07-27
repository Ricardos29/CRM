@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3> Criar Curso
                        <a href="{{ route('admin.course') }}" class="btn btn-primary btn-sm text-white float-end">Retroceder</a>
                    </h3>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('admin.course.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Título">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Descrição">
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="body">Conteúdo</label>
                            <textarea class="form-control" name="body" id="body" rows="5"></textarea>
                            @error('body') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="isActive">
                                Activo
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>

                        <button class="btn btn-light">Cancel</button>

                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection 