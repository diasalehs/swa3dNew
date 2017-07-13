@extends('institute/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')
      

          <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <a role="button" class="btn btn-warning " href="{{route('adminNewsView')}}">View/Edit All News</a>
          <hr />
            <div class="row">
                <div class="col-lg-12">
                    <form enctype="multipart/form-data" method="POST" action="{{route('news')}}">{{ csrf_field() }}

                        <div class="form-group"> <!-- title field -->
                            <label class="control-label " for="title">Title</label>
                            <input class="form-control" id="title" name="title" type="text"/>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" class="form-control-file" name="mainImg" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>
                        <div class="form-group"> <!-- Message field -->
                            <label class="control-label " for="body">Body</label>
                            <textarea name="textarea" id="body"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="Introduction">Introduction</label>
                          <textarea class="form-control" maxlength="100" rows="5" id="Introduction"></textarea>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <button class="btn btn-primary " name="submit" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
</div>



@endsection
