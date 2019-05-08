<div class="sub-title">
    <h6>List Nasabah Akad</h6>
</div> 
{{-- <form method="get">--}}
<div class="row">
    <div class="col-sm-12 col-md-2">
         <div class="form-group">
            {{-- Show &nbsp; --}}
            <select name="perpage_na" id="perpage" class="form-control perpage">
                <option {{ selected(10, 'perpage_na', 'request')}}>10</option>
                <option {{ selected(25, 'perpage_na', 'request')}}>25</option>
                <option {{ selected(50, 'perpage_na', 'request')}}>50</option>
                <option {{ selected(100, 'perpage_na', 'request')}}>100</option>
            </select> 
            {{-- &nbsp; Entries --}}
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <div class="form-group">
            <input type="text" name="daterange" id="date" class="form-control" value="{{$nasabahAkad->dateRange}}" />
        </div>
    </div>
    <div class="col-sm-12 col-md-6 offset-md-1">
        <div class="row">
            <div class="col-sm-4 offset-md-1">
                <div class="form-group">
                    <select name="by_na" id="by" class="form-control">
                        @foreach($columnListNasabahAkad as $index => $item)
                            <option value="{{$index}}" {{selected($index, 'by_na', 'request')}}>{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-5 col-md-5">
                <div class="input-group input-group-success">
                    <span class="input-group-addon">
                       <i class="icofont icofont-ui-search"></i>
                    </span>
                    <input type="text" name="q_na" id="q" value="{{ request('q_na') }}" class="form-control" placeholder="Search">
                </div>
            </div>
            <div class="col-sm-2 col-md-2">
                <button type="submit" class="btn btn-default" id="btn-search">Oke</button>
            </div>
        </div>
    </div>
</div>
</form>
<br>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="table-responsive dt-responsive">
            <table id="dt-ajax-array" class="table table-striped table-bordered nowrap">
                <thead>
                <tr>
                    <th>No</th>
                     @foreach($columnListNasabahAkad as $index => $item)
                        <th>{{$item}}</th>
                     @endforeach
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($nasabahAkad->data as $index => $item)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$item->nama_lengkap}}</td>
                            <td>{{$item->no_telp}}</td>
                            <td>{{$item->no_id}}</td>
                            <td>{{$item->nama_barang}}</td>
                            <td>{{$item->nominal_nilai_tafsir}}</td>
                            <td>statis Rp. 0 (0 minggu)</td>
                            <td>{{$item->tanggal_akad}}</td>
                            <td>{{$item->tanggal_jatuh_tempo}}</td>
                            <td>
                                <a href="#" class="btn btn-mini btn-primary" onClick="prosedur_na('bt')">
                                    Bayar B. Titip
                                </a>
                                <a href="#" class="btn btn-mini btn-success" onClick="prosedur_na('pelunasan')">
                                    Pelunasan
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-mini btn-info" onClick="review_na()">
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
                                <div id="a2" style="display:none">
                                    <div class="popover-heading"></div>
                                    <div class="popover-body">
                                        <a href="javascript:void(0)" class="btn btn-mini btn-success mb-1">
                                            <i class="zmdi zmdi-print"></i> Surat Akad
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-mini btn-success mb-1">
                                            <i class="zmdi zmdi-print"></i> Kwitansi Akad
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-mini btn-success" onClick="review_na()">
                                            <i class="zmdi zmdi-search"></i> Kwitansi Biaya Titip
                                        </a>
                                    </div>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-mini btn-danger">
                                    <i class="icofont icofont-ui-delete icofont-mini"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="11" align="center">No data available in table</td>
                    </tr>
                    @endforelse
                </tbody>
                {{-- <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
                </tfoot> --}}
            </table>
        </div>
        {!! $nasabahAkad->data->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}
    </div>
</div>