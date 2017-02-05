@extends('adminlte::page')

@section('title', 'Popis Korisnika')

@section('content_header')
    <h1>Popis Korisnika</h1>
    <div class="row">
 
    </div>
@stop

@section('content')

    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Foliot Korisnici</h3>
              <div class="pull-right"> 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-user-plus"></i> Novi korisnik</button>
              </div>
        
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Ime</th>
                  <th>Prezime</th>
                  <th>Korisničko ime</th>
                  <th>Email</th>
                  <th>Mobitel</th>
                  <th>Status</th>
                  <th>Korisnička rola</th>
                  <th>Akcija</th>
                </tr>
                
                 @foreach($users as $user)
                 <tr>
                 <td>{{ $user->first_name}}</td>
                 <td>{{ $user->last_name}}</td>
                 <td>{{ $user->name}}</td>
                 <td>{{ $user->email}}</td>
                 <td>{{ $user->mobile}}</td>
                 <td>{!! $user->active ? '<span  class="label label-success">Aktivan Korisnik</span>' :  '<span  class="label label-danger">Nektivan korisnik</span>' !!} </td>
                 <td>{{ $user->roles->first()->name }}</td>
                 <td><button type="button" class="btn btn-xs btn-warning" onclick="editUser('{{$user->id}}')" data-toggle="modal"  data-target="#editModal">
                  <i class="fa fa-edit"></i> Uredi</button> 
                 <button type="button" class="btn btn-xs btn-danger">
                 <i class="fa fa-trash"></i> Izbriši</button>
                 </td>
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

    <!--  Modals -->
   
    @include('modals.user-modal')


 
    


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

var editUser = function(id) {
var route = "{{ url('admin/users') }}/" +id+"/edit";
$.get(route, function(data){

  console.log(data);
     $('#id').val(data.id);
     $('#edit-first_name').val(data.first_name);
     $('#edit-last_name').val(data.last_name);
     $('#edit-name').val(data.name);
     $('#edit-password').val(data.password);
     $('#edit-email').val(data.email);
     $('#edit-mobile').val(data.mobile);
     $('#edit-active').val(data.active);
     $('#edit-role').val(data.role);
    
});

$("#updateUser").click(function()
{
  var id = $("#id").val();
  var first_name = $("#edit-first_name").val();
  var last_name = $("#edit-last_name").val();
  var password = $("#edit-password").val();
  var email = $("#edit-email").val();
  var mobile = $("#edit-mobile").val();
  var active = $("#edit-active").val();
  var role = $("#edit-role").val();


  var route = "{{url('admin/users')}}/"+id+"";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType: 'json',
    data: {
      first_name: first_name,
      last_name: last_name,
      name: name,
      password: password,
      email: email,
      mobile: mobile,
      active: active,
      role: role,
    },
    success: function(data){
     
     if (data.success == 'true')
     {
        listmark();
        $("#myModal").modal('toggle');
        $("#message-update").fadeIn();
       }
    },
    error:function(data)
    {
        $("#error").html(data.responseJSON.name);
        $("#message-error").fadeIn();
        if (data.status == 422) {
           console.clear();
        }
    }  
  });
});

}
    </script>
@stop