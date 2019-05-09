<div class="row">
        <div class="col-sm-4">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Jangka Waktu Akad</h3>
                        <div class="form-radio">
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Tanggal Akad</h3>
                    <div class="form-group row">
                        {{-- <label class="col-sm-2 col-form-label" for="investor">Investor</label> --}}
                        <div class="col-sm-10">
                            <input type="input" class="form-control" id="tanggal_akad" value="{{$tanggal_akad}}" disabled>
                            <input type="hidden" class="form-control" name="tanggal_akad" value="{{$tanggal_akad}}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
             <div class="card">
                <div class="card-block">
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