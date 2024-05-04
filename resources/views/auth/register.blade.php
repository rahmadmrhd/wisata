<x-auth-layout>
  <div class="card !tw-flex-row !tw-rounded-lg tw-shadow-lg">
    <img src="https://i.pinimg.com/736x/9b/f1/6b/9bf16bb76f4865ed7065e25cef25f4c6.jpg"
      class="tw-relative tw-h-auto tw-w-96 tw-border-r-2 tw-border-gray-700 tw-pr-1" />
    <div class="card-body tw-min-w-80 tw-m-4">
      <h1 class="tw-mb-6 tw-text-3xl tw-font-bold">Login</h1>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ old('name', '') }}" required>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
            name="username" value="{{ old('username', '') }}" required>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
            name="password" required>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="confirm_password" class="form-label">Confirm Password</label>
          <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
            id="confirm_password" name="confirm_password" required>
          @error('confirm_password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary tw-mt-6">Log In</button>
        <div class="tw-mt-6 tw-text-sm tw-text-gray-400">
          Already have an account?
          <a class="tw-text-blue-500 hover:tw-text-gray-100 hover:tw-underline" href="/login">
            Login
          </a>
        </div>
      </form>
    </div>
  </div>
</x-auth-layout>
