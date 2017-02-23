@extends('layouts.app1')

@section('content')

            
                <div class="panel-heading">     
                <h3><font face="Maiandra GD" color="black"><CENTER>Table Pegawai</CENTER></font></h3></CENTER>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                    <center><a href="{{url('/Pegawai/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Pegawai</a></center>
            <thead>
                <tr>
                   <th><center>No</center></th>
					<th><center>NIP</center></th>
					<th><center>NAMA PEGAWAI</center></th>
					<th><center>JABATAN</center></th>
					<th><center>GOLONGAN</center></th>
					<th><center>PHOTO</center></th>
					<th colspan="3"><center>SELECTION </center></th>

                </tr>
            </thead>
            <?php
				$no = 1;
			?>
				@foreach($Pegawai as $data)
            <tbody>
               
                <tr>
						<td><center>{{ $no++ }}</center></td>
						<td><center>{{ $data->Nip }}</center></td>
						<td><center>{{ $data->User->name }}</center></td>
						<td><center>{{ $data->Jabatan->Nama_Jabatan }}</center></td>
						<td><center>{{ $data->Golongan->Nama_Golongan }}</center></td>
						<td>
							<center>
								<img src="{{asset('/image/'.$data->Photo)}}" height="100px" width="100px">
							</center>
						</td>
						<!-- <td><center><a href="{{ url('Pegawai', $data->id) }}" class="btn btn-primary">Lihat</a></center></td>
					 -->	<td><center><a href="{{ route('Pegawai.edit', $data->id) }}" class="btn btn-warning">Update</a></center></td>
						<td><center>
							{!! Form::open(['method' => 'DELETE', 'route' => ['Pegawai.destroy', $data->id]]) !!}
							{!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</center></td>
					</tr>
				@endforeach

            </tbody>
        </table>
    
                </div>
        </div>
    </div>
</div>
    
</div>
@endsection