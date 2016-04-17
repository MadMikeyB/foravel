@extends('layouts.app_alt')

@section('content')

    <div class="signup-panel">
        <div class="left">
            <h2><span>Sign Up</span></h2>
            <div class="content-padding">
                <div class="login-passes">
                    <b>Log In With:</b>
                    <a href="/social/facebook" class="strike-tooltip" title="Use Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="/social/twitter" class="strike-tooltip" title="Use Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="/social/steam" class="strike-tooltip" title="Use Steam"><i class="fa fa-steam"></i></a>
                    <a href="/social/google" class="strike-tooltip" title="Use Google.com"><i class="fa fa-google"></i></a>
                </div>
                <div class="the-form" style="margin-top:40px;">
                    <form action="{{url('/register')}}" method="post" role="form">
                        {!! csrf_field() !!}

                        <p>
                            <label for="name">Username:</label>
                            <input id="name" name="name" placeholder="Username" type="text" value="{{ old('name') }}">
                        </p>

                        <p>
                            <label for="email">Email Address:</label>
                            <input id="email" name="email" placeholder="Email Address" type="text" value="{{ old('email') }}">
                        </p>

                        <p>
                            <label for="password">Password:</label>
                            <input id="password" name="password" placeholder="Password" type="password" value="">
                        </p>

                        <p>
                            <label for="password_confirmation">Confirm Password:</label>
                            <input id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" type="password" value="">
                        </p>
                        
                        <p class="form-footer">
                            <input type="submit" name="submit" id="submit" value="Sign Up" />
                        </p>

                        <p style="margin-top:40px;">
                            <span class="info-msg">
                                <a href="/login">Already got an account?</a><br />
                            </span>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="right">
            <h2><span>About {{ Setting::get('site_title') }}</span></h2>
                <div class="content-padding">
                    <div class="form-split-about">
                        <h2>The new home of the greatest gaming-mod community in the world!</h2>
                        <p class="p-padding">Founded by ex-volunteers of FileFront / GameFront, FilesNation is be the Number 1 place to discuss all things gaming-mods.</p>
                        <p class="p-padding">
                        With active, vibrant, up-to-date forums, short-form reporting on the world of modding, and regular podcasts and videos.</p>
                        <h2>Why Join?</h2>
                        <ul>
                            <li>
                                <i class="fa fa-user"></i>
                                <b>Your own personalized profile</b>
                                <p class="p-padding">Your profile will be your FilesNation hub. From a place to display your awards, to a place to post status updates.</p>
                            </li>

                            <li>
                                <i class="fa fa-trophy"></i>
                                <b>Contribution Awards</b>
                                <p class="p-padding">Awards which actually mean something!</p>
                            </li>
                            <li>
                                <i class="fa fa-microphone"></i>
                                <b>You have a Voice</b>
                                <p class="p-padding">On FilesNation, anyone can voice thier opinion. Whether you choose add news and reviews about your favourite new games or mods, or post in our Community Forums</p>
                            </li>
                            <li>
                                <i class="fa fa-comments"></i>
                                <b>Thriving Community</b>
                                <p class="p-padding">From our custom made forum, to our thought provoking articles and reviews, to our thriving modifications database, there's something for everyone.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear-float"></div>
        </div>
@endsection
