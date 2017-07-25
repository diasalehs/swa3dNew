


<form id="frm-example" action="" method="POST" >{{ csrf_field() }}

<table id="example" class=" table table-striped table-bordered" cellspacing="0"  width="100%">
  <thead>
      <tr>

          <th>Name</th>
          <th>Position</th>
          <th>Office</th>
          <th>Age</th>
          <th>Start date</th>
          <th>Salary</th>
      </tr>
  </thead>

  <tbody>
      <tr>

          <td>Tiger Nixon</td>
          <td>System Architect</td>
          <td>Edinburgh</td>
          <td>61</td>
          <td>2011/04/25</td>
          <td>$320,800</td>
      </tr>
      <tr>

          <td>Garrett Winters</td>
          <td>Accountant</td>
          <td>Tokyo</td>
          <td>63</td>
          <td>2011/07/25</td>
          <td>$170,750</td>
      </tr>
      <tr>

          <td>Ashton Cox</td>
          <td>Junior Technical Author</td>
          <td>San Francisco</td>
          <td>66</td>
          <td>2009/01/12</td>
          <td>$86,000</td>
      </tr>


  </tbody>
</table>
<br />
<div class="row justify-content-center">

<div class="col-sm-12 col-md-4">

<label for="Select2">Events</label>
<select name="intrest[]" class="form-control selectpicker" id="Select2" data-actions-box="true"
    data-live-search="true" multiple>

  <option value="1">Social and Economic Rights</option>
  <option value="2">Legal Aid</option>
  <option value="3">Capacity Building</option>

</select>
</div>
<div class="col-sm-12 col-md-4">
  <label for="" style="opacity:0">Events</label>

  <button  type="submit" class="btn form-control btn-green">Invite</button>
</div>
</div>

</form>
