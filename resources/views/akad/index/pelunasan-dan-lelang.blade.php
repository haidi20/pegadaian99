<div class="sub-title">
    <h6>{{$item['name']}}</h6>
</div>                            
<div class="row">
    <div class="col-sm-12 col-md-2">
         <div class="form-group">
            {{-- Show &nbsp; --}}
             <select name="perpage_pl_{{$item['key']}}" id="perpage" class="form-control perpage">
                <option {{ selected(10, 'perpage_pl_'.$item['key'], 'request')}}>10</option>
                <option {{ selected(25, 'perpage_pl_'.$item['key'], 'request')}}>25</option>
                <option {{ selected(50, 'perpage_pl_'.$item['key'], 'request')}}>50</option>
                <option {{ selected(100, 'perpage_pl_'.$item['key'], 'request')}}>100</option>
            </select> 
            {{-- &nbsp; Entries --}}
        </div>
    </div>
    <div class="col-sm-12 col-md-6 offset-md-4">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <select name="by_pl_{{$item['key']}}" id="by" class="form-control">
                        @foreach($columnPelunasanLelang[$item['key']] as $key => $value)
                            <option value="{{$index}}" {{selected($key, 'by_pl_'.$item['key'], 'request')}}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-5 col-md-5">
                <div class="input-group input-group-success">
                    <span class="input-group-addon">
                       <i class="icofont icofont-ui-search"></i>
                    </span>
                    <input type="text" name="q_pl_{{$item['key']}}" id="q" value="{{ request('q_pl_'.$item['key']) }}" class="form-control" placeholder="Search">
                </div>
            </div>
            <div class="col-sm-2 col-md-2">
                <button type="submit" class="btn btn-default" id="btn-search">Oke</button>
            </div>
        </div>
    </div>
</div><br>
<div class="table-responsive dt-responsive">
    <table id="dt-ajax-array" class="table table-striped table-bordered nowrap">
        <thead>
        <tr>
            <th>No</th>
            @foreach($columnPelunasanLelang[$item['key']] as $key => $value)
                <th>{{$value}}</th>
            @endforeach
            {{-- <th>action</th> --}}
        </tr>
        </thead>
        <tbody id="akad_jatuh_tempo_{{$index}}">
            @forelse($item['data'] as $key => $value)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$value->nama_lengkap}}</td>
                    <td>{{$value->no_telp}}</td>
                    <td>{{$value->no_id}}</td>
                    <td>{{$value->nama_barang}}</td>
                    <td></td>
                    @if($item['key'] == 'lunas')
                        <td></td>
                        <td></td>
                        <td></td>
                    @elseif($item['key'] == 'refund')
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    @endif
                </tr>
            @empty
            <tr>
                <td colspan="11" align="center">No data available in table</td>
            </tr> 
            @endforelse
            {{-- <td colspan="11" align="center">No data available in table</td> --}}
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
{!! $item['data']->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}
<br><br><br><br>