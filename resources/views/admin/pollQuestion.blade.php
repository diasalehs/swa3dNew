
@extends('admin/layouts.adminMaster')

@section('content')

    <div class="container-fluid">
    @include('admin/includes.adminSidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <form  method="POST" action="{{route('pollQuestionPost')}}">{{ csrf_field() }}

                <div class="form-group col-sm-6 col-md-2 {{ $errors->has('question') ? ' has-error' : '' }}">
                    <label for="name" class="form-control-label">Question</label>
                        <input id="targeted_segments" type="text" class="form-control" name="question" value="{{ old('question') }}"
                        required="required" autofocus="autofocus" />
                </div>

                <button type="button" class="btn btn-green btn-block" data-toggle="modal" data-target="#Qualifications">
                Add Answers
              </button>

    <div class="modal modal-wide fade" id="Qualifications"style="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Answers</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="input_fields_wrap">
              <button class="add_field_button btn btn-green">Add Answers</button>

              <div class="row">

                <div class="form-group col-sm-6 col-md-2 {{ $errors->has('answers') ? ' has-error' : '' }}">
                    <label for="name" class="form-control-label">Answer</label>
                        <input id="answers" type="text" class="form-control" name="answers[]" 
                        required="required" autofocus="autofocus" />
                </div>
                  <a href="#" class="remove_field col-sm-1 col-md-1"><i class="fa fa-times" aria-hidden="true"></i></a>

              </div>


            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
                <button class="btn btn-primary " name="submit" type="submit">Publish</button>
            </div>


                    </form>
                </div>
            </div>

        </main>
</div>

    @endsection('content')



