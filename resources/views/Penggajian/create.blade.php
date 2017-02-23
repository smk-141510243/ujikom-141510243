@extends('layouts.app')

@section('content')

<br><br><br><br><br><br><br>
  <div class="container">
           <div class="panel panel-default">
                <div class="panel-heading"><center><font color="black" size="50%">PENGGAJIAN</font></div>
              {!! Form::open(['url' => 'Penggajian', 'class' => 'form-horizontal form-label-left']) !!}
    <div class="form-group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12">
            {!! Form::label('Pegawai', 'Pegawai ') !!}
             <span class="required">*</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-7 col-xs-12" name="tunjangan_pegawai_id">
            <option>--NIP | Nama Pegawai--</option>
            @foreach($gaji as $data)
                <option value="{{$data->id}}">{{$data->Pegawai->Nip}}&nbsp;|&nbsp;{{$data->Pegawai->User->name}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12">
            {!! Form::label('Status Pengambilan', 'Status Pengambialn ') !!}
             <span class="required">*</span>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
             <select name="Status_pengambilan" class="form-control">
                                    <option value="0">Belum Diambil</option>
                                    <option value="1">Sudah Diambil</option>
            </select>
        </div>
    </div>
     <div class="col-md-6 col-sm-6 col-xs-12">
      <span class="help-block">
            {{$errors->first('tunjangan_pegawai_id')}}
          </span>
                                       <div>
                                           @if(isset($error))
                                               Check Lagi Gaji Sudah Ada
                                           @endif
                                       </div>
                               </div>
       <div class="form-group">
         
              {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
          </div>
      </div>
    </div>
    {!! Form::close() !!}
          </div>
          </div>     
    </div>
@endsection





