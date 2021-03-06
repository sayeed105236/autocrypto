<div class="col">
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="settingsaddModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Settings</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card-body">

          <form id="jquery-val-form" action="{{route('store-system-settings')}}" method="post">
            @csrf
              <div class="col-md-12">
                  <div class="form-group">
                <label for="inputFirstName" class="form-label">Minimum Deposit ($)</label>
                <input type="text" name="min_deposit" class="form-control" required>
              </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">


                <label for="inputLastName" class="form-label">Minimum Transfer ($)</label>
                <input type="text" name="min_transfer" class="form-control" required>
              </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputFirstName" class="form-label">Minimum Withdraw ($)</label>
                <input type="text" name="min_withdraw" class="form-control" required>
              </div>
            </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputLastName" class="form-label">Sponsor Bonus (%)</label>
                <input type="text" name="sponsor_bonus" class="form-control" required>
              </div>
            </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputFirstName" class="form-label">Pair Bonus ($)</label>
                <input type="text" name="pair_bonus" class="form-control" required>
              </div>
            </div>


              <div class="col-md-12">
                <div class="form-group">
                <label for="inputLastName" class="form-label">Withdraw Charge (%)</label>
                <input type="text" name="withdraw_charge" class="form-control" required>
              </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputLastName" class="form-label">Level 1 Bonus (%)</label>
                <input type="round" name="level_1" class="form-control" required>
              </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputLastName" class="form-label">Level 2 Bonus (%)</label>
                <input type="round" name="level_2" class="form-control" required>
              </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputLastName" class="form-label">Level 3 Bonus (%)</label>
                <input type="round" name="level_3" class="form-control" required>
              </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputLastName" class="form-label">Level 4 Bonus (%)</label>
                <input type="round" name="level_4" class="form-control" required>
              </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="inputLastName" class="form-label">Level 5 Bonus (%)</label>
                <input type="round" name="level_5" class="form-control" required>
              </div>
              </div>

              <br>


      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="Submit" class="btn btn-primary">Save</button>
    </div>
      </form>
  </div>
</div>
</div>
