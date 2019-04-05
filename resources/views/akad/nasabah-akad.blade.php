<div class="sub-title">
    <h6>List Nasabah Akad</h6>
</div>
<div class="row">
    <div class="col-sm-3 col-md-3">
        <div class="form-group">
            <input type="text" name="daterange" id="date" class="form-control" value="{{$dateRange}}" />
        </div>
    </div>
</div>                             
<div class="row">
    <div class="col-sm-12 col-md-2">
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
            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                   
                    <select name="by" id="by" class="form-control">
                        @foreach($columnListNasabahAkad as $index => $item)
                            <option value="{{$index}}" {{selected($index, 'by', 'request')}}>{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-5 col-md-5">
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
                    {{-- <th>action</th> --}}
                </tr>
                </thead>
                <tbody>
                    @forelse($akad as $index => $item)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$item->nama_lengkap}}</td>
                            <td>{{$item->no_telp}}</td>
                            <td>{{$item->no_id}}</td>
                            <td>{{$item->nama_barang}}</td>
                            <td>{{$item->nilai_tafsir}}</td>
                            <td></td>
                            <td>{{$item->tanggal_akad}}</td>
                            <td>{{$item->tanggal_jatuh_tempo}}</td>
                            <td></td>
                            {{-- <td>
                                <a href="{{route('akad.edit', $item->id)}}" class="btn btn-sm btn-info">
                                    <i class="icon-pencil3"></i> Edit
                                </a>
                                <a href="{{ route('akad.destroy', $item->id)}}"
                                    data-method="delete" data-confirm="Anda yakin akan menghapus data ini ?"
                                    class="btn btn-sm btn-danger" title="Hapus Data">
                                    <i class="icon-trash3"></i>
                                    Delete
                                </a>
                            </td> --}}
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
        {!! $akad->appends(Request::input()); !!}
        {{-- <div class="container"> --}}
          {{-- <h2>Pagination</h2>
          <p>To create a basic pagination, add the .pagination class to an ul element. Then add the .page-item to each li element and a .page-link class to each link inside li:</p>                  
          <ul class="pagination">
            <li ><a class="page-link" href="#">Previous</a></li>
            <li ><a class="page-link" href="#">1</a></li>
            <li ><a class="page-link" href="#">2</a></li>
            <li ><a class="page-link" href="#">3</a></li>
            <li ><a class="page-link" href="#">Next</a></li>
          </ul> --}}
        {{-- </div> --}}
    </div>
</div>