{{ Form::open() }}

    <div class="form-group">
        <label for="location">Address</label>
        <textarea class="form-control" id="address" rows="5" name="address"></textarea>
    </div>

    <div class="form-group">
        <label for="city">City</label>
        <select class="form-control" name="city" id="city">
            <option value="city1">City1</option>
            <option value="city2">City2</option>
            <option value="city3">City3</option>
            <option value="city4">City4</option>
        </select>
    </div>

    <div class="form-group">
        <label for="">Location</label>
        <input class="form-control" id="longitude" name="longitude" placeholder="longitude" type="text"/>
    </div>

    <div class="form-group">
        <input class="form-control" id="latitude" name="latitude" placeholder="latitude" type="text"/>
    </div>

    <div class="form-group">
        <button type="button" class="btn btn-primary">Create Hotel Category</button>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-primary">Update Hotel Category</button>
        <button type="button" class="btn btn-group btn-info">Cancel</button>
    </div>
{{Form::close()}}
