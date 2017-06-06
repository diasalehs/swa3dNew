
@extends('admin/layouts.adminMaster')

@section('content')

    <div class="container-fluid">
    @include('admin/includes.adminSidebar')

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <form>

                        <div class="form-group"> <!-- title field -->
                            <label class="control-label " for="title">Title</label>
                            <input class="form-control" id="title" name="title" type="text"/>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>
                        <div class="form-group"> <!-- Message field -->
                            <label class="control-label " for="message">Body</label>
                            <textarea></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary " name="submit" type="submit">Submit</button>
                        </div>
                        
                    </form>		
                </div>
            </div>
            <h1>All News</h1>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <div class="card-block">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     
                        <div class="card-block">
                            <a href="#" class="card-link">Edit</a>
                            <a href="#" class="card-link text-danger">Delete</a>
                        </div>
                        </div>
                </div>
                  <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <div class="card-block">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     
                        <div class="card-block">
                            <a href="#" class="card-link">Edit</a>
                            <a href="#" class="card-link text-danger">Delete</a>
                        </div>
                        </div>
                </div>
                  <div class="col-lg-4">
                    <div class="card" style="width: 20rem;">
                        <div class="card-block">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     
                        <div class="card-block">
                            <a href="#" class="card-link">Edit</a>
                            <a href="#" class="card-link text-danger">Delete</a>
                        </div>
                        </div>
                </div>


            </div>


        </main>

</div>







    @endsection('content')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>