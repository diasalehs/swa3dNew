
@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
        @include('../individual/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
         @if($success==1)
           <div class="alert alert-success alert-dismissible fade show" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           <strong>Done!</strong> Your research has been submited successfully.
           </div>
         @endif
         <h3 class="greencolor ">Add new research</h3>
         <hr />
         <form method="post"   enctype="multipart/form-data" action="{{route('addResearch')}}">{{ csrf_field() }}
           <div class="form-group">
             <label for="title">Title</label>
             <input type="text" class="form-control"  id="title" name="title" placeholder="Enter title">
           </div>
           <div class="form-group">
             <label for="exampleTextarea">Abstract</label>
             <textarea class="form-control" id="abstract" name="abstract" rows="3"></textarea>
           </div>
           <div class="form-group">
             <label for="recommendations">Recommendation</label>
             <input type="text" class="form-control" name="recommendations" id="recommendations" placeholder="Enter Recommendation">
           </div>
           <div class="form-group">
             <label for="date-input">Date</label>
             <input class="form-control" name="creation_date" type="creation_date" value="<?php echo date("Y-m-d"); ?>" id="date-input">
           </div>
           <div class="form-group">
             <label for="findings">Research findings</label>
             <input type="text" class="form-control" id="findings"name="findings" placeholder="Enter Research findings">
           </div>
           <div class="form-group">
             <label for="">Tools</label>
           </div>
            <div class="form-check">
           <label class="form-check-label">
           <input type="checkbox"  name ="tool1" value="tool1" class="form-check-input">
           tool1
           </label>
          </div>
          <div class="form-check">
           <label class="form-check-label">
           <input type="checkbox" value="tool2" name="tool2" class="form-check-input">
           tool2
           </label>
           </div>
           <div class="form-group">
             <label for="">Tags</label>
           </div>
          <div class="form-group row">
  <div class="col-10">
    <input class="form-control" type="text" name="tags" id="example-text-input">
  </div>
</div>
           <div class="form-group">
              <label for="filefield">File input</label>
              <input type="file" class="form-control-file"id="filefield" accept=".xls,.xlsx,.pdf,.docx" name="filefield">

            </div>
           <br />
           <div class="form-check">
           <label class="form-check-label">
           <input type="checkbox" name="credit" value="1" class="form-check-input">
           credit
           </label>
          </div>
          <div class=" row justify-content-center">
            <div class="col-4">
              <button type="submit"  class="btn btn-green btn-block">Submit</button>

            </div>

          </div>
         </form>


         </div>
    </div>
</div>

@endsection
