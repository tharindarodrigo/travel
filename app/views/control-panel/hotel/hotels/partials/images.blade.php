<div class="col-md-12">
    <div class="form-group">
        <p class="text-blue"><strong>Note :</strong> You can upload up to a maximum of 7 photos. You can add more images after creating the hotel</p>
        {{ Form::file('images[]', array('multiple'=>true)) }}
        {{--<input type="file" name="images[]" multiple/>--}}
    </div>
</div>