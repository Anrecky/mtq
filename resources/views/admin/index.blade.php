@extends('layouts.dashboard')

@push('styles')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            language: {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            }
        });
    });

</script>
<script>
    let statusPeserta = @json($s_opts);
    let statStatistic = @json($participants->get()->countBy('status'),JSON_PRETTY_PRINT);
    var pieData = {
    labels: statusPeserta,
    datasets: [
        {
            data: statusPeserta.map((data)=>{
                return statStatistic[data];
            }),
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#212121', ],
        }
    ]
}
var pieOptions = {
    legend: {
        display: false
    }
}
</script>
<!-- ChartJS -->
<script src="{{asset('js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('js/dashboard.js')}}"></script>
@endpush

@section('content')
<section id="app" class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <!-- col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pendaftar Baru</span>
                        <span class="info-box-number">{{$participants->count()}}</span>
                    </div>

                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->

            </div>
            <!-- /.col -->

            <!-- col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Dokumen</span>
                        <span class="info-box-number">{{$participants->count()}}</span>
                    </div>

                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->

            </div>
            <!-- /.col -->

            <!-- col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Peserta Terverifikasi</span>
                        <span
                            class="info-box-number">@if(array_key_exists("Terverifikasi",$by_status)){{$by_status['Terverifikasi']->count()}}
                            @endif</span>
                    </div>

                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">

            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pendaftar Baru</h3>

                        <div class="card-tools">
                            <span class="badge badge-info">{{$daily_new->count()}} Peserta Baru
                                Mendaftar</span>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="users-list clearfix">
                            @foreach ($daily_new as $d_new)
                            <li>
                                <img src="{{\Storage::url($d_new->avatar)}}" alt="User Image">
                                <a class="users-list-name" href="#">{{$d_new->name}}</a>
                                <span class="users-list-date">{{$d_new->created_at->diffForHumans()}}</span>
                            </li>
                            @endforeach
                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        {{ $daily_new->links() }}
                    </div>
                </div>
                <!--/.card -->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Status Peserta</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart" height="150"></canvas>
                                </div>
                                <!-- ./chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="far fa-circle text-success"></i> Terverifikasi</li>
                                    <li><i class="far fa-circle text-dark"></i> Ditolak</li>
                                    <li><i class="far fa-circle text-warning"></i> Ditunda</li>
                                    <li><i class="far fa-circle text-danger"></i> Diskualifikasi</li>
                                    <li><i class="far fa-circle text-primary"></i> Baru</li>
                                </ul>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <!-- PRODUCT LIST -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Upload Dokumen Terbaru</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($latest_docs as $ldoc)
                            <li class="item">
                                <div class="product-info">
                                    <a href="{{route('doc.download',$ldoc->id)}}" class="product-title">{{$ldoc->name}}
                                        <span
                                            class="badge badge-info float-right">{{$ldoc->created_at->diffForHumans()}}</span></a>
                                    <span class="product-description">
                                        <p class="small text-muted">Jenis Dokumen : {{$ldoc->types}}</p>
                                    </span>
                                </div>
                            </li>
                            <!-- /.item -->
                            @endforeach

                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        {{$latest_docs->links()}}
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pendaftar</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants->get() as $participant)
                                @if (!$participant->is_admin)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$participant->name}}</td>
                                    <td>{{$participant->birthdate}}</td>
                                    <td>{{$participant->age}}</td>
                                    <td>{{$participant->gender}}</td>
                                    <td>{{$participant->status}}</td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</section>
@endsection
