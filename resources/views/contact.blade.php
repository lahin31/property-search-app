@extends('layouts.app')

@section('title')
Contact us
@endsection

@section('content')
    <div class="container">  
    <div class="inner contact" id="contact">
    <h3 style="margin-left: 14px; margin-top: 10px; font-family: cursive;">Contact us today and get reply within 24 hours!</h3><br>
                <!-- Form Area -->
                <div class="contact-form">
                    <!-- Form -->
                    <form action="{{ url('contact-us') }}" method="POST" id="contact-us">
                        {{ csrf_field() }}
                        <!-- Left Inputs -->
                        <!-- Name -->
                        <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                        <!-- Name -->
                            <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                            <!-- Email -->
                            <input type="email" name="email" id="email" required="required" class="form" placeholder="Email" />
                            <!-- Subject -->
                            <input type="text" name="subject" id="subject" required="required" class="form" placeholder="Subject" />
                        </div><!-- End Left Inputs -->
                        <!-- Right Inputs -->
                        <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
                            <!-- Message -->
                            <textarea name="message" id="message" class="form textarea"  placeholder="Message"></textarea>
                        </div><!-- End Right Inputs -->
                        <!-- Bottom Submit -->
                        <div class="relative fullwidth col-xs-12">
                            <!-- Send Button -->
                            <button type="submit" id="submit" name="submit" class="form-btn semibold">Send Message</button> 
                        </div><!-- End Bottom Submit -->
                        <!-- Clear -->
                        <div class="clear"></div>
                    </form>
                </div><!-- End Contact Form Area -->
            </div><!-- End Inner -->
     {{--  <h1>Contact</h1>
        <form action="{{ url('contact') }}" method="POST">
                    {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input id="subject" type="text" class="form-control" name="subject">
            </div>
            <div class="form-group">
                <label for="bmessage">Message</label>
                <textarea id="bmessage" class="form-control" name="bmessage" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-lg btn-success">send message</button>  --}}
        </form>
</div>
@endsection