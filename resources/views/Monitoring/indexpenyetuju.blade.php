@extends('templatepenyetuju')
@section('contentpenyetuju')

<div class="content">
    <div class="row">
          <div class="col-md-12">
                <h4 class="card-title"> Monitoring Kendaraan</h4>
                
            <div class="table-responsive">
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
                            <th scope="col">Jenis Kendaraan</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Bahan Bakar</th>
                            <th scope="col">BBM</th>
                            <th scope="col">jadwal service</th>
                            <th scope="col">Jadwal pemakaian</th>
                            <th scope="col">Jadwal pengembalian</th>
                            <th scope="col">Persetujuan</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->jeniskendaraan}}</td>
                                <td>{{ $item->id_driver}}</td>
                                <td>{{ $item->Bahanbakar }}</td>
                                <td>{{ $item->BBM }}</td>
                                <td>{{ $item->jadwalservice }}</td>
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
                                                    <select class="form-control @error('persetujuan') is-invalid @enderror" name="persetujuan" id="persetujuan" placeholder="persetujuan" autocomplete="off" value="{{ old('persetujuan') }}">
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