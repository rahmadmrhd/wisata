@props(['id', 'title'])

<div {{ $attributes->merge(['class' => 'card ']) }}>
  <div class="card-body">
    <div class="tw-mb-4 tw-flex tw-items-center tw-justify-between">
      <h3 class="tw-flex-shrink-0 tw-text-base tw-font-bold tw-leading-none tw-text-white sm:tw-text-xl">
        {{ $title }}
      </h3>
    </div>
    <canvas id="{{ $id }}"></canvas>
  </div>
</div>
