<form action="{{ route('subscribeTrait') }}" method="POST" class="flex flex-row md:flex-row justify-center mb-[80px]" style="margin-bottom: 80px;">
    @csrf
    <input type="email" placeholder="Enter your email here..." name="email" class="input">

    <button type="submit" class="cssbuttons-io-button text-black" style="background-color: deepskyblue;">
        Join us
        <div class="icon">
            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none"></path>
                <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                      fill="currentColor"></path>
            </svg>
        </div>
    </button>
</form>
