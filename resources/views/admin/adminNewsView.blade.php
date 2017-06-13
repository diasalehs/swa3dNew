
@extends('admin/layouts.adminMaster')

@section('content')

    <div class="container-fluid">
    @include('admin/includes.adminSidebar')

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
           
            <h1>All News</h1>
            <div class="row">
             @foreach($news_record as $news)
                <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <div class="card-block">
                            <h5 class="card-title">{{$news->title}}</h5>
                        </div>

                        <div class="card-block">
                            <a href="{{route('edit',[$news->id])}}" class="card-link">Edit</a>
                            <a href="news/delete/{{$news->id}}" class="card-link text-danger">Delete</a>
                        </div>
                        </div>
                </div>
            @endforeach




            </div>


        </main>

</div>







    @endsection('content')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=cj3pbv1qaurvgj16g8omheozohrxpv8yemit6uehwf7sxtlm	"></script>    <script>tinymce.init({
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
