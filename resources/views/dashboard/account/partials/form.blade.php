<div class="uk-margin">
    <label for="email" class="uk-form-label">Email</label>
    <div class="uk-form-controls">
        <input type="email" id="email" name="email" class="uk-input" value="{{ $user->email }}" readonly>
    </div>
</div>

<div class="uk-margin">
    <label for="name" class="uk-form-label">Name</label>
    <div class="uk-form-controls">
        <input type="text" id="name" name="name" class="uk-input" value="{{ $user->name() }}" readonly>
    </div>
</div>

<div class="uk-margin">
    <label for="password" class="uk-form-label">Change Password</label>
    <div class="uk-form-controls">
        <input type="password" id="password" name="password" class="uk-input" placeholder="Password" readonly>
    </div>
</div>

<div class="uk-margin">
    <label for="contact" class="uk-form-label">Contact No</label>
    <div class="uk-form-controls">
        <input type="text" id="contact" name="contact" class="uk-input" value="{{$user->contact }}" readonly>
    </div>
</div>