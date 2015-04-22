<div class="bs-example bs-example-tabs cstyle04">

    <ul class="nav nav-tabs" id="myTab">

        <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#hotel"><span class="hotel"></span>Hotel</a></li>
        <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#car"><span class="car"></span>Transport</a></li>

    </ul>

    <div class="tab-content3" id="myTabContent">



        <div id="hotel" class="tab-pane fade active in">

            <span class="opensans size18">Where do you want to go?</span>
            <input type="text" class="form-control" placeholder="Greece">

            <br/>

            <div class="w50percent">
                <div class="wh90percent textleft">
                    <span class="opensans size13"><b>Check in date</b></span>
                    <input type="text" class="form-control mySelectCalendar" id="datepicker" placeholder="mm/dd/yyyy"/>
                </div>
            </div>

            <div class="w50percentlast">
                <div class="wh90percent textleft right">
                    <span class="opensans size13"><b>Check in date</b></span>
                    <input type="text" class="form-control mySelectCalendar" id="datepicker2" placeholder="mm/dd/yyyy"/>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="room1 margtop15">
                <div class="w50percent">
                    <div class="wh90percent textleft">
                        <span class="opensans size13"><b>ROOM 1</b></span><br/>

                        <div class="addroom1 block"><a href="#room2" onclick="addroom2()" class="grey">+ Add room</a></div>
                    </div>
                </div>

                <div class="w50percentlast">
                    <div class="wh90percent textleft right ohidden">
                        <div class="w50percent">
                            <div class="wh90percent textleft left">
                                <span class="opensans size13"><b>Adult</b></span>
                                <select class="form-control mySelectBoxClass">
                                    <option>1</option>
                                    <option selected>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="w50percentlast">
                            <div class="wh90percent textleft right ohidden">
                                <span class="opensans size13"><b>Child</b></span>
                                <select class="form-control mySelectBoxClass">
                                    <option>0</option>
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="room2 none">
                <div class="clearfix"></div><div class="line1"></div>
                <div class="w50percent">
                    <div class="wh90percent textleft">
                        <span class="opensans size13"><b>ROOM 2</b></span><br/>
                        <div class="addroom2 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom2()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
                    </div>
                </div>

                <div class="w50percentlast">
                    <div class="wh90percent textleft right">
                        <div class="w50percent">
                            <div class="wh90percent textleft left">
                                <span class="opensans size13"><b>Adult</b></span>
                                <select class="form-control mySelectBoxClass">
                                    <option>1</option>
                                    <option>2</option>
                                    <option selected>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="w50percentlast">
                            <div class="wh90percent textleft right">
                                <span class="opensans size13"><b>Child</b></span>
                                <select class="form-control mySelectBoxClass">
                                    <option selected>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="room3 none">
                <div class="clearfix"></div><div class="line1"></div>
                <div class="w50percent">
                    <div class="wh90percent textleft">
                        <span class="opensans size13"><b>ROOM 3</b></span><br/>
                        <div class="addroom3 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom3()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
                    </div>
                </div>

                <div class="w50percentlast">
                    <div class="wh90percent textleft right">
                        <div class="w50percent">
                            <div class="wh90percent textleft left">
                                <span class="opensans size13"><b>Adult</b></span>
                                <select class="form-control mySelectBoxClass">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="w50percentlast">
                            <div class="wh90percent textleft right">
                                <span class="opensans size13"><b>Child</b></span>
                                <select class="form-control mySelectBoxClass">
                                    <option selected>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!--End of 2nd tab -->

        <div id="car" class="tab-pane fade">

            <div class="w50percent">
                <div class="wh90percent textleft">
                    <span class="opensans size13"><b>Picking up</b></span>
                    <input type="text" class="form-control" placeholder="Airport, address">
                </div>
            </div>

            <div class="w50percentlast">
                <div class="wh90percent textleft right">
                    <span class="opensans size13"><b>Dropping off</b></span>
                    <input type="text" class="form-control" placeholder="Airport, address">
                </div>
            </div>


            <div class="clearfix"></div><br/>

            <div class="w50percent">
                <div class="wh90percent textleft">
                    <span class="opensans size13"><b>Pick up date</b></span>
                    <input type="text" class="form-control mySelectCalendar" id="datepicker5" placeholder="mm/dd/yyyy"/>
                </div>
            </div>

            <div class="w50percentlast">
                <div class="wh90percent textleft right">
                    <span class="opensans size13"><b>Hour</b></span>
                    <select class="form-control mySelectBoxClass">
                        <option>12:00 AM</option>
                        <option>12:30 AM</option>
                        <option>01:00 AM</option>
                        <option>01:30 AM</option>
                        <option>02:00 AM</option>
                        <option>02:30 AM</option>
                        <option>03:00 AM</option>
                        <option>03:30 AM</option>
                        <option>04:00 AM</option>
                        <option>04:30 AM</option>
                        <option>05:00 AM</option>
                        <option>05:30 AM</option>
                        <option>06:00 AM</option>
                        <option>06:30 AM</option>
                        <option>07:00 AM</option>
                        <option>07:30 AM</option>
                        <option>08:00 AM</option>
                        <option>08:30 AM</option>
                        <option>09:00 AM</option>
                        <option>09:30 AM</option>
                        <option>10:00 AM</option>
                        <option selected>10:30 AM</option>
                        <option>11:00 AM</option>
                        <option>11:30 AM</option>
                        <option>12:00 PM</option>
                        <option>12:30 PM</option>
                        <option>01:00 PM</option>
                        <option>01:30 PM</option>
                        <option>02:00 PM</option>
                        <option>02:30 PM</option>
                        <option>03:00 PM</option>
                        <option>03:30 PM</option>
                        <option>04:00 PM</option>
                        <option>04:30 PM</option>
                        <option>05:00 PM</option>
                        <option>05:30 PM</option>
                        <option>06:00 PM</option>
                        <option>06:30 PM</option>
                        <option>07:00 PM</option>
                        <option>07:30 PM</option>
                        <option>08:00 PM</option>
                        <option>08:30 PM</option>
                        <option>09:00 PM</option>
                        <option>09:30 PM</option>
                        <option>10:00 PM</option>
                        <option>10:30 PM</option>
                        <option>11:00 PM</option>
                        <option>11:30 PM</option>
                    </select>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="room1 margtop15">
                <div class="w50percent">
                    <div class="wh90percent textleft">
                        <span class="opensans size13"><b>Drop off date</b></span>
                        <input type="text" class="form-control mySelectCalendar" id="datepicker6" placeholder="mm/dd/yyyy"/>
                    </div>
                </div>

                <div class="w50percentlast">
                    <div class="wh90percent textleft right">
                        <span class="opensans size13"><b>Hour</b></span>
                        <select class="form-control mySelectBoxClass">
                            <option>12:00 AM</option>
                            <option>12:30 AM</option>
                            <option>01:00 AM</option>
                            <option>01:30 AM</option>
                            <option>02:00 AM</option>
                            <option>02:30 AM</option>
                            <option>03:00 AM</option>
                            <option>03:30 AM</option>
                            <option>04:00 AM</option>
                            <option>04:30 AM</option>
                            <option>05:00 AM</option>
                            <option>05:30 AM</option>
                            <option>06:00 AM</option>
                            <option>06:30 AM</option>
                            <option>07:00 AM</option>
                            <option>07:30 AM</option>
                            <option>08:00 AM</option>
                            <option>08:30 AM</option>
                            <option>09:00 AM</option>
                            <option>09:30 AM</option>
                            <option>10:00 AM</option>
                            <option selected>10:30 AM</option>
                            <option>11:00 AM</option>
                            <option>11:30 AM</option>
                            <option>12:00 PM</option>
                            <option>12:30 PM</option>
                            <option>01:00 PM</option>
                            <option>01:30 PM</option>
                            <option>02:00 PM</option>
                            <option>02:30 PM</option>
                            <option>03:00 PM</option>
                            <option>03:30 PM</option>
                            <option>04:00 PM</option>
                            <option>04:30 PM</option>
                            <option>05:00 PM</option>
                            <option>05:30 PM</option>
                            <option>06:00 PM</option>
                            <option>06:30 PM</option>
                            <option>07:00 PM</option>
                            <option>07:30 PM</option>
                            <option>08:00 PM</option>
                            <option>08:30 PM</option>
                            <option>09:00 PM</option>
                            <option>09:30 PM</option>
                            <option>10:00 PM</option>
                            <option>10:30 PM</option>
                            <option>11:00 PM</option>
                            <option>11:30 PM</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <!--End of 3rd tab -->


    </div>

    <div class="searchbg">
        <form action="list4.html">
            <button type="submit" class="btn-search">Search</button>
        </form>
    </div>

</div>