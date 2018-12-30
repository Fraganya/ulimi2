<div class="modal fade" id="create-post-window" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Post</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('create-post')}}" method="POST" id="post-form">
                    @csrf
                    <input type="hidden" name="web_access" value="true">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group {{($errors->has('language')) ? 'has-error' : ''}}">
                        <label for="">Language</label>
                        <input type="text" name="language" class="form-control" placeholder="Post target language"  value="{{old('language')}}">
                        @if($errors->has('language'))
                            <span class="help-block">
                                {{$errors->first('language')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('category')) ? 'has-error' : ''}}">
                        <label for="">Tags</label>
                        <input type="text" name="category" class="form-control" placeholder="Post Tags"  value="{{old('category')}}">
                        @if($errors->has('category'))
                            <span class="help-block">
                                {{$errors->first('category')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('content')) ? 'has-error' : ''}}">
                        <label for="">Content</label>
                        <textarea name="content" id="content"  rows="5" class="form-control"> {{old('content')}}</textarea>
                        @if($errors->has('content'))
                            <span class="help-block">
                                {{$errors->first('content')}}
                            </span>
                        @endif
                    </div>

                </form>
            </div><!-- ./modal body-->
            <div class="modal-footer">
                <div class="pull-left">
                    <button onclick="document.getElementById('post-form').submit()" class="btn btn-primary">Save Post</button>
                </div>

            </div>
        </div>
    </div>
</div><!-- new user -win-->