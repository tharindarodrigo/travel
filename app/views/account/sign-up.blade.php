@extends('account.account')

@section('styles')
    {{--<style type="text/css">--}}
    {{--th {--}}
    {{--text-align: center;--}}
    {{--}--}}
    {{--</style>--}}
@endsection

@section('bread-crumbs')
    <li>/</li>
    <li><a href="#" class="active">Sign Up</a></li>
    @endsection

    @section('body-content')
            <!-- CONTENT -->
    <div class="container">


        <div class="container mt25 offset-0">

            <!-- CONTENT -->
            <div class="pagecontainer2 offset-0">
                <div class="hpadding50c">
                    <p class="lato size30 slim">Sign Up</p>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="row">
                    <br>
                    <br>

                    {{Form::open()}}
                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">
                            <label for="last_name">Email</label>

                            <div class="form-group">
                                {{Form::text('last_name', null, array('class'=> 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">
                            <div class="row">

                                <div class="col-xs-6">
                                    <label for="first_name">First Name</label>

                                    <div class="form-group">
                                        {{Form::text('first_name', null, array('class'=> 'form-control'))}}
                                    </div>

                                </div>
                                <div class="col-xs-6">


                                    <label for="last_name">Last Name</label>

                                    <div class="form-group">
                                        {{Form::text('last_name', null, array('class'=> 'form-control'))}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">
                            <label for="last_name">Password</label>

                            <div class="form-group">
                                {{Form::password('password', array('class'=> 'form-control'))}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">
                            <label for="user_role">I want to register as :</label>

                            <div class="form-group">
                                {{Form::select('user_role',Role::lists('name','id'), null, array('class'=> 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">
                            <label for="last_name">Country</label>

                            <div class="form-group">
                                {{Form::select('user_role',Country::lists('country','id'), null, array('class'=> 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">
                            <label for="telephone2">Company Name</label>

                            <div class="form-group">
                                {{Form::text('company', null, array('class'=> 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">
                            <label for="telephone2">Telephone:</label>

                            <div class="form-group">
                                {{Form::text('telephone', null, array('class'=> 'form-control'))}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">
                            <label for="fax">Fax</label>

                            <div class="form-group">
                                {{Form::text('fax', null, array('class'=> 'form-control'))}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">
                            <div class="form-group">
                                <div class="check-box">

                                    {{Form::checkbox('agreement')}}
                                    I accept Agreement
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="col-md-offset-4 col-md-4">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Sign-Up</button>
                            </div>
                        </div>
                    </div>

                    {{Form::close()}}
                </div>

            </div>


        </div>

    </div>

    <div class="clearfix"></div>
    <br/><br/>
    <!-- END CONTENT -->

    </div>



@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#agent-bookings').dataTable();
        });
    </script>
@stop






