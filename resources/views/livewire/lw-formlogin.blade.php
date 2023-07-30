<div>
    <div class="input-group mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="input-group mb-3">
        <input 
        @if($show_password=='show')
        type="text"
        @else
        type="password" 
        @endif

        class="form-control" placeholder="Password" id="password" name="password" wire:model="password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="icheck-primary">
        <input type="checkbox" id="remember" wire:model="show_password" value="show">
        <label for="remember">
            Show Password
        </label>
    </div>

</div>