@extends('layouts.app1')

@section('content')

            
                <div class="panel-heading">     
                <h3><font face="Maiandra GD" color="black"><CENTER>Table Tunjangan Pegawai</CENTER></font></h3></CENTER>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                     <center> <a href="{{url('/Tunjangan_Pegawai/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tunjangan Pegawai</a></center>
            <thead>
                <tr>
                   <th><center>No</center></th>
					<th><center>Kode Tunjangan</center></th>
					<th><center>Nama Pegawai</center></th>
					<th><center>Jabatan</center></th>
					<th><center>Golongan</center></th>
					<th><center>Jumlah anak</center></th>
					<th><center>Besaran uang</center></th>
					
					<th colspan="3"><center>Selection </center></th>

                </tr>
            </thead>
            <?php
				$no = 1;
			?>
				@foreach($Tunjangan_Pegawai as $data)
            <tbody>
               
                <tr>
						<td><center>{{ $no++ }}</center></td>
						<td><center>{{ $data->Tunjangan->Kode_Tunjangan }}</center></td>
						<td><center>{{ $data->Pegawai->User->name }}</center></td>
						<td><center>{{ $data->Pegawai->Jabatan->Nama_Jabatan }}</center></td>
						<td><center>{{ $data->Pegawai->Golongan->Nama_Golongan }}</center></td>
						<td><center>{{ $data->Tunjangan->Jumlah_Anak }}</center></td>
			
						 <td><center>
                                       <?php
                                       if ( $data->Tunjangan->Jumlah_Anak <= '1' )
                                       {      
                                           echo "". $data->Tunjangan->Besaran_Uang;
                                       }      

                                       elseif ( $data->Tunjangan->Jumlah_Anak == '1' || $data->Tunjangan->Jumlah_Anak == '2')
                                       {      
                                           
                                           echo "". $data->Tunjangan->Besaran_Uang * $data->Tunjangan->Jumlah_Anak;
                                       }

                                       elseif ( $data->Tunjangan->Jumlah_Anak >= '2')
                                       {
                                           echo "". $data->Tunjangan->Besaran_Uang * '2';
                                       } 
                                       
                                       ?>
                                   </center></td>
						<td><center><a href="{{ route('Tunjangan_Pegawai.edit', $data->id) }}" class="btn btn-warning">Update</a></center></td>
						<td><center>
							{!! Form::open(['method' => 'DELETE', 'route' => ['Tunjangan_Pegawai.destroy', $data->id]]) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
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
    
</div>
@endsection