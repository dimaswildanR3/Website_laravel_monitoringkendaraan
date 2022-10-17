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
                            <th scope="col">Jenis Kendaraan</th>
                            <th scope="col">mobil</th>
                            <th scope="col">bahanbakar</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($driver as  $item)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->jeniskendaraan}}</td>
                                <td>{{ $item->mobil }}</td>
                                <td>{{ $item->bahanbakar }}</td>
                
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $item->driver_id }}">
                                        Edit
                                    </button>
                                    <form method="POST" action="{{route('driver.destroy', [$item->driver_id])}}" class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
                                    @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal-{{ $item->driver_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Detail</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('driver.update', $item->driver_id) }}" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}" required>   
                                                </div>
                                                <div class="form-group">
                                                    <label for="jeniskendaraan">jenis kendaraan</label>
                                                    <select name="jeniskendaraan" id="jeniskendaraan" class="form-control @error('jeniskendaraan') is-invalid @enderror">
                                                    <option selected >{{$item ->jeniskendaraan}}</option> 
                                                    <option value="angkutan orang">Angkutan Orang</option>
                                                    <option value="angkutan barang">Angkutan Barang</option>
                                                    </select>
                                                   
                                                    <div class="form-group">
                                                    <label for="mobil">Mobil</label>
                                                    <input type="text" name="mobil" class="form-control" id="mobil" value="{{ $item->mobil }}" required>   
                                                </div>
                                                <div class="form-group">
                                                    <label for="bahanbakar">Bahan Bakar</label>
                                                    <select name="bahanbakar" id="bahanbakar" class="form-control @error('bahanbakar') is-invalid @enderror">
                                                    <option selected >{{$item ->bahanbakar}}</option> 
                                                    <option value="pertalite">Pertalite</option>
                                                    <option value="pertamax">Pertamax</option>
                                                    <option value="pertamaxturbo">Pertamax Turbo</option>
                                                   
                                                    </select>
                                                </div>
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
                    <form action="{{ route('driver.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>   
                        </div>
                        
                        <div class="form-group">
                        <label for="jeniskendaraan">jenis kendaraan</label>
                        <select name="jeniskendaraan" id="jeniskendaraan" class="form-control @error('jeniskendaraan') is-invalid @enderror">
                        <option value="">-Pilih-</option>
                        <option value="angkutan orang">Angkutan Orang</option>
                        <option value="angkutan barang">Angkutan Barang</option>
                        </select>
                        </div>
                          <div class="form-group">
                          <label for="mobil">Mobil</label>
                          <input type="text" name="mobil" class="form-control" id="mobil" required>   
                            </div>
                            <div class="form-group">
                            <label for="bahanbakar">Bahan Bakar</label>
                            <select name="bahanbakar" id="bahanbakar" class="form-control @error('bahanbakar') is-invalid @enderror">
                            <option value="">-Pilih-</option>
                            <option value="pertalite">Pertalite</option>
                            <option value="pertamax">Pertamax</option>
                            <option value="pertamaxturbo">Pertamax Turbo</option>
                                                   
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    @endsection