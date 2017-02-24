@extends('layouts.app')
@section('content')
            <div class="panel panel-default">
                <div class="panel-heading"><center><font color="black" size="6%">Create Kategori Lembur</font></div>
</center>
                <div class="panel-body">
    {!! Form::open(['url' => 'Kategori_Lembur']) !!}
    <div class="form-group{{ $errors->has('Kode_Lembur') ? ' has-error' : '' }}">
                            {!! Form::label('Kode', 'Kode Lembur:') !!}
                            <input type="text" name="Kode_Lembur" class="form-control" required>

                            @if ($errors->has('Kode_Lembur'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('Kode_Lembur') }}</strong>
                                </span>
                            @endif 
                        </div>

      <div class="form-group">
      {!! Form::label('Jabatan', 'Jabatan') !!}
            <select class="form-control" name="Kode_Jabatan">   
            
            @foreach ($Jabatan as $data)
            <option value='{!! $data->id !!}'>{!! $data->Nama_Jabatan !!}</option>
            @endforeach
            </select>
    </div>

       <div class="form-group">
      {!! Form::label('Golongan', 'Golongan') !!}
      
            <select class="form-control" name="Kode_Golongan">   
          
            @foreach ($Golongan as $data)
            <option value='{!! $data->id !!}'>{!! $data->Nama_Golongan !!}</option>
            @endforeach
            </select>
    </div>

    <div class="form-group">
        {!! Form::label('Besaran Uang', 'Besaran Uang') !!}
        {!! Form::text('Besaran_Uang',null,['class'=>'form-control','required']) !!}
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

