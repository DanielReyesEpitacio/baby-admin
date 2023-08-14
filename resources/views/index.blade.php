@extends('layouts.masterpage')

@section('page_title','Cortes de caja')

@section('main_content')
    <div class="row">
        <div class="col mt-2">
            <a href="{{route('charts')}}" class="btn btn-primary">Ir a gráficos</a>
            <a href="{{route('filter-view')}}" class="btn btn-primary">Filtrar</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 mt-2">
            <h3 class="text-center">Historial de cortes de caja</h3>
        </div>
        <div class="col-12 mt-3">
            @if ($cash_closures->isNotEmpty())
            <table class="table table-hover">
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
                    @foreach ($cash_closures as $cs)
                        <tr>
                            <td>{{$cs->id}}</td>
                            <td>{{$cs->user->ndme}} {{$cs->user->last_name}}</th>
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
                            <th>{{number_format($totales["cash"],2,'.',',')}}</th>
                            <th>{{number_format($totales["rappi"],2,'.',',')}}</th>
                            <th>{{number_format($totales["terminal"],2,'.',',')}}</th>
                            <th>{{number_format($totales["expenses"],2,'.',',')}}</th>
                            <th>{{number_format($totales["tips"],2,'.',',')}}</th>
                        </tr>
                </tbody>
            </table>
            @else
                <div class="alert alert-danger">
                    <p>No hay cortes de caja registrados</p>
                </div>
            @endif()
        </div>
    </div>
@endsection