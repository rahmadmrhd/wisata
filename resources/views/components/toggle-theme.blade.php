<div class="tw-relative tw-ms-3">
  <button id="theme-toggle" type="button" role="button" data-bs-toggle="dropdown" aria-expanded="false"
    class="dark:tw-text-gray-400 dark:tw-ring-gray-600 dark:tw-hover:bg-gray-700 dark:tw-focus:ring-gray-700 tw-rounded-lg tw-p-2.5 tw-text-sm tw-text-gray-500 tw-ring-1 tw-ring-gray-200 hover:tw-bg-gray-100 hover:tw-outline-none">
    <svg id="theme-toggle-dark-icon" class="tw-hidden tw-h-5 tw-w-5" fill="currentColor" viewBox="0 0 20 20"
      xmlns="http://www.w3.org/2000/svg">
      <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
    </svg>
    <svg id="theme-toggle-light-icon" class="tw-hidden tw-h-5 tw-w-5" fill="currentColor" viewBox="0 0 20 20"
      xmlns="http://www.w3.org/2000/svg">
      <path
        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
        fill-rule="evenodd" clip-rule="evenodd"></path>
    </svg>
  </button>
  <ul
    class="dropdown-menu dropdown-menu-end dark:tw-divide-gray-600 dark:tw-bg-gray-700 tw-z-50 tw-my-4 tw-hidden tw-list-none tw-divide-y tw-divide-gray-100 tw-rounded-lg tw-bg-white tw-text-base tw-shadow tw-outline-none">
    <li>
      <input type="radio" name="theme" id="dark-theme" class="tw-hidden" value="dark">
      <label for="dark-theme" class="dropdown-item" role="menuitem" name="dark">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd"
            d="M11.675 2.015a.998.998 0 0 0-.403.011C6.09 2.4 2 6.722 2 12c0 5.523 4.477 10 10 10 4.356 0 8.058-2.784 9.43-6.667a1 1 0 0 0-1.02-1.33c-.08.006-.105.005-.127.005h-.001l-.028-.002A5.227 5.227 0 0 0 20 14a8 8 0 0 1-8-8c0-.952.121-1.752.404-2.558a.996.996 0 0 0 .096-.428V3a1 1 0 0 0-.825-.985Z"
            clip-rule="evenodd" />
        </svg>
        <span>Dark</span>
      </label>
    </li>
    <li>
      <input type="radio" name="theme" id="light-theme" class="tw-hidden" value="light">
      <label for="light-theme" class="dropdown-item" role="menuitem" name="light">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd"
            d="M13 3a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0V3ZM6.343 4.929A1 1 0 0 0 4.93 6.343l1.414 1.414a1 1 0 0 0 1.414-1.414L6.343 4.929Zm12.728 1.414a1 1 0 0 0-1.414-1.414l-1.414 1.414a1 1 0 0 0 1.414 1.414l1.414-1.414ZM12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm-9 4a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H3Zm16 0a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2h-2ZM7.757 17.657a1 1 0 1 0-1.414-1.414l-1.414 1.414a1 1 0 1 0 1.414 1.414l1.414-1.414Zm9.9-1.414a1 1 0 0 0-1.414 1.414l1.414 1.414a1 1 0 0 0 1.414-1.414l-1.414-1.414ZM13 19a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Z"
            clip-rule="evenodd" />
        </svg>
        <span>Light</span>
      </label>
    </li>
    <li>
      <input type="radio" name="theme" id="system-theme" class="tw-hidden" value="system">
      <label for="system-theme" class="dropdown-item" role="menuitem" name="system">
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path fill="currentColor"
            d="M10.85 12.65h2.3L12 9zM20 8.69V4h-4.69L12 .69L8.69 4H4v4.69L.69 12L4 15.31V20h4.69L12 23.31L15.31 20H20v-4.69L23.31 12zM14.3 16l-.7-2h-3.2l-.7 2H7.8L11 7h2l3.2 9z" />
        </svg>
        <span>System</span>
      </label>
    </li>
  </ul>
</div>
