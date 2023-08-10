<div>


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