@extends('frontend.partial.other')

@section('content')

<div class="container" style="max-width: 500px;" >
    <div class="card shadow rounded-3 my-auto">
        <div class="card-header p-3 h4">
            Contact Us
        </div>
        <div class="card-body p-4">
            <form class="row" action="{{route('contact.us.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-control-label" for="form-group-input">Name</label>
                    <input type="text" class="form-control" id="form-group-input" name="name" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="form-group-input">Phone</label>
                    <input type="integer" class="form-control" id="form-group-input" name="phone_number" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="form-group-input">Subject</label>
                    <input type="integer" class="form-control" id="form-group-input" name="subject" required>
                </div>
                <div class="form-group col-lg-12">
                    <label class="form-control-label" for="form-group-input">Message</label>
                    <textarea class="form-control" id="form-group-input" name="message" rows="6" required></textarea>
                </div>
                <div class="form-group col-lg-12">
                    <button class="btn btn-warning float-end mt-2" for="form-group-input">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection