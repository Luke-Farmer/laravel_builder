<form method="POST" action="/contact" id="contact-form">
    @csrf
    <div class="row">
        <div class="col-12 col-lg-6 mb-5">
            <div class="form-group">
                <label class="contact-label mb-2 para-dim fw-bold" for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Your name...">
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="col-12 col-lg-6 mb-5">
            <div class="form-group">
                <label class="contact-label mb-2 para-dim fw-bold" for="email">Email address</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                       placeholder="Your email...">
                <span class="text-danger"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12 mb-5">
            <div class="form-group">
                <label class="contact-label mb-2 para-dim fw-bold" for="email">Subject</label>
                <input name="subject" type="text" class="form-control" id="email" aria-describedby="emailHelp"
                       placeholder="Your message subject...">
                <span class="text-danger"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-5">
            <div class="form-group">
                <label class="contact-label mb-2 para-dim fw-bold" for="exampleInputPassword1">Message</label>
                <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3" style="box-shadow: none!important;" placeholder="Your message..."></textarea>
                <span class="text-danger"></span>
            </div>
        </div>
    </div>
    <button type="submit" class="button-new">Leave Message</button>
</form>