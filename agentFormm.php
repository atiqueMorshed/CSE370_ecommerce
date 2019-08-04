<div class="container-fluid h-100">
  <div class="row justify-content-center align-items-center h-100">
      <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-4">
        <div>
          <?php
            if (isset($result)) echo $result;
          ?>
          <?php
            if (!empty($form_errors)) echo show_errors($form_errors);
          ?>
        </div>
        <div class="clearfix"></div>
        <?php if(isset($_SESSION['username'])): ?>
        <form method="post" action="">
          <h2 style="color:#30CAA0">Sell your property.</h2>
          <br>
          <div class="form-group">
              <input type="address" class="form-control form-control-lg" placeholder="Street Adress" name="street">
          </div>
          <br>

          <div class="form-row">
            <div class="form-group col-md-6">
              <!-- <input type="address" class="form-control form-control-lg" id="city" placeholder="City" name="city"> -->
              <select name="city" id="city" class="form-control form-control-lg">
               <option value="">Select City</option>
              </select>
              <br />

            </div>
            <div class="form-group col-md-6">
              <!-- <input type="area" class="form-control form-control-lg" id="area" placeholder="Area" name="area"> -->
              <select name="area" id="area" class="form-control form-control-lg">
               <option value="">Select Area</option>
              </select>
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="number" class="form-control form-control-lg" id="size" placeholder="Size(in acres)" name="size">
            </div>
            <div class="form-group col-md-6">
              <input type="number" class="form-control form-control-lg" id="bedroom" placeholder="Bedroom(s)" name="bedroom">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="number" class="form-control form-control-lg" id="washroom" placeholder="Washroom(s)" name="washroom">
            </div>
            <div class="form-group col-md-6">
              <input type="number" class="form-control form-control-lg" id="balcony" placeholder="Balcony(s)" name="balcony">
            </div>
          </div>
          <br>
          <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description" placeholder="Description"></textarea>
          </div>
          <br>
          <div class="form-group">
              <button class="btn-lg btn-block site-btn" type="submit" name="submit" value="Register">Submit</button>
          </div>
          </form>
