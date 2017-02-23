 @extends('layouts.app1')
@section('content')

           
                <div class="panel-heading">     
                <h3><font face="Maiandra GD" color="black"><CENTER>Table Kategori Lembur</CENTER></font></h3></CENTER>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                  <center>  <a href="{{url('/Kategori_Lembur/create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Kategori Lembur</a></center>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Lembur</th>
                    <th>Jabatan</th>
                    <th>Golongan</th>
                    <th>Besaran Uang</th>
                    <th colspan="2"><center>Selection</center></th>

                </tr>
            </thead>
            @php
            $no = 1;
            @endphp
            <tbody>
                @foreach ($Kategori_Lembur as $data)
                <tr>
                    <td><center>{{ $no++ }}</center></td>
                    <td>{{ $data->Kode_Lembur}}</td>
                    <td>{{ $data->Jabatan->Nama_Jabatan }}</td>
                    <td>{{ $data->Golongan->Nama_Golongan }}</td>
                     <td><?php echo 'Rp'. number_format($data->Besaran_Uang, 2,",","."); ?>
             </td>
                    
             
                    <td><a href="{{route('Kategori_Lembur.edit',$data->id)}}" class="btn btn-warning">Update</a></td>
             <td>
               {!! Form::open(['method' => 'DELETE', 'route'=>['Kategori_Lembur.destroy', $data->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
     </td>
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