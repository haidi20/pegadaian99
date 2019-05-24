<div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Keterangan Marhun Barang Jaminan</h3>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="nama_barang">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{old('nama_barang')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Jenis Barang</label>
                        <div class="col-sm-10">
                            <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="jenis_barang" onClick="jenis_barang_pilih('elektronik')" value="elektronik" {{checked('elektronik', 'jenis_barang', 'elektronik')}}>
                                        <i class="helper"></i>Elektronik
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="jenis_barang" onClick="jenis_barang_pilih('kendaraan')" value="kendaraan" {{checked('kendaran', 'jenis_barang', 'elektronik')}}>
                                        <i class="helper"></i>Kendaraan
                                    </label>
                                </div>
                                <input type="hidden" id="nilai_jenis_barang" value="elektronik">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="item_elektronik" style="display:">
                        <label class="col-sm-2 col-form-label kelengkapan_barang_satu" for="kelengkapan_barang_satu">Type</label>
                        <div class="col-sm-12 col-md-2">
                            <input type="text" class="form-control" name="kelengkapan_barang_satu" id="kelengkapan_barang_satu" value="{{old('kelengkapan_barang_satu')}}" required>
                        </div>
                        <label class="col-sm-1 col-form-label kelengkapan_barang_dua" for="kelengkapan_barang_dua">Merk</label>
                        <div class="col-sm-12 col-md-2">
                            <input type="text" class="form-control" name="kelengkapan_barang_dua" id="kelengkapan_barang_dua" value="{{old('kelengkapan_barang_dua')}}" required>
                        </div>
                        <label class="col-sm-2 col-form-label kelengkapan_barang_tiga" for="kelengkapan_barang_tiga">Imei / Nomor Serial</label>
                        <div class="col-sm-12 col-md-3">
                            <input type="text" class="form-control" name="kelengkapan_barang_tiga" id="kelengkapan_barang_tiga" value="{{old('kelengkapan_barang_tiga')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Kelengkapan barang</label>
                        <div class="col-sm-10">
                            <textarea rows="5" cols="5" class="form-control" id="kelengkapan" name="kelengkapan" required>{{old('kelengkapan')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Kekurangan / Kerusakan Barang</label>
                        <div class="col-sm-10">
                            <textarea rows="5" cols="5" class="form-control" id="kekurangan" name="kekurangan" required>{{old('kekurangan')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="card">
                <div class="card-block">
                    {{-- <h3 class="sub-title">Keterangan Marhun Barang Jaminan</h3> --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="taksiran_marhun">Taksiran Marhun</label>
                        <div class="col-sm-10">
                            <input 
                                type="text" 
                                class="form-control " 
                                name="taksiran_marhun" 
                                id="taksiran_marhun" 
                                value=""
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="marhun_bih">Marhun Bih</label>
                        <div class="col-sm-10">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="marhun_bih" 
                                id="marhun_bih" 
                                value=""
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Opsi Pembayaran</label>
                        <div class="col-sm-10">
                            <div class="form-radio">
                                {{-- setting show / hide use jquery  --}}
                                @foreach($paymentOption as $index => $item)
                                    <div class="radio radio-inline" id="op_{{$item['value']}}" style="display: none">
                                        <label>
                                            <input type="radio" name="opsi_pembayaran" onClick="kondisi_nilai_opsi_pembayaran('{{$item['value']}}')" value="{{$item['value']}}" {{checked($item['value'], 'opsi_pembayaran', 1)}}>
                                            <i class="helper"></i>{{$item['text']}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" id="nilai_opsi_pembayaran" name="nilai_opsi_pembayaran" value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="biaya_titip">Biaya Titip</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control autonumber biaya_titip" value="0"  data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," disabled>
                                <input type="hidden" name="biaya_titip" class="biaya_titip" value="0">
                                <input type="hidden" name="biaya_titip_minggu_ke" class="" value="1-2">
                            </div>                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="bt_yang_dibayar">Biaya Titip yang Dibayar</label>
                        <div class="col-sm-12 col-md-2">
                            <select name="bt_yang_dibayar" id="bt_yang_dibayar" class="form-control" >
                                {{-- @for($i = 0; $i <= 7; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor --}}
                            </select> 
                            <input type="hidden" id="nilai_bt_yang_dibayar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" for="jumlah_bt_yang_dibayar">Jumlah Biaya Titip yang Dibayar</label>
                        <div class="col-sm-12 col-md-10">
                            {{-- <select name="bt_yang_dibayar" id="bt_yang_dibayar" class="form-control">
                                <option {{ selected(1, 'bt_yang_dibayar', 'old')}}>1</option>
                            </select>  --}}
                            <input type="text" class="form-control jml_bt_yang_dibayar" value="0" disabled>
                            <input type="hidden" class="form-control jml_bt_yang_dibayar" name="jml_bt_yang_dibayar" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="biaya_admin">Biaya Administrasi</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control biaya_admin" value="10.000" id="biaya_admin" disabled>
                                <input type="hidden" class="form-control biaya_admin" name="biaya_admin" value="10.000">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {{-- <label class="col-sm-2 col-form-label" for="terbilang">Terbilang</label> --}}
                        <div class="col-sm-10">
                            {{-- <input type="text" class="form-control terbilang" value="{{old('terbilang')}}" disabled> --}}
                            <input type="hidden" class="form-control terbilang" name="terbilang">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>