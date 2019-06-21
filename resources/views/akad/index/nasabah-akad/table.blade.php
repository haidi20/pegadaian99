<form method="get">
    <div class="row">
        <div class="col-md-1half">
             <div class="form-group">
                {{-- Show &nbsp; --}}
                <select name="perpage" id="perpage" class="form-control perpage">
                    <option {{ selected(10, 'perpage', 'request')}}>10</option>
                    <option {{ selected(25, 'perpage', 'request')}}>25</option>
                    <option {{ selected(50, 'perpage', 'request')}}>50</option>
                    <option {{ selected(100, 'perpage', 'request')}}>100</option>
                </select> 
                {{-- &nbsp; Entries --}}
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                <input type="text" name="daterange" id="date" class="form-control" value="{{$dateRange}}" />
            </div>
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <select name="by" id="by" class="form-control">
                            @foreach($column as $index => $item)
                                <option value="{{$index}}" {{selected($index, 'by', 'request')}}>{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="input-group input-group-success">
                        <span class="input-group-addon">
                           <i class="icofont icofont-ui-search"></i>
                        </span>
                        <input type="text" name="q" id="q" value="{{ request('q') }}" class="form-control" placeholder="Search">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <select name="detail_jenis_barang" id="detail_jenis_barang" class="form-control">
                    @foreach($detailJenisBarang as $index => $item)
                        <option value="{{$index}}" {{selected($index, 'detail_jenis_barang', 'request')}}>{{$item}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 opsi-pembayaran">
            <div class="form-group">
                <select name="opsi_pembayaran" id="opsi_pembayaran" class="form-control">
                    @foreach($waktuAkad as $index => $item)
                        <option value="{{$index}}" {{selected($index, 'opsi_pembayaran', 'request')}}>{{$item}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 jangka-waktu-akad">
            <div class="form-group">
                <select name="jangka_waktu_akad" id="jangka_waktu_akad" class="form-control">
                    @foreach($jangkaWaktuAkad as $index => $item)
                        <option value="{{$index}}" {{selected($index, 'jangka_waktu_akad', 'request')}}>{{$item}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-2">
            <button type="submit" class="btn btn-sm btn-primary" id="btn-search">Oke</button>
        </div>
    </div>
    <input type="hidden" class="name_tab" id="name_tab" name="name_tab" value="{{request('name_tab', 'seluruh_data')}}">
    <input type="hidden" name="page" value="{{request('page')}}">
</form>
<br>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="table-responsive dt-responsive">
            <table class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        @foreach($column as $index => $item)
                            <th>{{$item}}</th>
                        @endforeach
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $index => $item)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$item->nama_lengkap}}</td>
                            <td>{{$item->no_telp}}</td>
                            <td>{{$item->no_id}}</td>
                            <td>{{$item->nama_barang}}</td>
                            <td>{{$item->nominal_nilai_tafsir}}</td>
                            <td>{{$item->nominal_tunggakan->info}}</td>
                            <td>{{$item->tanggal_akad}}</td>
                            <td>{{$item->tanggal_jatuh_tempo}}</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-mini btn-primary" onClick="prosedur('bt', {{$item->id_akad}})">
                                    Bayar B. Titip
                                </a>
                                <a href="javascript:void(0)" class="btn btn-mini btn-success" onClick="prosedur('pelunasan', {{$item->id_akad}})">
                                    Pelunasan
                                </a>
                                <a href="javascript:void(0)" class="btn btn-mini btn-warning">
                                    Akad Baru
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-mini btn-info" onClick="review({{$item->id_akad}}, 'review')">
                                    <i class="zmdi zmdi-search"></i>
                                </a>
                                <button 
                                    type="button" 
                                    class="btn btn-success btn-mini waves-effect waves-light" 
                                    data-toggle="popover" 
                                    data-placement="left" 
                                    title="Print Menu"
                                    data-popover-content="#a2">
                                    <i class="zmdi zmdi-print"></i>
                                </button>
                                {{-- for menu-mini button print --}}
                                <div id="a2" style="display:none">
                                    <div class="popover-heading"></div>
                                    <div class="popover-body">
                                        <a href="javascript:void(0)" class="btn btn-mini btn-success mb-1">
                                            <i class="zmdi zmdi-print"></i> Surat Akad
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-mini btn-success mb-1">
                                            <i class="zmdi zmdi-print"></i> Kwitansi Akad
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-mini btn-success" onClick="review({{$item->id_akad}}, 'biaya_titip')">
                                            <i class="zmdi zmdi-search"></i> Kwitansi Biaya Titip
                                        </a>
                                    </div>
                                </div>
                                <a href="javascript:void(0)" onClick="edit_akad({{$item->id_akad}})" class="btn btn-mini btn-primary">
                                    <i class="icofont icofont-edit icofont-sm"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="11" align="center">No data available in table</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($data)
            {!! $data->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}
        @endif
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="view-info">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="general-info">
                        <div class="row" id="data-detail">
                            <div class="col-sm-12 col-md-7">
                                {{-- <div class="table-responsive"> --}}
                                <div class="">
                                    <table class="table m-0">
                                        <tbody id="table-detail-one">
                                            <tr>
                                                <td>Total Pinjaman </td>
                                                <td>: Rp. {{$infoTotal->totalPinjaman}}</td>
                                            </tr>
                                            <tr>
                                                <td>Total tunggakan </td>
                                                <td>: Rp. {{$infoTotal->totalTunggakan}}</td>
                                            </tr>
                                            <tr>
                                                <td>Total tunggakan jatuh tempo </td>
                                                <td>: Rp. {{$infoTotal->totalTunggakanJatuhTempo}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end of table col-lg-6 -->
                        </div>
                        <!-- end of row -->
                    </div>
                    <!-- end of general info -->
                </div>
                <!-- end of col-lg-12 -->
            </div>
            <!-- end of row -->
        </div>
    </div>
</div>