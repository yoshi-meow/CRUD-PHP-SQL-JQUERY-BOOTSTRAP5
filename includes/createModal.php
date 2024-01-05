<div class="modal fade" id="createModal" aria-hidden="true" aria-labelledby="createModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalToggleLabel">Add Employee Detail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="crud.php" method="POST" id="create_form" role="form">
        <div class="modal-body">
          <!-- First Row -->
          <div class="row">
            <div class="col-md-10">
              <div class="mb-3">
                <label for="fullname" class="form-label">Fullname <span class="asterisk"> *</span></label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Fullname" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="mb-3">
                <div class="form-check mt-4 pt-2">
                  <input class="form-check-input" type="checkbox" id="isactive" name="isactive" value="isactive">
                  <label class="form-check-label" for="isactive">Active</label>
                </div>
              </div>
            </div>
          </div>
          <!-- Second Row -->
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="address" class="form-label">Address <span class="asterisk"> *</span></label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
              </div>
            </div>
          </div>
          <!-- Third Row -->
          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="age" class="form-label">Age <span class="asterisk"> *</span></label>
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" oninput="limitDigits(this, 2)" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="birthdate" class="form-label">Birthday <span class="asterisk"> <span class="asterisk"> *</span></span></label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
              </div>
            </div>
            <div class="col-md-5">
              <div class="mb-3">
                <label class="form-label d-flex">Gender <span class="asterisk ms-1"> *</span></label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
                  <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="other" value="Other" required>
                  <label class="form-check-label" for="other">Other</label>
                </div>
              </div>
            </div>
          </div>
          <!-- Fourth Row -->
          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label for="civilstat" class="form-label">Civil Status <span class="asterisk"> *</span></label>
                <div class="input-group">
                  <select class="form-select" id="civilstat" name="civilstat" required>
                    <option value="Select status" selected disabled hidden>Select status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="contactnum" class="form-label">Contact Number <span class="asterisk"> *</span></label>
                <input type="number" class="form-control" id="contactnum" name="contactnum" placeholder="09xx-xxx-xxx" oninput="limitDigits(this, 11)" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="salary" class="form-label">Salary <span class="asterisk"> *</span></label>
                <input type="number" class="form-control" id="salary" name="salary" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary create_data" type="submit" name="create_data" id="submitBtn" onclick="validateBirthdate()" >Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

