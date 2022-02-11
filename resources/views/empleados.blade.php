@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Empleados </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('create') }}" title="Crear Empleado"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Puesto</th>
            <th>Correo</th>
            <th>Fecha Nac</th>
            <th>Dirección</th>
            <th>Habilidades/Nivel</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->email }}</td>
                <td>{{ $project->jobposition }}</td>
                <td> {{ date('d-m-Y', strtotime($project->datebirth))}}</td>
                <td>{{ $project->address }}</td>
                <td>
                @foreach ($project->skills as $skill)
                <li>{{ $skill->name}}/{{$skill->level}}</li>
                @endforeach

                </td>


                <td>
                    <form action="{{ route('destroy', $project->id) }}" method="POST">

                        <a href="{{ route('mostrar', $project->id) }}" title="Mostrar">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('edit', $project->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- {!! $projects->links() !!} --}}

@endsection
