<div class="modal fade" id="create-feed-window" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Feed</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('create-feed')}}" method="POST" id="feed-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="web_access" value="true">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group {{($errors->has('title')) ? 'has-error' : ''}}">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="name"  value="{{old('title')}}">
                        @if($errors->has('title'))
                            <span class="help-block">
                                {{$errors->first('title')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('language')) ? 'has-error' : ''}}">
                        <label for="">Language</label>
                        <input type="text" name="language" class="form-control" placeholder="Seed category target language"  value="{{old('title')}}">
                        @if($errors->has('language'))
                            <span class="help-block">
                                {{$errors->first('language')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('feed_category_id')) ? 'has-error' : ''}}">
                        <label for="">Category</label>
                        <select name="feed_category_id"  class="form-control">
                            @foreach($feed_categories as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('feed_category_id'))
                            <span class="help-block">
                                {{$errors->first('feed_category_id')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('content')) ? 'has-error' : ''}}">
                        <label for="">Content</label>
                        <textarea name="content" id="content"  rows="5" class="form-control">{{old('content')}}</textarea>
                        @if($errors->has('content'))
                            <span class="help-block">
                                {{$errors->first('content')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{($errors->has('sample_picture')) ? 'has-error' : ''}}">
                        <label for="">Sample Image</label>
                        <input type="file" name="sample_picture" class="form-control">
                        @if($errors->has('sample_picture'))
                            <span class="help-block">
                                {{$errors->first('sample_picture')}}
                            </span>
                        @endif
                    </div>
                </form>
            </div><!-- ./modal body-->
            <div class="modal-footer">
                <div class="pull-left">
                    <button onclick="document.getElementById('feed-form').submit()" class="btn btn-primary">Save Feed</button>
                </div>

            </div>
        </div>
    </div>
</div><!-- new user -win-->