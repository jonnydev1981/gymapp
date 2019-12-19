@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Log a Workout</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Choose an existing WOD or manually log a workout.</p>

                    <form method="POST" action="#">
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
        </div>
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

@endsection
