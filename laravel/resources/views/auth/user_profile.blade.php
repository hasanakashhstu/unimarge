@extends('admin.index')
@section('Title', 'User Profile')
@section('breadcrumbs', 'User Profile')
@section('breadcrumbs_link', route('auth.user_profile.index'))
@section('breadcrumbs_title', 'User Profile')
@section('content')


    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="dropjone/dropzone.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dropjone/dropzone.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div class="container">

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
            </div>
        @endif

        <h2>User Profile</h2>
        <hr>

        <div class="image_part">
            <img style="width: 20%" src="{{ asset('img/blankavatar.png') }}">
        </div>

        <div style="margin-top: 20px;">
            <table style=" border: 1px black solid;" class="table table-responsive">
                <thead>
                    <tr style="background: #37414B;color:#fff">
                        <td class="text-center" colspan="2">{{ Session::get('school.system_name') }}(
                            {{ Session::get('school.school_eiin') }} )</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>{{ Str::title(Auth::user()->roles[0]->name) }}</td>
                    </tr>
                    <tr>
                        <td>Last Login</td>
                        <td>{{ date('d-M-Y') }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td style="color:green"><i class="fa fa-circle-thin" aria-hidden="true"></i> &nbsp
                            {{ Auth::user()->status == 1 ? 'Active' : 'Inactive' }}</td>
                    </tr>
                </thead>
            </table>

            <form action="{{ route('auth.user_profile.update') }}" method="post">
                @csrf
                @method('put')
                <div class="accordion">
                    <a href="#accordion1" aria-expanded="false" aria-controls="accordion1"
                        class="accordion-title accordionTitle js-accordionTrigger">Update Your Profile</a>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                                        required />
                                    @error('name')
                                        <p style="color: red;"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', Auth::user()->email) }}" required />
                                    @error('email')
                                        <p style="color: red;"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </td>

                            </tr>

                            <tr>
                                <td>Password</td>
                                <td>
                                    <input type="password" name="password" id="password" onkeyup="password_len_check()" />
                                    <span class="add-on" style="width:0%" id="help_block"></span>
                                    @error('password')
                                        <p style="color: red;"><strong>{{ $message }}</strong></p>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>confiram Password</td>
                                <td>
                                    <input type="password" name="password_confirmation" id="password_confirm"
                                        onkeyup="Password_match()" />
                                    <span id="password_match"></span>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <button type="submit" class="btn btn-success" style="margin-left: 40px;">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
        function password_len_check() {
            var password_length_for_password = $("#password").val().length;
            // alert(password_length_for_password);
            if (password_length_for_password < 8) {
                $("#help_block").html("<font color='red'> Password Weak</font>");
            } else {
                $("#help_block").html("<font color='green'> Password Strong</font>");
            }

        }

        $(document).ready(function() {

            $("#password_show_button").mouseup(function() {

                $("#password").attr("type", "password");
            });
            $("#password_show_button").mousedown(function() {
                $("#password").attr("type", "text");

            });
        });


        function Password_match() {
            var password_get = $("#password").val();
            var confiram_password_get = $("#password_confirm").val();
            if (password_get == confiram_password_get) {
                $("#password_match").html("<font color='green'> Password Match</font>");
                $("#submit_button").attr('disabled', false);
            } else {
                $("#password_match").html("<font color='red'> Password Not Match</font>");
                $("#submit_button").attr('disabled', true);
            }
        }
    </script>
    <style type="text/css">
        //updated ver
        * {
            box-sizing: border-box;
        }

        @import url(https://fonts.googleapis.com/css?family=Lato:400,700);

        body {

            font-family: 'Lato';
        }

        .heading-primary {
            font-size: 2em;
            padding: 2em;
            text-align: center;
        }

        .accordion dl,
        .accordion-list {
            border: 1px solid #ddd;

            &:after {
                content: "";
                display: block;
                height: 1em;
                width: 100%;
                background-color: darken(#38cc70, 10%);
            }
        }

        .accordion dd,
        .accordion__panel {
            background-color: #eee;
            font-size: 1em;
            line-height: 5.5em;
        }

        .accordion p {
            padding: 1em 2em 1em 2em;
        }

        .accordion {
            position: relative;
            background-color: #eee;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 2em 0 2em 0;
        }

        .accordionTitle,
        .accordion__Heading {
            background-color: #37414B;
            text-align: center;
            font-weight: 700;
            padding: 2em;
            display: block;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.5s ease-in-out;
            border-bottom: 1px solid darken(#38cc70, 5%);

            &:before {
                content: "+";
                font-size: 1.5em;
                line-height: 0.5em;
                float: left;
                transition: transform 0.3s ease-in-out;
            }

            &:hover {
                background-color: darken(#38cc70, 10%);
            }
        }

        .accordionTitleActive,
        .accordionTitle.is-expanded {
            background-color: darken(#38cc70, 10%);

            &:before {

                transform: rotate(-225deg);
            }
        }

        .accordionItem {
            height: auto;
            overflow: hidden;
            //SHAME: magic number to allow the accordion to animate

            max-height: 50em;
            transition: max-height 1s;


            @media screen and (min-width:48em) {
                max-height: 15em;
                transition: max-height 0.5s
            }


        }

        .accordionItem.is-collapsed {
            max-height: 0;
        }

        .no-js .accordionItem.is-collapsed {
            max-height: auto;
        }

        .animateIn {
            animation: accordionIn 0.45s normal ease-in-out both 1;
        }

        .animateOut {
            animation: accordionOut 0.45s alternate ease-in-out both 1;
        }

        @keyframes accordionIn {
            0% {
                opacity: 0;
                transform: scale(0.9) rotateX(-60deg);
                transform-origin: 50% 0;
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes accordionOut {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0.9) rotateX(-60deg);
            }
        }

    </style>


    <script type="text/javascript">
        //uses classList, setAttribute, and querySelectorAll
        //if you want this to work in IE8/9 youll need to polyfill these
        (function() {
            var d = document,
                accordionToggles = d.querySelectorAll('.js-accordionTrigger'),
                setAria,
                setAccordionAria,
                switchAccordion,
                touchSupported = ('ontouchstart' in window),
                pointerSupported = ('pointerdown' in window);

            skipClickDelay = function(e) {
                e.preventDefault();
                e.target.click();
            }

            setAriaAttr = function(el, ariaType, newProperty) {
                el.setAttribute(ariaType, newProperty);
            };
            setAccordionAria = function(el1, el2, expanded) {
                switch (expanded) {
                    case "true":
                        setAriaAttr(el1, 'aria-expanded', 'true');
                        setAriaAttr(el2, 'aria-hidden', 'false');
                        break;
                    case "false":
                        setAriaAttr(el1, 'aria-expanded', 'false');
                        setAriaAttr(el2, 'aria-hidden', 'true');
                        break;
                    default:
                        break;
                }
            };
            //function
            switchAccordion = function(e) {
                console.log("triggered");
                e.preventDefault();
                var thisAnswer = e.target.parentNode.nextElementSibling;
                var thisQuestion = e.target;
                if (thisAnswer.classList.contains('is-collapsed')) {
                    setAccordionAria(thisQuestion, thisAnswer, 'true');
                } else {
                    setAccordionAria(thisQuestion, thisAnswer, 'false');
                }
                thisQuestion.classList.toggle('is-collapsed');
                thisQuestion.classList.toggle('is-expanded');
                thisAnswer.classList.toggle('is-collapsed');
                thisAnswer.classList.toggle('is-expanded');

                thisAnswer.classList.toggle('animateIn');
            };
            for (var i = 0, len = accordionToggles.length; i < len; i++) {
                if (touchSupported) {
                    accordionToggles[i].addEventListener('touchstart', skipClickDelay, false);
                }
                if (pointerSupported) {
                    accordionToggles[i].addEventListener('pointerdown', skipClickDelay, false);
                }
                accordionToggles[i].addEventListener('click', switchAccordion, false);
            }
        })();
    </script>
    <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
@stop
