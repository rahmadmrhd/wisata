@if (session('alert'))
  <div
    {{ $attributes->merge(['class' => 'alert alert-' . session('alert')['type'] . ' fade show !tw-flex tw-items-center']) }}
    role="alert">
    <p class="tw-w-full">{{ session('alert')['message'] }}</p>
    <button type="button" class="btn-close tw-ml-2" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
