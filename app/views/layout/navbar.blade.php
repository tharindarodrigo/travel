<style type="text/css">
    .logo{
        height: 50px;;
    }
</style>

<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <table align="center">
            <tr>
                <th style="padding: 10px;"><a href="" style="text-decoration: none">Language</a></th>
                <th style="padding: 10px;"><a href="" style="text-decoration: none">USD</a></th>
                <th style="padding: 10px;"><a href="" style="text-decoration: none">Sign in or Sign up</a></th>
            </tr>
        </table>
    </div>
</div>


<div class="container">
    <div class="navbar mtnav">

        <div class="container offset-3">
            <!-- Navigation-->
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand">
                    {{ HTML::image('images/site/logo.png', '',  array('class' => 'logo')) }}
                </a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown active">
                        <a href="{{URL::route('index')}}">Home</a>

                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Hotels </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"> Select Accommodation</li>

                            <li><a href="hotel_list.php">List page 1</a></li>
                            <li><a href="hotel_list.php">List page 2</a></li>
                            <li><a href="hotel_list.php">List page 3</a></li>
                            <li><a href="hotel_list.php">List page 4</a></li>
                        </ul>
                    </li>

                    <!--<li><a href="about.php">About Us</a></li>-->

                    <li><a href="#">Tours</a></li>

                    <li><a href="#">Excursions</a></li>

                    <li><a href="#">Transportation</a></li>

                    <li><a href="#">Flights</a></li>

                    <li><a href="special_offers.php">Special Offers</a></li>

                    <li><a href="{{URL::to('/contact')}}">Contact Us</a></li>

                </ul>
            </div>
            <!-- /Navigation-->
        </div>

    </div>
</div>

