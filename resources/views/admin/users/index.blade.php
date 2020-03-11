@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <!-- Default box -->
    <div id="app" class="card">
        <div class="card-header">
            <h3 class="card-title">Projects</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>
                            No.
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Jenis Kelamin
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Tanggal Lahir
                        </th>
                        <th>
                            Jumlah Dokumen
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participant->get() as $item)
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            <i style="font-size:2.5rem;" class="{{$item->Jenisk}}"></i>
                        </td>
                        <td>
                            <span style="background-color:{{$item->statuscolor}} !important"
                                class="badge badge-secondary">{{$item->status}}</span>
                        </td>
                        <td>
                            {{$item->birthdate}} <br> <small class="text-muted">({{$item->age}})</small>
                        </td>
                        <td>
                            {{$item->documents->count()}} Dokumen
                        </td>
                        <td class="project-actions">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.peserta.show',$item->id)}}">
                                <i class="fas fa-folder">
                                </i>
                                Detail
                            </a>
                            <a class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection
