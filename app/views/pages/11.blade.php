{{--@extends('layout.master')--}}
{{--<script>--}}
{{--var version = '1.7.9';--}}
{{--</script>--}}
{{--<style type="text/css">--}}
{{--.space10{--}}
{{--height: 10px;--}}
{{--}--}}
{{--body{--}}
{{--font-family: Segoe UI,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;--}}
{{--}--}}
{{--.jconfirm-box{--}}
    {{--color: red !important;--}}
{{--}--}}
{{--</style>--}}

{{--<script type="text/javascript">--}}
    {{--('.jconfirm-box').css('color', 'red');--}}
    {{--('.content').css('color', 'red');--}}
    {{--('.title').css('color', 'red');--}}
    {{--$(".body").css("background-color", "#00FFFF");--}}

{{--</script>--}}

{{--@section('content')--}}
{{--<body>--}}


{{--<div class="container-fluid">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-9 col-sm-8">--}}
            {{--<!-- introduction -->--}}
            {{--<section id="introduction">--}}
                {{--<header>--}}
                    {{--<h1 style="margin-top: 0px;" class="text-center">--}}
                        {{--<img style="width: 400px;" src="jquery-confirm.png" alt="JQUERY-CONFIRM"/>--}}
                    {{--</h1>--}}

                    {{--<p style="font-size: 18px" class="text-center">--}}
                        {{--<em>alerts</em>, <em>confirms</em> and <em>dialogs</em> in <strong>one</strong>.--}}
                    {{--</p>--}}
                    {{--<br>--}}

                    {{--<h3>Welcome to jquery-confirm!</h3>--}}

                    {{--<p>--}}
                        {{--A jQuery plugin that provides great set of features like,--}}
                        {{--Auto-close, Ajax-loading, background-dismiss, themes and more. <br>--}}
                        {{--This plugin is actively developed, We would love you have your suggestions.--}}
                    {{--</p>--}}
                    {{--<a href="https://github.com/craftpip/jquery-confirm/issues" target="empty"--}}
                       {{--class="btn btn-success"><i class="fa fa-bug fa-fw"></i> Please post your Suggestions here.</a>--}}
                {{--</header>--}}
            {{--</section>--}}
            {{--<hr>--}}
            {{--<section id="practicaluses">--}}
                {{--<h1>Practical Uses</h1>--}}

                {{--<p>These features can practically be used like so.</p>--}}

                {{--<div class="row">--}}
                    {{--<div class="col-md-3">--}}
                        {{--<button class="btn btn-primary btn-block example-p-1">Alerts</button>--}}
                        {{--<p class="text-success">Elegant Alerts.</p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<button class="btn btn-primary btn-block example-p-2">Confirmation</button>--}}
                        {{--<p class="text-success">Stacked Confirmations</p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<button class="btn btn-primary btn-block example-p-3">Must read</button>--}}
                        {{--<p class="text-success">Important modal</p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<button class="btn btn-primary btn-block example-p-7-1">Act like Prompt</button>--}}
                        {{--<p class="text-success">Need input?</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-3">--}}
                        {{--<button class="btn btn-primary btn-block example-p-4">Need Modals?</button>--}}
                        {{--<p class="text-success">Its also a Dialog.</p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<button class="btn btn-primary btn-block example-p-5">Getting data from API</button>--}}
                        {{--<p class="text-success">Something huge?</p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<button class="btn btn-primary btn-block example-p-6">Auto-close</button>--}}
                        {{--<p class="text-success">User friendly?</p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<button class="btn btn-primary btn-block example-p-7">Hit the keys</button>--}}
                        {{--<p class="text-success">Keyboard actions?</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<script type="text/javascript">--}}
                    {{--$('.example-p-1').on('click', function () {--}}
                        {{--$.alert({--}}
                            {{--title: '<div style="color: red !important;">Attention</div>',--}}
                            {{--content: '<div style="color: red !important;">This is some alert to the user. <br> with some <strong>HTML</strong> <em>contents</em></div>',--}}
                            {{--confirmButton: 'Okay',--}}
                            {{--confirmButtonClass: 'btn-primary',--}}
                            {{--icon: 'fa fa-info',--}}
                            {{--animation: 'zoom',--}}
                            {{--confirm: function () {--}}
                                {{--//alert('Okay action clicked.');--}}
                            {{--}--}}
                        {{--});--}}
                    {{--});--}}
                    {{--$('.example-p-2').on('click', function () {--}}
                        {{--$.confirm({--}}
                            {{--title: 'A critical action',--}}
                            {{--content: 'You can queue confirms, you\'ll be asked again for a confirmation.',--}}
                            {{--confirmButton: 'Proceed',--}}
                            {{--confirmButtonClass: 'btn-info',--}}
                            {{--icon: 'fa fa-question-circle',--}}
                            {{--animation: 'scale',--}}
                            {{--confirm: function () {--}}
                                {{--$.confirm({--}}
                                    {{--title: 'A very critical action',--}}
                                    {{--content: 'Are you sure you want to proceed?',--}}
                                    {{--confirmButton: 'Hell, yes!',--}}
                                    {{--icon: 'fa fa-warning',--}}
                                    {{--confirmButtonClass: 'btn-warning',--}}
                                    {{--animation: 'zoom',--}}
                                    {{--confirm: function () {--}}
                                        {{--alert('A very critical action triggered!');--}}
                                    {{--}--}}
                                {{--});--}}
                            {{--}--}}
                        {{--});--}}
                    {{--});--}}
                    {{--$('.example-p-3').on('click', function () {--}}
                        {{--$.alert({--}}
                            {{--title: 'No backroundDismiss!',--}}
                            {{--content: 'This feature hi-lights the dialog if the user clicks outside the dialog. <br> Else if backgroundDismiss is set to <code>TRUE</code> a cancel action is fired.',--}}
                            {{--confirmButton: 'okay',--}}
                            {{--confirmButtonClass: 'btn-info',--}}
                            {{--animation: 'bottom',--}}
                            {{--icon: 'fa fa-check',--}}
                            {{--backgroundDismiss: false--}}
                        {{--});--}}
                    {{--});--}}
                    {{--$('.example-p-4').on('click', function () {--}}
                        {{--$.confirm({--}}
                            {{--title: 'This is a model title',--}}
                            {{--content: 'Need a popup modal?, no problem<br>disable the buttons, and get a full functional modal. <br><h3>HTML in modals</h3><h4><strong>centered in the screen</strong></h4><h5><em>Like a boss</em></h5>',--}}
                            {{--confirmButton: false,--}}
                            {{--cancelButton: false,--}}
                            {{--animation: 'scale'--}}
                        {{--});--}}
                    {{--});--}}
                    {{--$('.example-p-5').on('click', function () {--}}
                        {{--$.confirm({--}}
                            {{--title: 'Getting data from html file',--}}
                            {{--content: 'url:table.html',--}}
                            {{--animation: 'top'--}}
                        {{--});--}}
                    {{--});--}}
                    {{--$('.example-p-6').on('click', function () {--}}
                        {{--$.confirm({--}}
                            {{--title: 'Need a vacation?',--}}
                            {{--content: 'You have 6 seconds to make a choice',--}}
                            {{--autoClose: 'cancel|6000',--}}
                            {{--confirmButton: 'Yes please!',--}}
                            {{--confirmButtonClass: 'btn-info',--}}
                            {{--cancelButton: 'I dont need vacations',--}}
                            {{--confirm: function () {--}}
                                {{--alert('Vacation time!');--}}
                            {{--},--}}
                            {{--cancel: function () {--}}
                                {{--alert('Vacation cancelled!');--}}
                            {{--}--}}
                        {{--});--}}
                    {{--});--}}
                    {{--$('.example-p-7').on('click', function () {--}}
                        {{--$.confirm({--}}
                            {{--title: 'Keyboard Enabled!',--}}
                            {{--keyboardEnabled: true,--}}
                            {{--content: 'Press ENTER to confirm, ESC to cancel.<br> Use <code>keyboardEnabled:true</code> to turn it on.',--}}
                            {{--confirm: function () {--}}
                                {{--alert('confirm triggered!');--}}
                            {{--},--}}
                            {{--cancel: function () {--}}
                                {{--alert('cancel triggered!');--}}
                            {{--}--}}
                        {{--});--}}
                    {{--});--}}
                    {{--$('.example-p-7-1').on('click', function () {--}}
                        {{--$.confirm({--}}
                            {{--title: 'Fill this form!',--}}
                            {{--content: 'url:form.txt',--}}
                            {{--confirm: function () {--}}
                                {{--var input = this.$b.find('input#input-name');--}}
                                {{--var errorText = this.$b.find('.text-danger');--}}
                                {{--if (input.val() == '') {--}}
                                    {{--errorText.show();--}}
                                    {{--return false;--}}
                                {{--} else {--}}
                                    {{--alert('Hello ' + input.val());--}}
                                {{--}--}}
                            {{--}--}}
                        {{--});--}}
                    {{--});--}}
                {{--</script>--}}
            {{--</section>--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--</body>--}}

{{--@endsection--}}

{{--@stop--}}

{{--</html>--}}


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<div id="dialog">
    <p>Are you sure you want to delete?</p>
</div>
<form id="formDelete" action="delete.php" method="POST">
    <input name="id" type="hidden" value="1" />
    <input name="submit1" type="submit" />
</form>
<script src="http://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('input[name="submit1"]').on('click', function(e){
            e.preventDefault();
            $('#dialog').dialog('open');
        });

        $('#dialog').dialog({
            autoOpen: false,
            modal: true,
            buttons: {
                "Confirm": function(e) {
                    $(this).dialog('close');
                    $('#formDelete').submit();


                },
                "Cancel": function() {
                    $(this).dialog('close');
                }
            }
        });
    });
</script>