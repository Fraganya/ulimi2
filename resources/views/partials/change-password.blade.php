<div class="modal fade" id="change-password-window" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('users/change-password')}}" method="POST" id="change-password-form">
                    @csrf
                    <input type="hidden" name="web_access" value="true">
                    <div class="form-group {{($errors->has('password')) ? 'has-error' : ''}}">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                        @if($errors->has('password'))
                            <span class="help-block">
                                {{$errors->first('password')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('password_confirmation')) ? 'has-error' : ''}}">
                        <label for="">Confirm Passowrd</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password confirmation">
                        @if($errors->has('password_confirmation'))
                            <span class="help-block">
                                {{$errors->first('password_confirmation')}}
                            </span>
                        @endif
                    </div>
                </form>
            </div><!-- ./modal body-->
            <div class="modal-footer">
                <div class="pull-left">
                    <button onclick="document.getElementById('change-password-form').submit()" class="btn btn-primary">Update</button>
                </div>

            </div>
        </div>
    </div>
</div><!-- new user -win-->