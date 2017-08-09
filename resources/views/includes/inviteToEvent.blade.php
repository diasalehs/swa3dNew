
                  

<div class="row justify-content-center">

<div class="col-sm-12 col-md-4">

              <label for="Select2">Events</label>
<select name="invitedEvent[]" class="form-control selectpicker" id="Select2" data-actions-box="true"
    data-live-search="true" multiple>
                @foreach($userUevents as $userUevent)
                <option value="{{$userUevent->id}}">{{$userUevent->title}}</option>
                @endforeach
              </select>


</div>
<div class="col-sm-12 col-md-4">
  <label for="" style="opacity:0">Events</label>

  <button  type="submit" class="btn form-control btn-green">Invite</button>
</div>
</div>