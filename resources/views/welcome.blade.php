<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>EKP</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Plus+Jakarta+Sans%3Awght%40400%3B500%3B700%3B800"
    />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>

  <body
    class="relative flex min-h-screen flex-col bg-slate-50 overflow-x-hidden"
    style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'
  >
    <div class="layout-container flex flex-col grow h-full">
      <!-- Header -->
      <header
        class="flex items-center justify-between border-b border-[#e7edf4] px-10 py-3"
      >
        <div class="flex items-center gap-4 text-[#0d141c]">
          <div class="w-10 h-10">
            <svg
              viewBox="0 0 48 48"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              class="w-full h-full"
            >
              <g clip-path="url(#clip0_6_319)">
                <path
                  d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"
                  fill="currentColor"
                />
              </g>
              <defs>
                <clipPath id="clip0_6_319">
                  <rect width="48" height="48" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </div>
          <h2 class="text-lg font-bold leading-tight tracking-[-0.015em]">
            Learn English
          </h2>
        </div>

        <div class="flex gap-8 items-center">
          @if (Route::has('login'))
          <div class="flex items-center gap-4">
            @auth
            <a
              href="{{ url('/dashboard') }}"
              class="px-5 py-1.5 text-sm rounded-md border border-[#ccc] hover:border-[#888] text-[#1b1b18] hover:bg-[#f9f9f9] transition"
              >Dashboard</a
            >
            @else
            <a
              href="{{ route('login') }}"
              class="px-5 py-1.5 text-sm rounded-md border border-[#ccc] hover:border-[#888] text-[#1b1b18] hover:bg-[#f0f0f0] transition"
              >Log in</a
            >

            @if (Route::has('register'))
            <a
              href="{{ route('register') }}"
              class="px-5 py-1.5 text-sm rounded-md border border-[#19140035] hover:border-[#1915014a] text-[#1b1b18] hover:bg-[#f9f9f9] transition"
              >Register</a
            >
            @endif
            @endauth
          </div>
          @endif
        </div>
      </header>
      <main class="flex flex-1 justify-center py-5 px-40">
        <div
          class="layout-content-container max-w-[960px] flex flex-col flex-1"
        >
          <div class="flex flex-wrap justify-between gap-3 p-4">
            <p
              class="text-[#0d141c] text-4xl font-black leading-tight tracking-[-0.033em] min-w-72"
            >
              Explore our lessons
            </p>
          </div>
          <!-- Essential English -->
          <section>
            <h2
              class="text-[#0d141c] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"
            >
              Essential English
            </h2>
            <div
              class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4"
            >
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full aspect-square bg-center bg-no-repeat bg-cover rounded-xl"
                  style='background-image: url("https://cdn.usegalileo.ai/sdxl10/f7334e34-344d-42ec-8696-7f7defd3e2dc.png");'
                ></div>
                <p class="text-[#0d141c] text-base font-medium leading-normal">
                  ABCs
                </p>
                <a href="AB" class="btn btn-outline-danger"></a>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full aspect-square bg-center bg-no-repeat bg-cover rounded-xl"
                  style='background-image: url("https://cdn.usegalileo.ai/sdxl10/b3a3ca8b-c198-444e-8c13-7a39c37b6f24.png");'
                ></div>
                <p class="text-[#0d141c] text-base font-medium leading-normal">
                  Numbers
                </p>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full aspect-square bg-center bg-no-repeat bg-cover rounded-xl"
                  style='background-image: url("https://cdn.usegalileo.ai/sdxl10/f8da77e1-9cb2-4d65-96db-992263e8562f.png");'
                ></div>
                <p class="text-[#0d141c] text-base font-medium leading-normal">
                  Body parts
                </p>
              </div>
            </div>
          </section>
          <section>
            <h2
              class="text-[#0d141c] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"
            >
              Just for fun
            </h2>
            <div
              class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4"
            >
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full aspect-square bg-center bg-no-repeat bg-cover rounded-xl"
                  style='background-image: url("https://cdn.usegalileo.ai/sdxl10/4d36776d-a8e5-4f1d-ae47-6382d27321ea.png");'
                ></div>
                <p class="text-[#0d141c] text-base font-medium leading-normal">
                  Colors
                </p>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full aspect-square bg-center bg-no-repeat bg-cover rounded-xl"
                  style='background-image: url("https://cdn.usegalileo.ai/sdxl10/2552c218-5e8c-4367-9b95-31f62b1c8eaa.png");'
                ></div>
                <p class="text-[#0d141c] text-base font-medium leading-normal">
                  Fruits
                </p>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full aspect-square bg-center bg-no-repeat bg-cover rounded-xl"
                  style='background-image: url("https://cdn.usegalileo.ai/sdxl10/3c515771-5187-4015-b17d-9024271db6d1.png");'
                ></div>
                <p class="text-[#0d141c] text-base font-medium leading-normal">
                  Animals
                </p>
              </div>
          </section>
          <section>
            <h2
              class="text-[#0d141c] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"
            >
              Life skills
            </h2>
            <div
              class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-3"
            >
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full aspect-square bg-center bg-no-repeat bg-cover rounded-xl"
                  style='background-image: url("https://cdn.usegalileo.ai/sdxl10/71a9a7aa-36f4-4268-910f-e07a22a0d247.png");'
                ></div>
                <p class="text-[#0d141c] text-base font-medium leading-normal">
                  Days of the week
                </p>
              </div>
            </div>
          </section>
        </div>
      </main>
    </div>
  </body>
</html>
