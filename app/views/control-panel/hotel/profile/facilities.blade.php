{{Form::open()}}

        <div class="form-group ">
        @for ($i = 1; $i < 10; $i++)
            <label class="col-md-3">
                  <input type="checkbox" class="minimal"><ins class="iCheck-helper"></ins>
                  {{ 'Facility'.$i }}
            </label>
        @endfor
            <div class="col-lg-12">
                <div class="form-group">
                    &nbsp;
                </div>
            </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary">Add Hotel Facilities</button>
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-primary">Update Hotel Facilities</button>
            <button type="button" class="btn btn-group btn-info">Cancel</button>
        </div>
        </div>

{{Form::close()}}