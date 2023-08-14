@extends('layouts.masterpage')
@section('page_title','Busqueda')


@section('main_content')
<div class="row">
    <div class="col-12">
        <a href="{{route('caja.index')}}">Regresar</a>
    </div>
    <div class="col-5 m-auto">
        <form action="{{route('filter')}}" method="post">
            @csrf
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Día</span>
              <input type="date" class="form-control" name="date" value="{{old('date')}}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Mes</span>
                <input type="number" min="1" max="12" name="month" class="form-control" value="{{old('month')}}"/>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Usuario</span>
                <select name="user_id">
                    <option value="" selected >Todos</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}" @if(old('user_id') == $user->id) selected @endif>{{$user->name}} {{$user->last_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Turno</span>
                <select name="turn">
                    <option value="" selected>Todos</option>
                    <option value="PRIMER TURNO" @if(old('turn') == 'PRIMER TURNO') selected @endif>1°</option>
                    <option value="SEGUNDO TURNO" @if(old('turn') == 'SEGUNDO TURNO') selected @endif>2°</option>
                    <option value="COMPLETO" @if(old('turn') == 'COMPLETO') selected @endif>Completo</option>
                </select>
            </div>
            <input type="submit" value="Buscar"/>
        </form>
    </div>
</div>

<div class="row mb-5">
    <div class="col-12">
        @if (session('cash_closures'))
            @if (session('cash_closures')->isNotEmpty())
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cajero</th>
                            <th>Fecha</th>
                            <th>Turno</th>
                            <th>Caja</th>
                            <th>Rappi</th>
                            <th>Terminal</th>
                            <th>Gastos</th>
                            <th>Propinas</th>
                            <th>Notas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('cash_closures') as $cs)
                            <tr>
                                <td>{{$cs->id}}</td>
                                <td>{{$cs->user->name}} {{$cs->user->last_name}}</th>
                                <td>{{$cs->created_at}}</td>
                                <td>{{$cs->turn}}</td>
                                <td>{{number_format($cs->cash,'2','.',',')}}</td>
                                <td>{{number_format($cs->rappi,'2','.',',')}}</td>
                                <td>{{number_format($cs->terminal,'2','.',',')}}</td>
                                <td>{{number_format($cs->expenses,'2','.',',')}}</td>
                                <td>{{number_format($cs->tips,'2','.',',')}}</td>
                                <td>{{$cs->notes}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="4" class="text-center">Totales</th>
                            <th>{{number_format(session('totales')['cash'],2,'.',',')}}</td>
                            <th>{{number_format(session('totales')['rappi'],2,'.',',')}}</td>
                            <th>{{number_format(session('totales')['terminal'],2,'.',',')}}</td>
                            <th>{{number_format(session('totales')['expenses'],2,'.',',')}}</td>
                            <th>{{number_format(session('totales')['tips'],2,'.',',')}}</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger mt-3">
                    <p>No se encontraron registros</p>
                </div>
            @endif
        @endif
    </di>
</div>

@endsection