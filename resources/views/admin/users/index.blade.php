@extends('adminlte::page')

@section('title', 'Popis Korisnika')

@section('content_header')
    <h1>Popis Korisnika</h1>
@stop

@section('content')

    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Foliot Korisnici</h3>
      
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Korisničko ime</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Korisnička rola</th>
                  <th>Akcija</th>
                </tr>
                
                 @foreach($users as $user)
                 <tr>
                 <td>{{ $user->id}}</td>
                 <td>{{ $user->name}}</td>
                 <td>{{ $user->email}}</td>
                 <td>{!! $user->active ? '<span  class="label label-success">Aktivan Korisnik</span>' :  '<span  class="label label-danger">Nektivan korisnik</span>' !!} </td>
                 <td>{{ $user->roles->first()->name }}</td>
                 <td><button type="button" class="btn btn-xs btn-warning"> <i class="fa fa-edit"></i> Uredi</button> <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Izbriši</button></td>
                 </tr>
                 @endforeach
                
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop