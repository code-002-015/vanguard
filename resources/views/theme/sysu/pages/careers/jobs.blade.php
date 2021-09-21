@extends('theme.'.env('FRONTEND_TEMPLATE').'.main')
@section('pagecss')

@endsection
@section('content')
<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <span onclick="openNav()" class="d-lg-none mb-4 btn btn-primary btn-bg"><i class="icon-list-alt"></i></span>

                <div id="mySidenav">
                  <a href="javascript:void(0)" class="closebtn d-lg-none" onclick="closeNav()">&times;</a>

                  <div class="heading-block">
                    <h3>Department</h3>
                  </div>

                  <ul class="quicklinks mb-3">
                    @foreach($categories as $cat)

                    <li @if($cat->id == $careerCategory->id) class="current" @endif><a href="{{ route('careers.jobs',$cat->slug) }}">{{ $cat->name }} ({{$cat->total_careers()}})</a></li>
                    @endforeach
                  </ul>
                </div>
            </div>
            
            <div class="col-lg-9">
                @if(session('success'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> Your application has been sent.</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                @endif

                @forelse($careers as $career)
                    <div class="jobs-item border rounded p-4 mb-3">
                        <div class="fancy-title title-bottom-border">
                            <h3><a href="careers-details.htm">{{ $career->name }}</a></h3>
                        </div>

                        {!! $career->contents !!}
                        <p><span>({{$career->vacant_pos}})</span> vacant positions</p>
                        
                        <a href="#modalCareer" class="button button-3d button-black nomargin apply-now" data-id="{{ $career->id }}" data-name="{{$career->name}}" data-lightbox="inline">Apply Now</a>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="modal1 mfp-hide" id="modalCareer">
    <div class="block divcenter" style="background-color: #FFF; max-width: 700px;">
        <div class="" style="padding: 50px;">
            <div class="form-widget">
                <h3>Application form</h3>
                <div class="line m-0 mb-4"></div>
                <div class="form-result"></div>
                <form enctype="multipart/form-data" method="POST" action="{{ route('careers.front.apply') }}" id="applyForm">
                @method('POST')
                @csrf
                    <div class="form-process"></div>
                    <div class="col-12 form-group">
                        <label>Position Applied for:</label>
                        <input type="hidden" name="career_id" id="career_id">
                        <input class="form-control required" type="text" id="career_name" readonly>
                    </div>
                    <div class="col-12 form-group">
                        <label>Name:</label>
                        <input type="text" name="name" id="jobs-application-name" class="form-control required" value="" placeholder="Enter your Full Name">
                    </div>
                    <div class="col-12 form-group">
                        <label>Email:</label>
                        <input type="email" name="email" id="jobs-application-email" class="form-control required" value="" placeholder="Enter your Email">
                    </div>
                    <div class="col-12 form-group">
                        <label>Phone:</label>
                        <input type="text" name="contact" id="jobs-application-phone" class="form-control required" value="" placeholder="Enter your Phone">
                    </div>
                    <div class="col-12 form-group">
                        <label>Upload CV:</label>
                        <input type="file" name="resume" id="resume" class="file-loading required" data-show-preview="false" />
                        <div class="alert alert-danger" id="resumeError" style="display:none;">
                            Uploaded file extension must be .pdf, .docx or .doc
                        </div>
                    </div>
                    
                    <div class="col-12 form-group" style="display: none;">
                        <label>Describe Yourself:</label>
                        <textarea name="about" id="jobs-application-message" class="form-control required" cols="30" rows="5"> </textarea>
                    </div>

                    <div class="col-12 form-group">
                        <label>Why do you think you are the best candidate for the job?</label>
                        <textarea name="q1" id="jobs-application-message" class="form-control required" cols="30" rows="5"></textarea>
                    </div>

                    <div class="col-12 form-group">
                        <label>Tell us about a time when you implemented process improvement on your previous jobs. What happened?</label>
                        <textarea name="q2" id="jobs-application-message" class="form-control required" cols="30" rows="5"></textarea>
                    </div>

                    <div class="col-12 form-group">
                        <label>How does this position fit in with your long-term goals?</label>
                        <textarea name="q3" id="jobs-application-message" class="form-control required" cols="30" rows="5"></textarea>
                    </div>

                    <div class="col-12 col_full form-group">
                        <script src="https://www.google.com/recaptcha/api.js?hl=en" async="" defer="" ></script>
                        <div class="g-recaptcha" data-sitekey="{{ \Setting::info()->google_recaptcha_sitekey }}"></div>
                        <label class="control-label text-danger" for="g-recaptcha-response" id="catpchaError" style="display:none;"><i class="fa fa-times-circle-o"></i>The Captcha field is required.</label></br>
                        @if($errors->has('g-recaptcha-response'))
                            @foreach($errors->get('g-recaptcha-response') as $message)
                                <label class="control-label text-danger" for="g-recaptcha-response"><i class="fa fa-times-circle-o"></i>{{ $message }}</label></br>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-12">
                        <button type="submit" name="jobs-application-submit" class="btn btn-info">Submit</button>
                        <a href="#" class="btn btn-secondary" onClick="$.magnificPopup.close();return false;">Cancel</a>
                    </div>

                    <input type="hidden" name="prefix" value="jobs-application-">
                </form>
            </div>
        </div>
    </div>
</div>

<a href="#myModalSuccess" class="button button-3d button-black nomargin" data-lightbox="inline">Sample button for success send</a>
<div class="modal1 mfp-hide" id="myModalSuccess">
    <div class="block divcenter" style="background-color: #FFF; max-width: 700px;">
        <div class="row nomargin clearfix">
            <div class="col-md-6" data-height-xl="456" data-height-lg="456" data-height-md="456" data-height-sm="0" data-height-xs="0" style="background-image:url('{{ asset('theme/sysu/images/misc/shake.jpg') }}'); background-size: cover;"></div>
            <div class="col-md-6 col-padding" data-height-xl="456" data-height-lg="456" data-height-md="456" data-height-sm="456" data-height-xs="456">
                <div>
                <h4 class="uppercase ls1">Your application has been successfully submitted.</h4>
                    <p>Thank you for submitting your application to WSI!</p>
                <a href="#" class="btn btn-secondary" onClick="$.magnificPopup.close();return false;">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
@endsection

@section('customjs')
    <script type="text/javascript">

        $(document).ready(function () {
            $('.apply-now').on('click', function () {
                $('#career_name').val($(this).data('name'));
                $('#career_id').val($(this).data('id'));
            });

            $('#resume').on( 'change', function() {
                myfile= $( this ).val();
                var ext = myfile.split('.').pop();
                if(ext=="pdf" || ext=="docx" || ext=="doc") {
                    $('#resumeError').hide();
                } else {
                    $(this).val('');
                    $('#resumeError').show();
                }
            });

            @if(Session::has('success'))
                $('#myModalSuccess').modal('show');
            @endif

        });

        $('#applyForm').submit(function (evt) {
            let recaptcha = $("#g-recaptcha-response").val();
            if (recaptcha === "") {
                evt.preventDefault();
                $('#catpchaError').show();
                return false;
            }
        });


    </script>
@endsection
