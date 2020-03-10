@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pendaftaran') }}</div>

                <div class="card-body">
                    <form method="POST" id="myForm" autocomplete="off" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Alamat Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birthDate"
                                class="col-md-4 col-form-label text-md-right">{{ __('Masukkan Tgl Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="birthDate" name="birthdate" width="276">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-md-2 offset-md-2 col-sm-2 pt-0">Jenis Kelamin</legend>
                                <div class="col-sm-10 col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="genderRadio1"
                                            value="putera" checked>
                                        <label class="form-check-label" for="genderRadio1">
                                            Putera
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="genderRadio2"
                                            value="puteri">
                                        <label class="form-check-label" for="genderRadio2">
                                            Puteri
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-group row">
                            <label for="golongan-lomba" class="col-md-4 col-form-label text-md-right">Pilih Golongan
                                Lomba</label>
                            <div class="col-md-6">
                                <select name="golongan-lomba" id="golonganlomba" class="custom-select">

                                </select>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')


<script>
    const mainSelect = document.getElementById('golonganlomba');
    let glomba = @json(App\ Contest::all());
    $(document).ready(function () {
        glomba.forEach(element => {
            if (element['types'] == 'putera') {
                var option = document.createElement("option");
                option.text = element.name;
                option.value = element.id;
                mainSelect.appendChild(option);
            }
        });
    });
    $("#myForm input[type=radio]").on("change", function () {
        if (this.checked) {
            mainSelect.innerHTML = '';
            glomba.forEach(element => {
                if (element['types'] == this.value) {
                    var option = document.createElement("option");
                    option.text = element.name;
                    option.value = element.id;
                    mainSelect.appendChild(option);
                }
            });
        }
    });

</script>




<script>
    gj.dialog.messages['id-id'] = {
        Close: 'Tutup',
        DefaultTitle: 'Dialog'
    };
    gj.grid.messages['id-id'] = {
        First: 'Pertama',
        Previous: 'Sebelumnya',
        Next: 'Selanjutnya',
        Last: 'Terakhir',
        Page: 'Halaman',
        FirstPageTooltip: 'Hal Pertama',
        PreviousPageTooltip: 'Hal Sebelumnya',
        NextPageTooltip: 'Hal Selanjutnya',
        LastPageTooltip: 'Hal Terakhir',
        Refresh: 'Muat Ulang',
        Of: 'dari',
        DisplayingRecords: 'Menampilkan rekaman',
        RowsPerPage: 'Baris per halaman:',
        Edit: 'Ubah',
        Delete: 'Hapus',
        Update: 'Perbarui',
        Cancel: 'Batal',
        NoRecordsFound: 'Tidak ada data.',
        Loading: 'Menunggu...'
    };
    gj.editor.messages['id-id'] = {
        bold: 'Bold',
        italic: 'Italic',
        strikethrough: 'Strikethrough',
        underline: 'Underline',
        listBulleted: 'List Bulleted',
        listNumbered: 'List Numbered',
        indentDecrease: 'Indent Decrease',
        indentIncrease: 'Indent Increase',
        alignLeft: 'Align Left',
        alignCenter: 'Align Center',
        alignRight: 'Align Right',
        alignJustify: 'Align Justify',
        undo: 'Undo',
        redo: 'Redo'
    };
    gj.core.messages['id-id'] = {
        monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'October', 'November', 'December'
        ],
        monthShortNames: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        weekDaysMin: ['M', 'N', 'A', 'R', 'K', 'J', 'U'],
        weekDaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
        weekDays: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        am: 'AM',
        pm: 'PM',
        ok: 'OK',
        cancel: 'Batalkan',
        titleFormat: 'mmmm yyyy'
    };
    $('#birthDate').datepicker({
        locale: 'id-id',
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });

</script>


@endsection
