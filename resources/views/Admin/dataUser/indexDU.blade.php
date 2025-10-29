@extends('template.base') 
@include('template.navbar')
@section('risha')

<div class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Data User</h1>
          </div><!-- /.col -->  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 

   <section class="content">
    <div class="container-fluid">
         <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah Data User</a>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append"> 
                      <button type="submit" class="btn btn-default"> 
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                {{-- Alert Create --}}
                 @if(Session::get('success'))
                 <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{Session::get('success')}}
                </div>
                @endif
                
                {{-- Alert Delete --}}
                 @if(Session::get('delete'))
                 <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{Session::get('delete')}}
                </div>
                @endif
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Lengkap</th>
                      <th>Nomor Telepon</th>
                      <th>Email</th>
                      <th>Image</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead> 
                <tbody>
                  @foreach ($user as $row)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->email}}</td>
                        <td>
                          <img src="{{asset('storage/public/usersImages/' . $row->image)}}" alt=""
                           width="50" height="50" style="object-fit: cover;">
                        </td>
                        <td>
                            <a href="" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                            <a href="" class="btn btn-outline-secondary"><i class="fa-solid fa-pencil"></i></a>
                            <a href="" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
                </table>
              </div> 
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
        
   </section>
   {{-- Modal Create --}}
     <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{route('user.create')}}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
    <label class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" name="name" placeholder="Masukkan nama lengkap" required>
</div>

<div class="form-group">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Masukkan email" required>
</div>

<div class="form-group">
    <label class="form-label">Nomor Telepon</label>
    <input type="number" class="form-control" name="phone" placeholder="Masukkan nomor telepon" required>
</div>

<div class="form-group">
    <label class="form-label">NIK</label>
    <input type="number" class="form-control" name="nik" placeholder="Masukkan NIK" required>
</div>

<div class="form-group">
    <label class="form-label">Foto Profil</label>
    <input type="file" class="form-control" name="image">
</div>

<div class="form-group">
    <label class="form-label">Alamat</label>
    <input type="text" class="form-control" name="address" placeholder="Masukkan alamat">
</div>

<div class="form-group">
    <label class="form-label d-block">Gender</label>
    <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" value="male" required>
        <label class="form-check-label">Pria</label>
    </div>
    <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" value="female">
        <label class="form-check-label">Wanita</label>
    </div>
</div>

<div class="form-group">
    <label class="form-label">Role</label>
    <select name="role" class="form-control" required>
        <option value="">Pilih Role</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
</div>

<div class="form-group">
    <label class="form-label">Password</label>
    <input type="text" class="form-control" name="password" placeholder="Masukkan password" required>
</div>

               
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div> 
    
@endsection