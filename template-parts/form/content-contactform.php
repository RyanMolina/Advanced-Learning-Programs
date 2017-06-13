<div class="form-group">
    <label class="control-label">Full Name</label>
    <div class="inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="fullname" id="fullname" data-minlength="2" placeholder="Full Name" class="form-control" type="text" data-error="Please fill this out" oninput="javascript: hideAlert();" required>
        </div>
        <div class="help-block with-errors"></div>
    </div>
</div>
<!-- Text input-->
<div class="form-group">
    <label class="control-label">Email Address</label>
    <div class="inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input name="email" id="email"pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" placeholder="E-Mail Address" class="form-control" type="email" oninput="javascript: hideAlert();" data-error="Please fill this out" required>
        </div>
        <div class="help-block with-errors"></div>
    </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
    <label class="control-label">Contact Number</label>
        <div class="inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input name="contact" id="contact" data-minlength="7" placeholder="(632)1111 121 or (63900)1212 111" class="form-control" type="tel" oninput="javascript: hideAlert();" data-error="Please fill this out" pattern="^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$" required>
        </div>
        <div class="help-block with-errors"></div>
    </div>
    </div>
<!-- Text area -->
<div class="form-group">
    <label class="control-label">Message</label>
    <div class="inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-comment"></i></span>
        <textarea class="form-control" data-minlength="5" maxlength="200" name="message" id="message" placeholder="Message/Inquiry (Maximum characters: 200)" oninput="javascript: hideAlert();" rows="8" style="resize: none;" data-error="Minimun of 5 characters" required></textarea>
    </div>
    <div class="help-block with-errors"></div>
    </div>
</div>
<div class="form-group">
    <div class="g-recaptcha" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback" data-sitekey="6LeSuiMUAAAAAOe34PTVWrOkKNuhn7zHWV9pbYLl" ></div>
    <input type="hidden" class="form-control" data-recaptcha="true" required>
    <div class="help-block with-errors"></div>
</div>
<!-- Button -->
<div class="form-group">      
    <button type="submit" class="button button-primary" >Send <span class="fa fa-send"></span></button>
</div>

	