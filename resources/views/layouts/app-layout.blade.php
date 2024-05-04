<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  {{-- Navbar --}}
  <nav class="navbar fixed-top bg-body-tertiary !tw-h-16">
    <div class="container-fluid">
      <div class="navbar-brand tw-flex tw-items-center tw-gap-x-4">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
          aria-controls="sidebar">
          <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 512 512">
            <path fill="currentColor"
              d="M186.2 139.6h139.6V0H186.2zM372.4 0v139.6H512V0zM0 139.6h139.6V0H0zm186.2 186.2h139.6V186.2H186.2zm186.2 0H512V186.2H372.4zM0 325.8h139.6V186.2H0zM186.2 512h139.6V372.4H186.2zm186.2 0H512V372.4H372.4zM0 512h139.6V372.4H0z" />
          </svg>
        </button>
        <H1 class="tw-text-xl tw-font-bold">WISATA</H1>
      </div>
      <div class="tw-flex tw-items-center tw-gap-x-4">
        <form action="{{ route('logout') }}" method="POST" class="dropdown">
          @csrf
          @method('DELETE')
          <button type="button" class="btn tw-min-w-40 tw-flex tw-items-center tw-gap-x-4" type="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 15 15">
              <path fill="currentColor" d="M5 5.5a2.5 2.5 0 1 1 5 0a2.5 2.5 0 0 1-5 0" />
              <path fill="currentColor" fill-rule="evenodd"
                d="M7.5 0a7.5 7.5 0 1 0 0 15a7.5 7.5 0 0 0 0-15M1 7.5a6.5 6.5 0 1 1 10.988 4.702A3.5 3.5 0 0 0 8.5 9h-2a3.5 3.5 0 0 0-3.488 3.202A6.482 6.482 0 0 1 1 7.5"
                clip-rule="evenodd" />
            </svg>
            <h1 class="tw-text-lg tw-font-bold">{{ Auth::user()->name }}</h1>
          </button>
          <ul class="dropdown-menu !tw-mt-2 tw-w-full">
            <li>
              <button type="submit" class="tw-flex tw-items-center tw-gap-x-2 tw-px-4 tw-text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="m19 12l-4-4m4 4l-4 4m4-4H9m5 9a9 9 0 1 1 0-18" />
                </svg>
                Log out
              </button>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </nav>

  {{-- Sidebar --}}
  <div class="offcanvas offcanvas-start !tw-top-16 !tw-z-[39] !tw-w-72" tabindex="-1" id="sidebar"
    data-bs-scroll="true" data-bs-backdrop="false">
    <div class="offcanvas-body">
      <ul class="tw-divide-y tw-divide-gray-700 tw-font-medium" id="sidebar-menu">
        <li class="tw-py-1">
          <a href="/pengunjungs" class="btn tw-flex tw-h-12 tw-w-full tw-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
              <path fill="currentColor"
                d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5m3.44 5.5A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4M15 4a3.4 3.4 0 0 0-1.93.59a5 5 0 0 1 0 5.82A3.4 3.4 0 0 0 15 11a3.5 3.5 0 0 0 0-7" />
            </svg>
            <span class="ms-3 flex-1 whitespace-nowrap">
              Pengunjung
            </span>
          </a>
        </li>
        <li class="tw-py-1">
          <a href="/tempat_wisatas" class="btn tw-flex tw-h-12 tw-w-full tw-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 36 24">
              <path fill="currentColor"
                d="M20.912 18.228h2.091v2.091h-2.091zm7.228 0h2.091v2.091H28.14zm-1.754-7.416v-2.09h-2.898V9.74l1.081 1.073z" />
              <path fill="currentColor"
                d="M33.552 22.112v-4.409h.665l.618-.611l-7.322-7.322h-.909v1.269h-2.13L23.205 9.77h-3.516l-7.314 7.314l.618.618h.979v4.409h-1.911C9.203 19.377 8.443 13.176 8.71 8.563l.047-.094h.023c1.25 0 2.358.606 3.048 1.54l.007.01c.52.703.833 1.588.833 2.545c0 .66-.148 1.285-.414 1.844l.011-.026a3.842 3.842 0 0 0 1.518-.78l-.006.005a4.254 4.254 0 0 0 1.461-3.213c0-.955-.314-1.836-.844-2.546l.008.011A3.71 3.71 0 0 0 10.28 6.48l.026-.007c.265-.165.57-.311.891-.422l.032-.01a3.891 3.891 0 0 1 1.363-.241c1.083 0 2.064.433 2.781 1.134l-.001-.001a3.516 3.516 0 0 0-.093-1.685l.007.025a3.786 3.786 0 0 0-4.991-2.293l.025-.009a5.067 5.067 0 0 0-.702.303l.029-.014a4.551 4.551 0 0 0-.301-.909l.012.029C8.478.407 6.46-.525 4.847.29a2.989 2.989 0 0 0-1.09.95l-.006.01A3.664 3.664 0 0 1 6.53 3.003l.009.016a5.048 5.048 0 0 0-1.179-.417l-.034-.006C2.846 2.063.486 3.41.063 5.611a3.74 3.74 0 0 0 .109 1.812l-.007-.026a4.553 4.553 0 0 1 4.543-1.402l-.032-.007c.409.086.771.21 1.11.373l-.029-.013a4.114 4.114 0 0 0-4.117 2.04l-.011.02a4.59 4.59 0 0 0-.643 2.357c0 1.568.777 2.954 1.968 3.794l.015.01a4.028 4.028 0 0 0 1.709.648l.021.002a4.665 4.665 0 0 1-.671-2.423c0-.873.237-1.691.651-2.392l-.012.022a4.204 4.204 0 0 1 2.927-2.048l.025-.004c-1.417 6.453-1.809 10.949-.64 13.736H3.573v1.88h32.148v-1.88h-2.169zm-7.95-4.307h7.166v4.307h-7.166zm-10.861-.854l4.95-4.95l4.95 4.95v5.161h-5.435v-3.884h-2.749v3.884h-1.722v-5.161z" />
            </svg>
            <span class="ms-3 flex-1 whitespace-nowrap">
              Tempat Wisata
            </span>
          </a>
        </li>
        <li class="tw-py-1">
          <a href="/laporan" class="btn tw-flex tw-h-12 tw-w-full tw-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
              <path fill="currentColor" d="M14 6h8v16h-8zM2 4h20V2H2zm0 4h10V6H2zm7 14h3V10H9zm-7 0h5V10H2z" />
            </svg>
            <span class="ms-3 flex-1 whitespace-nowrap">
              Laporan
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  {{-- Main Content --}}
  <main
    class="tw-ml-0 tw-mt-16 tw-p-4 tw-transition-all tw-duration-300 tw-ease-[cubic-bezier(0.45,_0.05,_0.55,_0.95)]">
    {{ $slot }}
  </main>
</body>

</html>
