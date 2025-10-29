@extends('template.base') 
@include('template.navbar')
@section('risha')

<div class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Data Kategori</h1>
          </div><!-- /.col -->  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Data Kategori</li>
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
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah Data Kategori</a>

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
                      <th>Category</th>
                      <th>Slug</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead> 
                <tbody>
                   @foreach ($category as $row)
                       <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$row->category}}</td>
                        <td>{{$row->slug}}</td> 
                        <td><a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit{{$row->id}}"><i class="fa-solid fa-pencil"></i></a>
                          @include('Admin.category.modalUpdate')
                          <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$row->id}}"><i class="fa-solid fa-trash"></i></a></td>
                           @include('Admin.category.modalDelete')
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
              <h4 class="modal-title">Tambah Data Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{route('create.category')}}"  method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="category" class="form-control" placeholder="Masukkan Data Kategori">
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