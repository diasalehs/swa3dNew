


<div class="row justify-content-center">

    <div class="col-sm-12 col-md-4">

          <label for="Select2">Select the Events</label>
          <select name="invitedEvent[]" class="form-control selectpicker" id="Select2" data-actions-box="true"multiple>
            @foreach($userUevents as $userUevent)
            <option value="{{$userUevent->id}}">{{$value = str_limit($userUevent->title, 20,$end = '...')}}</option>
            @endforeach
          </select>
    </div>

</div>
