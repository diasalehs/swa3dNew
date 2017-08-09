@extends('institute.layouts.profileMaster')

@section('content')

<div class="container-fluid" style="margin:120px auto">
    <div class="row">

    @include('institute.includes.sidebar')
    <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">

            <div class="row">
                <div class="col-lg-12">
                    <form enctype="multipart/form-data" method="POST"
                    action="{{route('editMyNews',[$news->id])}}">{{ csrf_field() }}

                        <div class="form-group"> <!-- title field -->
                            <label class="control-label " for="title">Title</label>
                            <input class="form-control" id="title" name="title" type="text" value="{{$news->title}}" />
                        </div>
                         <div class="form-group">
                         <img src="{{$news->mainImgpath}}" style="height:200px; width:400px">
                         <br>
                            <label for="exampleInputFile">choose another image</label>
                            <input type="file"  class="form-control-file" name="mainImg" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">if you don't select other img, the old img will not be change.</small>
                        </div>
                        <div class="form-group"> <!-- Message field -->
                            <label class="control-label " for="message">Body</label>
                            <textarea  id="body"name="textarea">{{$news->textarea}}</textarea>
                        </div>
                    
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group  col-sm-12 col-md-4 offset-md-4">
                            <button class="btn btn-green btn-block " name="submit" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
            </div>


        </main>

      </div>
    </div>

    @endsection('content')
    @section('scripts')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=cj3pbv1qaurvgj16g8omheozohrxpv8yemit6uehwf7sxtlm	"></script>    <script>tinymce.init({
  selector: '#body',
  height: 200,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | image",
 });

 </script>
@endsection
