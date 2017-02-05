<!-- Add User Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Dodaj korisnika</h4>
          </div>
          <div class="modal-body">
           
            {!! Form::open( ['action' =>'UsersController@store', 'method' => 'post'] )  !!}
             {!!  Form::token(); !!}

                <div class="row">

                <div class="form-group col-sm-6">
                  <label for="first_name">Ime:</label>
                  <input type="text" class="form-control" id="first_name" name="first_name">
                </div>
                <div class="form-group col-sm-6">
                  <label for="last_name">Prezime:</label>
                  <input type="text" class="form-control" id="last_name" name="last_name">
                </div>
            </div>

              <div class="row">

                <div class="form-group col-sm-6">
                  <label for="first_name">Korisničko ime:</label>
                  <input type="text" class="form-control" id="first_name" name="name">
                </div>
                <div class="form-group col-sm-6">
                  <label for="last_name">Lozika:</label>
                  <input type="password" class="form-control" id="last_name" name="password">
                </div>
            </div>

            <div class="row">
               <div class="form-group col-sm-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="mobile" name="email">
                </div>
                <div class="form-group col-sm-6">
                  <label for="mobile">Mobitel</label>
                  <input type="text" class="form-control" id="mobile" name="mobile">
                </div>
           </div>  
           <div class="row">
                  <div class="form-group col-sm-6">
                  <label for="email">Status</label>
                    <select name="active" class="form-control">
                              <option  selected disabled>Odredi status:</option>
                                  <option value=1>Aktivan korisnik</option>
                                  <option value=0>Nektivan korisnik</option>
                    </select>
                </div>
                    <div class="form-group col-sm-6">
                    <label for="role">Korisnička rola</label>

                    <select name="role" class="form-control">
                              <option  selected disabled>Odabir prava:</option>
                                @foreach($roles as $role)
                                  <option value="{{ $role->id }}" > {{ $role->name }}</option>
                               @endforeach
                    </select>
                </div>
           </div>
              
              <button type="submit" class="btn btn-primary">Spremi</button>
             {!! Form::close()  !!}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Odustani</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->


<!-- Add User Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Izmjena korisnika</h4>
          </div>
          <div class="modal-body">
           
            {!! Form::open() !!}
             {!!  Form::token(); !!}
             <input type="hidden" id="id">

                <div class="row">

                <div class="form-group col-sm-6">
                  <label for="first_name">Ime:</label>
                  <input type="text" class="form-control" id="edit-first_name" name="first_name">
                </div>
                <div class="form-group col-sm-6">
                  <label for="last_name">Prezime:</label>
                  <input type="text" class="form-control" id="edit-last_name" name="last_name">
                </div>
            </div>

              <div class="row">

                <div class="form-group col-sm-6">
                  <label for="first_name">Korisničko ime:</label>
                  <input type="text" class="form-control" id="edit-name" name="name">
                </div>
                <div class="form-group col-sm-6">
                  <label for="last_name">Lozika:</label>
                  <input type="password" class="form-control" id="edit-password" name="password">
                </div>
            </div>

            <div class="row">
               <div class="form-group col-sm-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="edit-email" name="email">
                </div>
                <div class="form-group col-sm-6">
                  <label for="mobile">Mobitel</label>
                  <input type="text" class="form-control" id="edit-mobile" name="mobile">
                </div>
           </div>  
           <div class="row">
                  <div class="form-group col-sm-6">
                  <label for="email">Status</label>
                    <select name="edit-active" class="form-control">
                              <option  selected disabled>Odredi status:</option>
                                  <option value=1>Aktivan korisnik</option>
                                  <option value=0>Nektivan korisnik</option>
                    </select>
                </div>
                    <div class="form-group col-sm-6">
                    <label for="role">Korisnička rola</label>

                    <select name="edit-role" class="form-control">
                              <option  selected disabled>Odabir prava:</option>
                                @foreach($roles as $role)
                                  <option value="{{ $role->id }}" > {{ $role->name }}</option>
                               @endforeach
                    </select>
                </div>
           </div>
              
              <button type="submit"  id="updateUser" class="btn btn-primary">Spremi</button>
             {!! Form::close()  !!}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Odustani</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->