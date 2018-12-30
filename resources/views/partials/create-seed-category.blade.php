<div class="modal fade" id="create-seed-cat-window" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Seed Category</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('create-seed-cat')}}" method="POST" id="seed-cat-form">
                    @csrf
                    <input type="hidden" name="web_access" value="true">
                    <div class="form-group {{($errors->has('language')) ? 'has-error' : ''}}">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="name" value="{{old('name')}}">
                        @if($errors->has('name'))
                            <span class="help-block">
                                {{$errors->first('name')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('language')) ? 'has-error' : ''}}">
                        <label for="">Language</label>
                        <input type="text" name="language" class="form-control" placeholder="Seed category target language" value="{{old('language')}}">
                        @if($errors->has('language'))
                            <span class="help-block">
                                {{$errors->first('language')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('description')) ? 'has-error' : ''}}">
                        <label for="">Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Category short Description" value="{{old('description')}}">
                        @if($errors->has('description'))
                            <span class="help-block">
                                {{$errors->first('description')}}
                            </span>
                        @endif
                    </div>
                </form>
            </div><!-- ./modal body-->
            <div class="modal-footer">
                <div class="pull-left">
                    <button onclick="document.getElementById('seed-cat-form').submit()" class="btn btn-primary">Save Category</button>
                </div>

            </div>
        </div>
    </div>
</div><!-- new user -win-->