<template>
  <div class="hotel_booking_area position">
    <div class="container">
      <div class="hotel_booking_table">
        <div class="col-md-3">
          <h2>Book<br> Your Room</h2>
        </div>
        <div class="col-md-9">
          <div class="boking_table">
            <div class="row">
              <div class="col-md-4">
                <div class="book_tabel_item">
                  <div class="form-group">
                    <div
                      id="datetimepicker11"
                      class="input-group date"
                    >
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Arrival Date"
                      >
                      <span class="input-group-addon">
                        <i
                          class="fa fa-calendar"
                          aria-hidden="true"
                        />
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div
                      id="datetimepicker1"
                      class="input-group date"
                    >
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Departure Date"
                      >
                      <span class="input-group-addon">
                        <i
                          class="fa fa-calendar"
                          aria-hidden="true"
                        />
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="book_tabel_item">
                  <div class="input-group">
                    <select class="wide">
                      <option data-display="Adult">
                        Adult
                      </option>
                      <option value="1">
                        Old
                      </option>
                      <option value="2">
                        Younger
                      </option>
                      <option value="3">
                        Potato
                      </option>
                    </select>
                  </div>
                  <div class="input-group">
                    <select class="wide">
                      <option data-display="Child">
                        Child
                      </option>
                      <option value="1">
                        Child
                      </option>
                      <option value="2">
                        Baby
                      </option>
                      <option value="3">
                        Child
                      </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="book_tabel_item">
                  <div class="input-group">
                    <select class="wide">
                      <option data-display="Child">
                        Number of Rooms
                      </option>
                      <option value="1">
                        Room 01
                      </option>
                      <option value="2">
                        Room 02
                      </option>
                      <option value="3">
                        Room 03
                      </option>
                    </select>
                  </div>
                  <a
                    class="book_now_btn button_hover"
                    href="#"
                  >Book Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang='ts'>

</script>
