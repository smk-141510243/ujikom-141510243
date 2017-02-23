@extends('layouts.app')
@section('content')
            <div class="panel panel-default">
                <div class="panel-heading"><center><font color="black" size="6%">Create Lembur Pegawai</font></div>
</center>
                <div class="panel-body">
    {!! Form::open(['url' => 'Lembur_Pegawai']) !!}

      <div class="form-group">
       {!! Form::label('Kode Lembur', 'Kode Lembur') !!}
        
            <select class="form-control" name="Kode_Lembur">   
             @foreach ($Kategori_Lembur as $data)
            <option value='{!! $data->id !!}'>{!! $data->Kode_Lembur!!}</option>
            @endforeach
            </select>
    </div>

 <div class="form-group">
  {!! Form::label('Nama Pegawai', 'Nama Pegawai') !!}
        
            <select class="form-control" name="Kode_Pegawai">   
             @foreach ($Pegawai as $data)
            <option value='{!! $data->id !!}'>{!! $data->User->name !!}</option>
            @endforeach
            </select>
    </div>
  <div class="form-group">
        {!! Form::label('Jumlah Jam', 'Jumlah Jam') !!}
        {!! Form::text('Jumlah_Jam',null,['class'=>'form-control','required']) !!}
    </div>
     
      <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div> 
    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

    
@stop

