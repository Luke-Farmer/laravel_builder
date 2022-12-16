@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row contact-wrap">
    <div class="col-12 col-lg-8 bg-white p-5" style="z-index: 1;">
        <div class="row">
            <div class="col-12">
                <p class="fs-5 mb-4">Send us a message</p>
            </div>
        </div>
        <form method="POST" action="/contact" id="contact-form">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-6 mb-5">
                    <div class="form-group">
                        <label class="contact-label mb-2" for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Your name...">
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-5">
                    <div class="form-group">
                        <label class="contact-label mb-2" for="email">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Your email...">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="row">
{{--                <div class="col-12 col-lg-6 mb-5">--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="contact-label mb-2" for="email">Phone</label>--}}
{{--                        <input name="phone" type="number" class="form-control" id="email" aria-describedby="emailHelp"--}}
{{--                               placeholder="Your phone number...">--}}
{{--                        <span class="text-danger"></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-12 col-lg-12 mb-5">
                    <div class="form-group">
                        <label class="contact-label mb-2" for="email">Subject</label>
                        <input name="subject" type="text" class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Your message subject...">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="form-group">
                        <label class="contact-label mb-2" for="exampleInputPassword1">Message</label>
                        <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3" style="box-shadow: none!important;" placeholder="Your message..."></textarea>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <button type="submit" class="main-button-light-bg">Leave Message</button>
        </form>
    </div>
    <div class="col-12 col-lg-4 p-5" style="background: #003B5C;z-index: 1;">
        <div class="row">
            <div class="col-12">
                <p class="fs-5 white mb-4">Contact information</p>
                <p class="contact-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, magnam!</p>
            </div>
        </div>
    </div>
</div>
