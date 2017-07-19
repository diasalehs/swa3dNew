
@extends('institute.layouts.profileMaster')

@section('content')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=geyq9mxvow5g65ekcrsmz3d2bonek78nqnu0ynr9asiwk3kb		"></script>    <script>tinymce.init({
  selector: '#body',
  height: 200,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste autoresize imagetools textcolor colorpicker emoticons"
    ],
    toolbar: "forecolor backcolor | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | image | emoticons",
 });

 </script>
<div class="container-fluid" style="margin:120px auto">
    <div class="row">

    @include('institute.includes.sidebar')
    <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">

      <a class="btn btn-green" href="{{route('institueNews')}}" role="button">View/Edit All News</a>
      <hr />
            <div class="row">
                <div class="col-lg-12">
                    <form enctype="multipart/form-data" method="POST" action="{{route('createNews')}}">{{ csrf_field() }}

                        <div class="form-group"> <!-- title field -->
                            <label class="control-label " for="title">Title</label>
                            <input class="form-control" id="title" name="title" type="text"/>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputFile">Cover Photo</label>
                            <input type="file" class="form-control-file" name="mainImg" aria-describedby="fileHelp">
                        </div>
                        <div class="form-group"> <!-- Message field -->
                            <label class="control-label " for="body">Body</label>
                            <textarea name="textarea" id="body"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="Introduction">Introduction</label>
                          <textarea class="form-control" maxlength="100" rows="3" id="Introduction"></textarea>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <button class="btn btn-green text-center" name="submit" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>


        </div>

</div>

@endsection('content')
