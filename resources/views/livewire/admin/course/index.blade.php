<div>

    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remover Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form wire:submit.prevent="destroyCourse">
                <div class="modal-body">
                    <h6> Tem a certeza que pretende remover este curso?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3> Lista de Cursos
                        <a href="{{ route('admin.course.create') }}" class="btn btn-primary btn-sm text-white float-end">Criar Curso</a>
                    </h3>
                </div>
    
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Título</th>
                              <th>Slug</th>
                              <th>Descrição</th>
                              <th>Conteúdo</th>
                              <th>Activo</th>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
    
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->slug }}</td>
                                    <td>{{ $course->description }}</td>
                                    <td>{{ $course->body }}</td>
                                    <td>{{ $course->isActive == 1 ? 'Sim' : 'Não' }}</td>
                                    <td>
                                        <a href="{{ route('admin.course.edit', ['course' => $course]) }}" class="btn btn-outline-primary btn-icon-text">
                                            Editar                         
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-outline-danger btn-icon-text"  wire:click="deleteCourse('{{ $course->id }}')" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            Remover                         
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                      </div>
    
                      <div>
                        {{ $courses->links() }}
                      </div>
                </div>
    
            </div>
        </div>
    </div>

</div>