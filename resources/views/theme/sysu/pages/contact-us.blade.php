@extends('theme.'.env('FRONTEND_TEMPLATE').'.main')

@section('pagecss')
@endsection

@section('content')
<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-4">
                {!! $page->contents !!}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="heading-block">
                    <h3>Send us Email</h3>
                </div>

                @if(session()->has('success'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> {{ session()->get('success') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                @endif
                
                @if(session()->has('error'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> {{ session()->get('error') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                @endif

                <div class="form-widget" data-alert-type="inline">

                    <div class="form-result"></div>

                    <form class="nobottommargin" id="template-contactform" name="template-contactform" action="{{ route('contact-us') }}" method="post">
                    @method('POST')
                    @csrf

                        <div class="form-process"></div>

                        <div class="col_one_third">
                            <label for="template-contactform-name">Name <small>*</small></label>
                            <input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control required" required />
                        </div>

                        <div class="col_one_third">
                            <label for="template-contactform-email">Email <small>*</small></label>
                            <input type="email" id="template-contactform-email" name="email" value="" class="required email sm-form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
                        </div>

                        <div class="col_one_third col_last">
                            <label for="template-contactform-phone">Phone</label>
                            <input type="text" id="template-contactform-phone" name="contact" value="" class="sm-form-control" />
                        </div>

                        <div class="clear"></div>

                        <div class="col_two_third">
                            <label for="template-contactform-subject">Subject <small>*</small></label>
                            <input type="text" id="template-contactform-subject" name="subject" value="" class="required sm-form-control" required />
                        </div>

                        <div class="col_one_third col_last">
                            <label for="template-contactform-service">Services</label>
                            <select id="template-contactform-service" name="services" class="sm-form-control">
                                <option value="">-- Select One --</option>
                                <option value="Wordpress">Wordpress</option>
                                <option value="Shared Cloud Hosting">Shared Cloud Hosting</option>
                                <option value="Dedicated Bare Metal Hosting">Dedicated Bare Metal Hosting</option>
                                <option value="Dedicated Cloud Hosting">Dedicated Cloud Hosting</option>
                                <option value="Web Design & Development">Web Design & Development</option>
                                <option value="Ecommerce Solutions">Ecommerce Solutions</option>
                                <option value="Document Management System">Document Management System</option>
                            </select>
                        </div>

                        <div class="clear"></div>

                        <div class="col_full">
                            <label for="template-contactform-message">Message <small>*</small></label>
                            <textarea class="required sm-form-control" id="template-contactform-message" name="message" rows="6" cols="30"></textarea>
                        </div>

                        <div class="col_full form-group">
                            <script src="https://www.google.com/recaptcha/api.js?hl=en" async="" defer="" ></script>
                            <div class="g-recaptcha" data-sitekey="{{ \Setting::info()->google_recaptcha_sitekey }}"></div>
                            <label class="control-label text-danger" for="g-recaptcha-response" id="catpchaError" style="display:none;"><i class="fa fa-times-circle-o"></i>The Captcha field is required.</label></br>
                            @if($errors->has('g-recaptcha-response'))
                                @foreach($errors->get('g-recaptcha-response') as $message)
                                    <label class="control-label text-danger" for="g-recaptcha-response"><i class="fa fa-times-circle-o"></i>{{ $message }}</label></br>
                                @endforeach
                            @endif
                        </div>

                        <div class="col_full">
                            <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Submit Comment</button>
                        </div>
                        <input type="hidden" name="prefix" value="template-contactform-">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
<script>
    $('#contactUsForm').submit(function (evt) {
        let recaptcha = $("#g-recaptcha-response").val();
        if (recaptcha === "") {
            evt.preventDefault();
            $('#catpchaError').show();
            return false;
        }
    });
</script>
@endsection
