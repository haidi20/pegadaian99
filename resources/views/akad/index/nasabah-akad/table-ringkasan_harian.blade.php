<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="table-responsive dt-responsive">
            <table class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Jenis Pendapatan</th>
                        <th>Akad Baru</th>
                        <th>Akad Ulang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pendapatan B. Titip</td>
                        <td>{{$ringkasanHarian->biayaTitip->akadBaru}}</td>
                        <td>{{$ringkasanHarian->biayaTitip->akadUlang}}</td>
                    </tr>
                    <tr>
                        <td>Pendapatan B. Admin</td>
                        <td>{{$ringkasanHarian->biayaAdmin->akadBaru}}</td>
                        <td>{{$ringkasanHarian->biayaAdmin->akadUlang}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- @if($data)
            {!! $data->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}
        @endif --}}
    </div>
</div>