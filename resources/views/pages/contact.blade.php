@extends('pages.layout.guest')
@section('title', 'About')
@section('title-info', 'Fill in the login information')
@section('content')
@parent
<div class="container">
	<div class="col-md-7 text-white-desc">
		<h2>Write to Us / Feedback</h2>
		<p>Thank you for choosing to send us your valuable feedback.</p>
		<p>You are encouraged to use the online feedback form below to send us your valuable comments and suggesstions as well as any queries about our products and services that you may have. You may also email your queries / feedback / suggestions. All feedback received are fully responded in a timely manner. Your patience in getting our reply is most appreciated. We look forward to your feedback today.</p>
		{!! Form::open(array('url' => 'saveReview','method'=>'POST','onsubmit'=>'return false;','id'=>'frmReview','name'=>'frmReview','enctype'=>'multipart/form-data')) !!}   
		<div class="row">
            <div class="form-group col-md-6">
                <label for="name">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="User name">
            </div>
			<div class="form-group col-md-6">
                <label for="name">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email address">
            </div>
			<div class="form-group col-md-6">
                <label for="name">Contact Number <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact Number">
            </div>
			        

            <div class="form-group col-md-6">
                <label for="rating">Rating <span class="text-danger">*</span></label>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="rating" checked value="2"> Excel
                </label>
				<label class="radio-inline">
                    <input type="radio" name="rating" value="1"> Good
                </label>   
                <label class="radio-inline">
                    <input type="radio" name="rating" value="0"> Poor
                </label>    
            </div>
            <div class="form-group col-md-12">
                <label for="description">Feedback <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="3" name="feedback" id="feedback" placeholder="Please provide valuable feedback"></textarea>
            </div>
			
			<div class="form-group col-md-12 text-center">
				<button type="submit" class="btn btn-primary waves-effect"><i class="fa fa-plane"></i> Send</button>
			</div>
        </div>
		</form>
		@if (!empty($message))
			<div class="alert alert-success">
				{{ $message }}
			</div>
		@endif
	</div>
	<div class="col-md-4 col-md-offset-1 text-white-desc">
		<h2>Contact Us</h2>
		<h5>Tell us a little more and we'll get in touch.</h5>
		
		<h3><i class="fa fa-envelope"></i> info@savjikitchen.com</h3>
		<br/>
		<h4><i class="fa fa-phone"></i> Contact Us</h4>
		+91 9632463245<br/>
		+91 9538650838<br/>
		
					<br/>
	</div>
</div>
@stop

