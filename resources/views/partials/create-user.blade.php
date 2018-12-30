<div class="modal fade" id="create-user-window">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New User</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('register')}}" method="POST" id="register-form">
                    @csrf
                    <input type="hidden" name="web_access" value="true">
                    <div class="form-group {{($errors->has('username')) ? 'has-error' : ''}}">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="username" value="{{old('username')}}">
                        @if($errors->has('username'))
                            <span class="help-block">
                                {{$errors->first('username')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('firstname')) ? 'has-error' : ''}}">
                        <label for="">Firstname</label>
                        <input type="text" name="firstname" class="form-control" placeholder="firstname" value="{{old('firstname')}}">
                        @if($errors->has('firstname'))
                            <span class="help-block">
                                {{$errors->first('firstname')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('surname')) ? 'has-error' : ''}}">
                        <label for="">Surname</label>
                        <input type="text" name="surname" class="form-control" placeholder="surname" value="{{old('surname')}}">
                        @if($errors->has('surname'))
                            <span class="help-block">
                                {{$errors->first('surname')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('password')) ? 'has-error' : ''}}">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password" value="{{old('password')}}">
                        @if($errors->has('password'))
                            <span class="help-block">
                                {{$errors->first('password')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('number')) ? 'has-error' : ''}}">
                        <label for="">Phone #</label>
                        <input type="text" name="number" class="form-control" placeholder="Phone #" value="{{old('number')}}">
                        @if($errors->has('number'))
                            <span class="help-block">
                                {{$errors->first('number')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('type')) ? 'has-error' : ''}}">
                        <label for="">Type</label>
                        <select name="type"  class="form-control">
                            <option value="Administrator">Administrator</option>
                            <option value="standard">Standard</option>
                        </select>
                        @if($errors->has('type'))
                            <span class="help-block">
                                {{$errors->first('type')}}
                            </span>
                        @endif
                    </div><div class="form-group {{($errors->has('specialization')) ? 'has-error' : ''}}">
                        <label for="">Specialization</label>
                        <select name="specialization"  class="form-control">
                            <option value="farming">Farming</option>
                            <option value="animals">Animals</option>
                        </select>
                        @if($errors->has('specialization'))
                            <span class="help-block">
                                {{$errors->first('specialization')}}
                            </span>
                        @endif
                    </div>
                </form>
            </div><!-- ./modal body-->
            <div class="modal-footer">
                <div class="pull-left">
                    <button onclick="document.getElementById('register-form').submit()" class="btn btn-primary">Save User</button>
                </div>

            </div>
        </div>
    </div>
</div><!-- new user -win-->