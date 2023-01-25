@extends('layouts.app')

@section('content')
    <div class="container col-10 text-center">
        <div class="row align-items-start">
            <div class="row">
                <div class="p-3 mb-2 bg-dark text-white">Libros</div>
                <table id="libros" class="table table-sm table-striped table-hover table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Editorial</th>
                            <th scope="col">Año</th>
                            <th scope="col">
                                <button id="libros" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#libroForm">
                                    Nuevo
                                </button>
                                <div class="modal fade" id="libroForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="libroFormLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="libroFormLabel">Libro Nuevo</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/principal/create/libro" method="POST">
                                                    @csrf
                                                    <div class="container mw-75 p-3">
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Cantidad</span>
                                                            <input required placeholder="Ej: 10" type="number" min="1" class="form-control" name="cantidad" value="{{old('cantidad')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Titulo</span>
                                                            <input required id="titulo" placeholder="Ej: El Principito" type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Autor</span>
                                                            <input required id="autor" placeholder="Ej: Stephen King" type="text" class="form-control" name="autor" value="{{old('autor')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Editorial</span>
                                                            <input required id="editorial" placeholder="Ej: Zenith" type="text" class="form-control" name="editorial" value="{{old('editorial')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Año</span>
                                                            <input required id="año" placeholder="Ej: 2018" type="number" min="1" class="form-control" name="año" value="{{old('año')}}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-success">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr class="table-light">
                                <td>{{ $libro->id }}</td>
                                <td>{{ $libro->cantidad }}</td>
                                <td>{{ $libro->titulo }}</td>
                                <td>{{ $libro->autor }}</td>
                                <td>{{ $libro->editorial }}</td>
                                <td>{{ $libro->año }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editLibro{{$libro->id}}">
                                        Editar
                                    </button>
                                    <div class="modal fade" id="editLibro{{$libro->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLibroLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editLibroLabel">Editar Libro</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/principal/edit/libro/{{$libro->id}}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="container mw-75 p-3">
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Cantidad</span>
                                                                <input required id="cantidad" type="number" min="1" class="form-control" name="cantidad" value="{{$libro->cantidad}}">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Titulo</span>
                                                                <input required id="titulo" type="text" class="form-control" name="titulo" value="{{$libro->titulo}}">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Autor</span>
                                                                <input required id="autor" type="text" class="form-control" name="autor" value="{{$libro->autor}}">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Editorial</span>
                                                                <input required id="editorial" type="text" class="form-control" name="editorial" value="{{$libro->editorial}}">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Año</span>
                                                                <input required id="año" type="number" min="1" class="form-control" name="año" value="{{$libro->año}}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-success">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminar{{$libro->id}}" type="button">
                                    Eliminar
                                    </button>
                                    <div class="modal fade" id="Eliminar{{$libro->id}}" tabindex="-1" role="dialog" aria-labelledby="EliminarLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="EliminarLabel">¿Estas seguro de querer eliminar este registro?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/principal/delete/libro/{{$libro->id}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-success">Sí</button>
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
            </div>
            <div class="row mt-5">
                <div class="p-3 mb-2 bg-dark text-white">Usuarios</div>
                <table id="usuarios" class="table table-sm table-striped table-hover table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">
                                <button id="usuarios" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#usuarioForm">
                                    Nuevo
                                </button>
                                <div class="modal fade" id="usuarioForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="usuarioFormLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="usuarioFormLabel">Usuario Nuevo</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/principal/create/usuario" method="POST">
                                                    @csrf
                                                    <div class="container mw-75 p-3">
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Nombre(s)</span>
                                                            <input required id="nombre" placeholder="Ej: Luis" type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Apellido Paterno</span>
                                                            <input required id="ap_paterno" placeholder="Ej: Morales" type="text" class="form-control" name="ap_paterno" value="{{old('ap_paterno')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Apellido Materno</span>
                                                            <input required id="ap_materno" placeholder="Ej: Merlos" type="text" class="form-control" name="ap_materno" value="{{old('ap_materno')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Fecha de Nacimiento</span>
                                                            <input required id="fec_nac" placeholder="Ej: 23/09/1999" type="date" class="form-control" name="fec_nac" value="{{old('fec_nac')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Direccion</span>
                                                            <input required id="direccion" placeholder="Ej: Etapa 12B Edif. 4 Depto. 203 U.H. Campestre" type="text" class="form-control" name="direccion" value="{{old('direccion')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Telefono</span>
                                                            <input required id="año" placeholder="Ej: 7773887215" type="number" min="1" class="form-control" name="telefono" value="{{old('telefono')}}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-success">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr class="table-light">
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->nombre }} {{ $usuario->ap_paterno }} {{ $usuario->ap_materno }}</td>
                                <td>{{ $usuario->fec_nac }}</td>
                                <td>{{ $usuario->direccion }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarUsuario{{$usuario->id}}">
                                        Editar
                                    </button>
                                    <div class="modal fade" id="editarUsuario{{$usuario->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarUsuarioLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editarUsuarioLabel">Editar Usuario</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/principal/edit/usuario/{{$usuario->id}}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="container mw-75 p-3">
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Nombre</span>
                                                                <input required id="nombre" type="text" class="form-control" name="nombre" value="{{$usuario->nombre}}">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Apellido Paterno</span>
                                                                <input required id="ap_paterno" type="text" class="form-control" name="ap_paterno" value="{{$usuario->ap_paterno}}">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Apellido Materno</span>
                                                                <input required id="ap_materno" type="text" class="form-control" name="ap_materno" value="{{$usuario->ap_materno}}">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Fecha de Nacimiento</span>
                                                                <input required id="fec_nac" type="date" class="form-control" name="fec_nac" value="{{$usuario->fec_nac}}">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Dirección</span>
                                                                <input required id="direccion" type="text" class="form-control" name="direccion" value="{{$usuario->direccion}}">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Telefono</span>
                                                                <input required id="telefono" type="number" min="1" class="form-control" name="telefono" value="{{$usuario->telefono}}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-success">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminar{{$usuario->id}}" type="button">
                                    Eliminar
                                    </button>
                                    <div class="modal fade" id="Eliminar{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="EliminarLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="EliminarLabel">¿Estas seguro de querer eliminar este registro?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/principal/delete/usuario/{{$usuario->id}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-success">Sí</button>
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
            </div>
            <div class="row mt-5">
                <div class="p-3 mb-2 bg-dark text-white">Préstamos</div>
                <table id="prestamos" class="table table-sm table-striped table-hover table-dark">
                    <thead class="thead-black">
                        <tr>
                            <th scope="col">Folio</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha de Salida</th>
                            <th scope="col">Fecha de Devolución</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Libro</th>
                            <th scope="col">
                                <button id="usuarios" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#folioForm">
                                    Nuevo
                                </button>
                                <div class="modal fade" id="folioForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="folioFormLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="folioFormLabel">Prestamo Nuevo</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/principal/create/prestamo" method="POST">
                                                    @csrf
                                                    <div class="container mw-75 p-3">
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Estado</span>
                                                            <select required name="estado" class="custom-select">
                                                                <option value="">Seleccione una Opción</option>
                                                                <option value="Prestamo">Prestamo</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Fecha de Salida</span>
                                                            <input required id="fec_salida" placeholder="Ej: 24/01/2023" type="date" class="form-control" name="fec_salida" value="{{old('fec_salida')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Fecha de Devolución</span>
                                                            <input id="fec_devolucion" placeholder="Ej: 26/01/2023" type="date" class="form-control" name="fec_devolucion" value="{{old('fec_devolucion')}}">
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Usuario</span>
                                                            <select required name="user_id" class="custom-select">
                                                                <option value="">Seleccione un Usuario</option>
                                                                @foreach ($usuarios as $usuario)
                                                                    <option value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->ap_paterno}} {{$usuario->ap_materno}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 input-group">
                                                            <span class="input-group-text">Libro</span>
                                                            <select required name="libro_id" class="custom-select">
                                                                <option value="">Seleccione un Libro</option>
                                                                @foreach ($libros as $libro)
                                                                    <option value="{{$libro->id}}">{{$libro->titulo}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-success">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prestamos as $prestamo)
                            <tr class="table-light">
                                <td>{{ $prestamo->id }}</td>
                                <td>{{ $prestamo->estado }}</td>
                                <td>{{ $prestamo->fec_salida }}</td>
                                <td>{{ $prestamo->fec_devolucion }}</td>
                                <td>{{ $prestamo->usuario->nombre }}  {{ $prestamo->usuario->ap_paterno }}</td>
                                <td>{{ $prestamo->libro->titulo }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarPrestamo{{$prestamo->id}}">
                                        Editar
                                    </button>
                                    <div class="modal fade" id="editarPrestamo{{$prestamo->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarPrestamoLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editarPrestamoLabel">Editar Prestamo</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/principal/edit/prestamo/{{$prestamo->id}}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="container mw-75 p-3">
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Estado</span>
                                                                <select name="estado" class="custom-select">
                                                                <option value="{{$prestamo->estado}}">{{$prestamo->estado}}</option>
                                                                <option value="Devuelto">Devuelto</option>
                                                            </select>
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Fecha de Salida</span>
                                                                <input id="fec_salida" type="date" class="form-control" name="fec_salida" value="{{$prestamo->fec_salida}}" disabled>
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Fecha de Devolución</span>
                                                                <input required id="fec_devolucion" type="date" class="form-control" name="fec_devolucion" value="{{$prestamo->fec_devolucion}}">
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Usuario</span>
                                                                <input id="user_id" type="string" class="form-control" name="user_id" value="{{$prestamo->usuario->nombre}} {{$prestamo->usuario->ap_paterno}}" disabled>
                                                            </div>
                                                            <div class="mb-3 input-group">
                                                                <span class="input-group-text">Libro</span>
                                                                <input id="libro_id" type="string" class="form-control" name="libro_id" value="{{$prestamo->libro->titulo}}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-success">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminar{{$prestamo->id}}" type="button">
                                    Eliminar
                                    </button>
                                    <div class="modal fade" id="Eliminar{{$prestamo->id}}" tabindex="-1" role="dialog" aria-labelledby="EliminarLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="EliminarLabel">¿Estas seguro de querer eliminar este registro?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/principal/delete/prestamo/{{$prestamo->id}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-success">Sí</button>
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
            </div>
            <div class="row mt-5">
                <div class="p-3 mb-2 bg-dark text-white">Libros en Prestamo</div>
                <table id="usuarios" class="table table-sm table-striped table-hover table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Folio</th>
                            <th scope="col">Libro</th>
                            <th scope="col">Fecha de Prestamo</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consulta as $prestamo)
                            <tr class="table-light">
                                <td>{{ $prestamo->id }}</td>
                                <td>{{ $prestamo->libro->titulo }}</td>
                                <td>{{ $prestamo->fec_salida }}</td>
                                <td>{{ $prestamo->estado }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
