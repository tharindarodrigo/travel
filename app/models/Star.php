<?php

class Stars extends \Eloquent {

    public function hotel(){

        return $this->belongsTo('Hotel');

    }
    
}