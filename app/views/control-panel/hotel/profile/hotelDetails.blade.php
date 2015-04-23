<div class="row">
    <form class="form" action="">
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="hotel_name">HOTEL NAME *</label>
                <input class="form-control" name="hotel_name" id="hotel_name" type="text"/>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="hotel_name">Stars</label>
                <select class="form-control " name="stars" id="stars">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="search_keywords" id="search_keywords" rows="5"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="search_keywords">Search Keywords</label>
                <textarea class="form-control" name="search_keywords" id="search_keywords" rows="5"></textarea>
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <button type="button" class="btn btn-primary">Create Hotel Category</button>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary">Update Hotel Category</button>
                <button type="button" class="btn btn-group btn-info">Cancel</button>
            </div>
        </div>
    </form>
</div>