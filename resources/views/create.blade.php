@extends('layouts.masterpage')

@section('page_title','Corte de caja')

@section('main_content')
    <div class="row">
        @if(!$errors->isEmpty())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <div class="col-4 m-auto">
            <form class="row" action="{{route('caja.store')}}" method="post">
              @csrf
                <div class="input-group mb-3">
                  <label class="input-group-text" for="inputGroupSelect01">Usuario</label>
                  <select class="form-select" id="inputGroupSelect01" name="user_id">
                    <option selected>Elija un usuario</option>
                    @if ($users != null)
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                        @endforeach
                    @endif
                  </select>
                </div>

                <div class="input-group mb-3">
                  <label class="input-group-text">Tuno</label>
                  <select name="turn" class="form-select">
                    <option selected>Elija un turno</option>
                    <option value="PRIMER TURNO">1°</option>
                    <option value="SEGUNDO TURNO">2°</option>
                    <option value="COMPLETO">Completo</option>
                  </select>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Caja</span>
                  <input type="number" step="0.01" class="form-control" placeholder="Total" value="{{old('cash')}}" aria-describedby="basic-addon1" name="cash">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Rappi</span>
                  <input type="number" step="0.01" class="form-control" placeholder="Total" value="{{old('rappi')}}" aria-describedby="basic-addon1" name="rappi">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Terminal</span>
                  <input type="number" step="0.01" class="form-control" placeholder="Total" value="{{old('terminal')}}" aria-describedby="basic-addon1" name="terminal">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Gastos</span>
                  <input type="number" step="0.01" class="form-control" placeholder="Total" value="{{old('expenses')}}" aria-describedby="basic-addon1" name="expenses">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Propinas</span>
                  <input type="number" step="0.01" class="form-control" placeholder="Total" value="{{old('tips')}}" aria-describedby="basic-addon1" name="tips">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Notas</span>
                  <textarea name="notes" rows="4" colspan="">{{old('notes')}}</textarea>
                </div>

                <div class="input-group mb-3">
                    <input type="submit" value="Guardar" class="btn m-auto">
                    <a href="#" class="btn m-auto">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
@endsection


@section('scripts_content')
  @include('scripts.success-feedback')
@endsection