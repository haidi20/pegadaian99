<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <h3 class="sub-title">No. ID</h3>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                {{-- FYI: c99-no_cabang-tanggal_bulan_tahun-data_ke --}}
                                <input type="text" class="form-control" name="no_id" id="no_id" value="C99-01-030417-001" disabled>
                                <input type="hidden" class="form-control" name="no_id" id="no_id" value="C99-01-030417-001">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <h3 class="sub-title">JANGKA WAKTU AKAD</h3>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-8">
                                <select name="jangka_waktu_akad" id="jangka_waktu_akad" class="form-control">
                                    @foreach($listTime as $index => $item)
                                        <option {{ selected($item['value'], 'jangka_waktu_akad', 'old')}} 
                                            value="{{$item['value']}}"
                                            id="jangka_waktu_akad">
                                                {{$item['text']}}
                                        </option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        {{-- <div class="form-radio">
                            @foreach($listTime as $index => $item)
                                @if($item['value'] != 1)
                                    <div class="radio radio-inline">
                                        <label>
                                        <input type="radio" name="jangka_waktu_akad"  value="{{$item['value']}}" id="id_{{ $item['value'] }}" onClick="timePeriod({{$item['value']}})" {{checked($item['value'], 'jangka_waktu_akad', 7)}}>
                                            <i class="helper"></i>{{$item['text']}}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div> --}}
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <h3 class="sub-title">Tanggal Akad</h3>
                        <div class="form-group row">
                            {{-- <label class="col-sm-2 col-form-label" for="investor">Investor</label> --}}
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="tanggal_akad" value="{{$tanggal_akad}}" disabled>
                                <input type="hidden" class="form-control" name="tanggal_akad" value="{{$tanggal_akad}}" >
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <h3 class="sub-title" for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</h3>
                        <div class="form-group row">
                            {{-- <label class="col-sm-2 col-form-label" for="investor">Investor</label> --}}
                            <div class="col-sm-10">
                                <input type="input" class="form-control" id="tanggal_jatuh_tempo" value="{{$tanggal_jatuh_tempo}}" disabled>
                                <input type="hidden" class="form-control" name="tanggal_jatuh_tempo" value="{{$tanggal_jatuh_tempo}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('coba')
<div class="col-sm-12 col-md-3">
        <div class="card">
           <div class="card-block">
               
               
           </div>
       </div>
   </div>
   <div class="col-sm-12 col-md-3">
        <div class="card">
           <div class="card-block">
               
           </div>
       </div>
   </div>
   <div class="col-sm-12 col-md-3">
        <div class="card">
           <div class="card-block">
               
           </div>
       </div>
   </div>
@endsection