<div class="col">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="packageeditModal{{$row->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Package</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">

            <form id="jquery-val-form" action="{{route('package-update')}}" method="post">

              @csrf
              <input type="hidden" name="id" value="{{$row->id}}">
                <div class="form-group">
                    <label class="form-label" for="basic-default-name">Package Name</label>
                    <input type="text" class="form-control" value="{{$row->package_name}}" id="basic-default-name" name="package_name" placeholder="Enter Package Name" required/>

                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-name">Package Price</label>
                    <input type="number" class="form-control" value="{{$row->package_price}}" id="basic-default-name" name="package_price" placeholder="Enter Package Price" required/>

                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Return of Investment (%)</label>
                    <input type="round" value="{{$row->percentage}}" id="basic-default-email" name="percentage" class="form-control" placeholder="Enter ROI Percentage" required/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Direct Sponsor Bonus (%)</label>
                    <input type="round" value="{{$row->sponsor_bonus}}" id="basic-default-email" name="sponsor_bonus" class="form-control" placeholder="Enter Sponsor Bonus Percentage" required/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Duration in Days</label>
                    <input type="number" value="{{$row->duration}}" id="basic-default-email" name="duration" class="form-control" placeholder="Enter Duration" required/>
                </div>

                <div class="form-group">
                    <label for="select-country">Status</label>
                    <select class="form-control select2" name="status" required>
                        <option selected>{{$row->status}}</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>

                    </select>
                </div>


        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="Submit" class="btn btn-primary">Save</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
