
@extends('admin/layouts.adminMaster')

@section('content')

    <div class="container-fluid">
    @include('admin/includes.adminSidebar')

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <form enctype="multipart/form-data" method="POST"
                    action="{{route('edit',[$news->id])}}">{{ csrf_field() }}

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
                            <textarea  name="textarea">{{$news->textarea}}</textarea>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <button class="btn btn-primary " name="submit" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
            </div>


        </main>

</div>

    @endsection('content')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=cj3pbv1qaurvgj16g8omheozohrxpv8yemit6uehwf7sxtlm	"></script>    <script>tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | image",
 });

 </script>
