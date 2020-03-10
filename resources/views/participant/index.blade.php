@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="card mx-auto p-4 shadow" style="width: 22rem;">
        <img class="card-img-top" src="{{$avatar}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h5>
            <p class="card-text">{{ucfirst($user->gender)}}</p>
            <p class="card-text">Umur : {{$user->age}}</p>
            <p class="card-text">Tanggal Lahir : {{$user->formatedbirthdate}}</p>
            <p class="card-text">Status : {{$user->status}}</p>
            <p class="card-text">Golongan Musabaqah : {{$user->contest->name}}</p>

        </div>
    </div>
    <form action="/peserta/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row text-left">
            @foreach ($options as $option)
            @if ($option == 'foto')
            <div class="col-md-4 mx-md-auto card p-2 my-md-2">
                <label for="{{$option}}">{{str_replace('_', ' ', $option)}}</label>
                <input type="file" name="{{$option}}"
                    data-placeholder="@if($user->documents->where('types','foto')->first()){{$user->documents->where('types','foto')->first()->old_name}} @endif"
                    class="form-control-file jfilestyle" data-buttonBefore="true"
                    data-text="@if($user->documents->where('types','foto')->first()) Ganti @else Pilih @endif"
                    accept=".jpg, .png,.jpeg" id="{{$option}}">
            </div>
            @else
            <div class="col-md-4 mx-md-auto card p-2 my-md-2">
                <label for="{{$option}}">{{str_replace('_', ' ', $option)}}</label>
                <input type="file" name="{{$option}}"
                    data-placeholder="@if($user->documents->where('types',$option)->first()){{$user->documents->where('types',$option)->first()->old_name}}@endif"
                    class="form-control-file jfilestyle" data-buttonBefore="true"
                    data-text="@if($user->documents->where('types',$option)->first())Ganti @else Pilih @endif"
                    accept=".pdf" id="{{$option}}">
            </div>
            @endif
            @endforeach
        </div>
        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
</div>
@endsection
