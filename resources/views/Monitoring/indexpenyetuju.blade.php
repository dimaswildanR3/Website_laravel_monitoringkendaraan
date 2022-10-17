@extends('templatepenyetuju')
@section('contentpenyetuju')

<div class="content">
    <div class="row">
          <div class="col-md-12">
                <h4 class="card-title"> Monitoring Kendaraan</h4>
                
            <div class="table-responsive">
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
                        @foreach ($data as  $item)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->driver_id}}</td>
                                <td>{{ $item->pemakaian }}</td>
                                <td>{{ $item->pengembalian }}</td>
                                <td>{{ $item->persetujuan }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $item->id }}">
                                       Persetujuan
                                    </button>
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
                                            <form action="{{ route('monitoring_kendaraanpenyetuju.update', $item->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
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
      
    @endsection