@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      <p>Choose an existing WOD or manually log a workout.</p>

      <form method="POST" action="{{ route('workout.store') }}">
          @csrf

          <div class="form-group">
              <label class="form-check-label" for="performed_on">
                  Select date workout performed
              </label>
              <input class="date form-control" type="text" name="performed_on" id="performed_on">
          </div>

          <div class="form-group">
              <div class="well">
                  <div class="input-append">
                      <label for="time_taken">Time taken</label>
                      <input id="time_taken" name="time_taken" type="text" placeholder="HH:MM:SS" onkeypress="formatTime(this)" MaxLength="8" />
                  </div>
              </div>
          </div>

          <div class="form-check">
              <input class="form-check-input" type="radio" name="workoutradio" id="choice-wod" checked>
              <label class="form-check-label" for="choice-wod">
                  Search for an existing WOD
              </label>

              <div class="reveal-if-active">
                  <div class="form-group">
                      <select class="itemName form-control" style="width:500px;" id="itemName" name="itemName"></select>
                  </div>
              </div>
          </div>

          <div class="form-check">
              <input class="form-check-input" type="radio" name="workoutradio" id="choice-manual">
              <label class="form-check-label" for="choice-manual">
              Manual Entry
              </label>
          </div>

          <input type="submit" name="continue" id="continue" class="btn btn-primary" value="Continue" />

      </form>
    </div>
</div>

<script>
var FormStuff = {

    init: function() {
      this.applyConditionalRequired();
      this.bindUIActions();
    },

    bindUIActions: function() {
      $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
    },

    applyConditionalRequired: function() {

      $(".require-if-active").each(function() {
        var el = $(this);
        if ($(el.data("require-pair")).is(":checked")) {
          el.prop("required", true);
        } else {
          el.prop("required", false);
        }
      });

    }

  };

  FormStuff.init();
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

    $('#itemName').select2({
      placeholder: 'Select an item',
      ajax: {
        url: '/wod-ajax',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
                  return {
                      text: item.description,
                      id: item.id
                  }
              })
          };
        },
        cache: true
      }
    });


</script>

<script type="text/javascript">

    $('.date').datepicker({

       format: 'dd-mm-yyyy'

     });

</script>

<script>
    function formatTime(timeInput) {

        intValidNum = timeInput.value;

        if (intValidNum < 24 && intValidNum.length == 2) {
            timeInput.value = timeInput.value + ":";
            return false;
        }
        if (intValidNum == 24 && intValidNum.length == 2) {
            timeInput.value = timeInput.value.length - 2 + "0:";
            return false;
        }
        if (intValidNum > 24 && intValidNum.length == 2) {
            timeInput.value = "";
            return false;
        }

        if (intValidNum.length == 5 && intValidNum.slice(-2) < 60) {
          timeInput.value = timeInput.value + ":";
          return false;
        }
        if (intValidNum.length == 5 && intValidNum.slice(-2) > 60) {
          timeInput.value = timeInput.value.slice(0, 2) + ":";
          return false;
        }
        if (intValidNum.length == 5 && intValidNum.slice(-2) == 60) {
          timeInput.value = timeInput.value.slice(0, 2) + ":00:";
          return false;
        }


        if (intValidNum.length == 8 && intValidNum.slice(-2) > 60) {
          timeInput.value = timeInput.value.slice(0, 5) + ":";
          return false;
        }
        if (intValidNum.length == 8 && intValidNum.slice(-2) == 60) {
          timeInput.value = timeInput.value.slice(0, 5) + ":00";
          return false;
        }

      } //end function
</script>

@endsection
