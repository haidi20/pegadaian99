<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <form method="get">
            <div class="card-header">
                <h3>{{$title}}</h3>
            </div>
            <div class="card-block">
                    <!-- Row start -->
                    <div class="row">
                    <div class="col-md-1half">
                        <div class="form-group">
                            {{-- Show &nbsp; --}}
                            <select name="perpage" id="perpage" class="form-control">
                                <option {{ selected(10, 'perpage', 'request')}}>10</option>
                                <option {{ selected(25, 'perpage', 'request')}}>25</option>
                                <option {{ selected(50, 'perpage', 'request')}}>50</option>
                                <option {{ selected(100, 'perpage', 'request')}}>100</option>
                            </select> 
                            {{-- &nbsp; Entries --}}
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 offset-md-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="form-group">
                                    <select name="by" id="by" class="form-control">
                                        @foreach($column as $index => $item)
                                            <option value="{{$index}}" {{selected($index, 'by', 'request')}}>{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-5">
                                <div class="input-group input-group-success">
                                    <span class="input-group-addon">
                                        <i class="icofont icofont-ui-search"></i>
                                    </span>
                                    <input type="text" name="q" id="q" value="{{ request('q') }}" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2">
                                <button type="submit" class="btn btn-default" id="btn-search">Oke</button>
                            </div>
                        </div>
                    </div>
                </div><br>
                </form>
                <div class="table-responsive dt-responsive">
                    <table id="dt-ajax-array" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>No</th>
                            @foreach($column as $index => $item)
                                <th>{{$item}}</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" class="id_akad" name="id_akad">
                            @forelse($data as $index => $item)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$item->nama_lengkap}}</td>
                                    <td>{{$item->no_telp}}</td>
                                    <td>{{$item->no_id}}</td>
                                    <td>{{$item->nama_barang}}</td>
                                    <td>{{$item->nominal_nilai_pencairan}}</td>
                                    <td>{{$item->data_tunggakan->info}}</td>
                                    <td>{{$item->format_tanggal_akad}}</td>
                                    <td>{{$item->format_tanggal_jatuh_tempo}}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-mini btn-primary" onClick="prosedur({{$item->id_akad}}, 'biaya_titip')">
                                            Bayar B. Titip
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-mini btn-success" onClick="prosedur({{$item->id_akad}}, 'pelunasan')">
                                            Pelunasan
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-mini btn-warning" onClick="akad_ulang({{$item->id_akad}})">
                                            Akad Ulang
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-mini btn-info" onClick="prosedur({{$item->id_akad}}, 'lelang')">
                                            Lelang
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-mini" style="background-color:blueviolet; color:white" onClick="prosedur({{$item->id_akad}}, 'perpanjangan')">
                                            Perpanjangan
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
                                            onClick="get_id({{$item->id_akad}})"
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
                                        <a href="{{route('akad.edit', $item->id_akad)}}" class="btn btn-mini btn-primary">
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
                {!! $data->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}                   
            </div>
        </div> 
    </div>
</div>