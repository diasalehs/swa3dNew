
@extends('admin/layouts.adminMaster')

@section('content')

    <div class="container-fluid">
    @include('admin/includes.adminSidebar')

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{route('news')}}">{{ csrf_field() }}

                        <div class="form-group"> <!-- title field -->
                            <label class="control-label " for="title">Title</label>
                            <input class="form-control" id="title" name="title" type="text"/>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" class="form-control-file" name="mainImg"  id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>
                        <div class="form-group"> <!-- Message field -->
                            <label class="control-label " for="message">Body</label>
                            <textarea name="textarea"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary " name="submit" type="submit">Submit</button>
                        </div>
                        
                    </form>		
                </div>
            </div>
            <h1>All News</h1>
            <div class="row">
             @foreach($news_record as $news)
                <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <div class="card-block">
                            <h5 class="card-title">{{$news->title}}</h5>
                        </div>
                     
                        <div class="card-block">
                            <a href="#" class="card-link">Edit</a>
                            <a href="admin/news/delete/{{$news->id}}" class="card-link text-danger">Delete</a>
                        </div>
                        </div>
                </div>
            @endforeach
             
         


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