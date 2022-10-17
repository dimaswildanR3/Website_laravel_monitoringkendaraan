@extends('template')
@section('content')

<div class="content">
    <div class="row">
          <div class="col-md-12">
                <h4 class="card-title"> Monitoring Kendaraan</h4>
                
            <div class="table-responsive">
                <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addModal">
                +Tambah Data
                </button>
                <a href="/monitor/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Jadwal pemakaian</th>
                            <th scope="col">Jadwal pengembalian</th>
                            <th scope="col">Persetujuan</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($monitor as  $item)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->driver_id}}</td>
                                <td>{{ $item->pemakaian }}</td>
                                <td>{{ $item->pengembalian }}</td>
                                <td>{{ $item->persetujuan }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $item->id }}">
                                        Edit
                                    </button>
                                    <form method="POST" action="{{route('monitoring_kendaraan.destroy', [$item->id])}}" class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
                                    @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Detail</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('monitoring_kendaraan.update', $item->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}" required>   
                                                </div>
                                                <div class="form-group">
                                                    <label for="driver_id">Driver</label>
                                                    <select class="form-control @error('driver_id') is-invalid @enderror" name="driver_id" id="driver_id" placeholder="driver_id" autocomplete="off" value="{{ old('driver_id') }}">
                                                  
                                                     @foreach($driver as $Driver)
                                                     <option value="{{$Driver->driver_id}}">{{$Driver->name}}</option>
                                                     @endforeach 
                                                   
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pemakaian">Jadwal Pemakaian</label>
                                                    <input type="date" name="pemakaian" class="form-control" id="pemakaian" value="{{ $item->pemakaian }}" required>   
                                                </div>
                                                <div class="form-group">
                                                    <label for="pengembalian">Jadwal Pengembalian</label>
                                                    <input type="date" name="pengembalian" class="form-control" id="pengembalian" value="{{ $item->pengembalian }}" required>   
                                                </div>
                                                <div class="form-group">
                                                    <label for="persetujuan">Persetujuan</label>
                                                    <select name="persetujuan" id="persetujuan" class="form-control @error('persetujuan') is-invalid @enderror">
                                                    <option selected hidden >{{$item ->persetujuan}}</option> 
                                                    <option value="setuju">Setuju</option>
                                                    <option value="tidaksetuju">Tidak Setuju</option>
                                                    
                                                   
                                                    </select>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('monitoring_kendaraan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>   
                        </div>
                        <div class="form-group">
                                <label for="driver_id">Driver</label>
                                <select class="form-control @error('driver_id') is-invalid @enderror" name="driver_id" id="driver_id" placeholder="driver_id" autocomplete="off" value="{{ old('driver_id') }}">
                                <option value="">-Pilih-</option>
                              
                                @foreach($driver as $Driver)
                                <option value="{{$Driver->driver_id}}">{{$Driver->name}}</option>
                                @endforeach 
                               
                            </div>
                            </select>
                        <div class="form-group">
                            <label for="pemakaian">Jadwal Pemakaian</label>
                            <input type="date" name="pemakaian" class="form-control" id="pemakaian" required>   
                        </div>
                        <div class="form-group">
                            <label for="pengembalian">Jadwal Pengembalian</label>
                            <input type="date" name="pengembalian" class="form-control" id="pengembalian" required>   
                        </div>
                        <div class="form-group">
                     <label for="persetujuan">Persetujuan</label>
                     <select name="persetujuan" id="persetujuan" class="form-control @error('persetujuan') is-invalid @enderror">
                    <option value="">-Pilih-</option>
                     <option value="setuju">Setuju</option>
                     <option value="tidaksetuju">Tidak Setuju</option>
                    
                     </select>
                 </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    @endsection