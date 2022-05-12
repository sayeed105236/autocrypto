<div class="col">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="addpackageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Package</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">

            <form id="jquery-val-form" action="{{route('store-package')}}" method="post">
              @csrf
                <div class="form-group">
                    <label class="form-label" for="basic-default-name">Package Name</label>
                    <input type="text" class="form-control" id="basic-default-name" name="package_name" placeholder="Enter Package Name" required/>

                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-name">Package Price</label>
                    <input type="number" class="form-control" id="basic-default-name" name="package_price" placeholder="Enter Package Price" required/>

                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Return of Investment (%)</label>
                    <input type="round" id="basic-default-email" name="percentage" class="form-control" placeholder="Enter ROI Percentage" required/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Direct Sponsor Bonus (%)</label>
                    <input type="round" id="basic-default-email" name="sponsor_bonus" class="form-control" placeholder="Enter Sponsor Bonus Percentage" required/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-default-email">Duration in Days</label>
                    <input type="number" id="basic-default-email" name="duration" class="form-control" placeholder="Enter Duration" required/>
                </div>

                <div class="form-group">
                    <label for="select-country">Status</label>
                    <select class="form-control select2" name="status" required>
                        <option value="">Select Status</option>
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
