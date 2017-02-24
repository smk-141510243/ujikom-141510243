@extends('layouts.app')
@section('content')
            <div class="panel panel-default">
                <div class="panel-heading"><center><font color="black" size="6%">Create Jabatan</font></div>
</center>
               <div class="panel-body">
    {!! Form::open(['url' => 'Jabatan']) !!}
     <div class="form-group{{ $errors->has('Kode_Jabatan') ? ' has-error' : '' }}">
                            {!! Form::label('Kode', 'Kode Jabatan:') !!}
                            <input type="text" name="Kode_Jabatan" class="form-control" required>

                            @if ($errors->has('Kode_Jabatan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('Kode_Jabatan') }}</strong>
                                </span>
                            @endif 
                        </div>
    <div class="form-group">
        {!! Form::label('Nama Jabatan', 'Nama Jabatan') !!}
        {!! Form::text('Nama_Jabatan',null,['class'=>'form-control','required']) !!}
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