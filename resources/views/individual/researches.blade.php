
@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
         @if($success==1)
           <div class="alert alert-success alert-dismissible fade show" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           <strong>done!</strong> Your research has been submited successfully.
           </div>
         @endif
         <form method="post"   enctype="multipart/form-data" action="{{route('addResearch')}}">{{ csrf_field() }}
           <label>Title</label>
           <input type="text" name="title"><br>
           <label>Abstract</label>
           <textarea class="form-control" name="abstract" id="exampleTextarea" rows="3"></textarea>
           <label>Recommendation</label>
           <input type="text" name="recommendations"><br>
           <label>Date</label>
           <input id="name" type="date"  name="creation_date" min = "<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>" /><br>
           <label>Research findings</label>
           <input type="text" name="findings"> <br>
           <label>Tools</label><br>
            <div class="form-check">
           <label class="form-check-label">
           <input type="checkbox"  name ="tool1" value="tool1" class="form-check-input">
           tool1
           </label>
           <label class="form-check-label">
           <input type="checkbox" value="tool2" name="tool2" class="form-check-input">
           tool2
           </label>
           </div>
           <label>tags</label>
           <div class="form-check">
           <label class="form-check-label">
           <input type="checkbox"  name="tag1" class="form-check-input">
           tag1
           </label>
           <label class="form-check-label">
           <input type="checkbox"  name="tag2"class="form-check-input">
           tag2
           </label>
           </div>
           <div class="form-check">
           <label class="form-check-label">
           <input type="checkbox" name="credit" value="1" class="form-check-input">
           credit
           </label>
          </div>

           <input type="file"  accept=".xls,.xlsx,.pdf,.docx" name="filefield">
          <button type="submit"  class="btn btn-primary">Submit</button>
         </form>


         </div>
    </div>
</div>

@endsection
