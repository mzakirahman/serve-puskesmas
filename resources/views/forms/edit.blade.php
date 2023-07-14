@extends('app')

@section('title', 'Doctors')

@section('content')

  <div class="flex flex-col w-full h-full p-0 m-0 relative">
    @include('layouts.header')

    @include('layouts.sidebar')

    <main class="block flex-grow flex-shrink-0 w-auto h-auto p-0 mt-14 ml-0 lg:mt-16 lg:ml-64">
      <div class="block w-full max-w-7xl h-auto p-4 mx-auto overflow-hidden xl:m-0">
        <nav class="block w-full h-auto p-0 m-0 bg-white rounded whitespace-nowrap relative">
          <ol class="block w-full h-auto p-0 m-0 overflow-hidden">
            <li class="inline-block w-auto h-auto p-0 m-0 leading-6 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60]">
              <a class="inline-block w-auto h-auto p-0 m-0 body-1 text-red-500 no-underline outline-none cursor-pointer hover:underline focus:underline active:underline" href="{{ route('dashboard.index') }}">
                Dashboard
              </a>
            </li>
            <li class="inline-block w-auto h-auto p-0 m-0 leading-6 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60]">
              <a class="inline-block w-auto h-auto p-0 m-0 body-1 text-red-500 no-underline outline-none cursor-pointer hover:underline focus:underline active:underline" href="{{ route('patients.index') }}">
                Patients
              </a>
            </li>
            <li class="inline-block w-auto h-auto p-0 m-0 leading-6 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60]">
              <span class="inline-block w-auto h-auto p-0 m-0 body-1 text-black/[0.60] cursor-default">
                Forms
              </span>
            </li>
          </ol>
        </nav>

        @if (session()->has('message'))
          <div class="hidden w-full h-14 justify-between items-center p-2 mt-4 rounded-lg bg-success-100 text-success-700 subtitle-2 data-[te-alert-show]:flex" role="alert" data-te-alert-init data-te-alert-show>
            <div class="inline-block w-auto h-auto p-2 ml-0 relative">
              <strong class="inline-block p-0 m-0 relative">Successfully!</strong> {{ session()->get('message') }}
            </div>
            <div class="inline-block w-auto h-auto p-0 m-0 relative">
              <button class="block w-10 h-10 p-2 m-0 text-success-900 rounded-full align-middle cursor-pointer outline-none transition duration-150 ease-in-out opacity-50 hover:opacity-75 focus:opacity-100" type="button" data-te-alert-dismiss data-te-ripple-init data-te-ripple-color="light" aria-label="Close">
                <svg 
                  class="pointer-events-none w-6 h-6 fill-current"
                  xmlns="http://www.w3.org/2000/svg" 
                  height="24px" 
                  viewBox="0 0 24 24" 
                  width="24px" 
                  fill="#000000"
                >
                  <path d="M0 0h24v24H0z" fill="none"/>
                  <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
              </button>
            </div>
          </div>
        @endif

        <div class="block w-full h-auto p-0 mt-4 rounded bg-white text-black/[0.87] shadow-01dp">
          <form class="flex flex-col w-full h-auto outline-none relative" action="{{ route('forms.update', $patient->id) }}" method="post" enctype="multipart/form-data" autocomplete="off" autocapitalize="off">
            @csrf
            @method('PATCH')

            <div class="flex justify-between items-center w-full h-16 p-2 m-0 relative">
              <div class="inline-block w-auto h-auto p-0 m-0 relative">
                <a class="block w-10 h-10 p-2 m-0 text-black/[0.60] rounded-full align-middle cursor-pointer outline-none transition duration-150 ease-in-out hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12]" href="{{ route('patients.index') }}" data-te-toggle="tooltip" title="Back" data-te-ripple-init data-te-ripple-color="light" aria-label="Back">
                  <svg 
                    class="pointer-events-none w-6 h-6 fill-current"
                    xmlns="http://www.w3.org/2000/svg" 
                    height="24px" 
                    viewBox="0 0 24 24" 
                    width="24px" 
                    fill="#000000"
                  >
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
                  </svg>
                </a>
              </div>
              <div class="flex-1 inline-block p-2 ml-2 overflow-hidden relative">
                <h6 class="block w-full h-auto p-0 m-0 headline-6 text-black/[0.87] truncate">
                  Forms
                </h6>
              </div>
            </div>

            <div class="flex flex-col w-full h-auto p-4 m-0 border-y border-solid border-black/[0.12] overflow-x-hidden overflow-y-auto relative lg:px-6">
              <div class="flex justify-between content-start flex-wrap gap-4 w-full max-w-3xl h-auto p-0 mb-4 relative sm:flex-nowrap">
                <div class="inline-block min-w-0 w-full h-auto p-0 m-0 relative sm:w-full">
                  <div class="block p-0 m-0 relative">
                    <select class="hidden w-full" data-te-select-init data-te-select-auto-select="true" data-te-select-size="lg" data-te-class-select-arrow="absolute right-2.5 text-[0.8rem] cursor-pointer peer-focus:text-red-500 peer-data-[te-input-focused]:text-red-500 group-data-[te-was-validated]/validation:peer-valid:text-green-600 group-data-[te-was-validated]/validation:peer-invalid:text-red-500 w-5 h-5" data-te-class-select-label="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate text-black/[0.60] transition-all duration-200 ease-out peer-focus:scale-[0.8] peer-focus:text-red-500 peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none data-[te-input-state-active]:scale-[0.8]" data-te-class-select-filter-input="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-gray-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition duration-300 ease-in-out motion-reduce:transition-none focus:border-red-500 focus:text-gray-700 focus:shadow-[0_0_0_1px_#ef4444] focus:outline-none" disabled>
                      <option value="{{ $patient->user->id }}" selected>{{ $patient->user->name }}</option>
                    </select>
                    <label for="user_id" data-te-select-label-ref>
                      User ID
                    </label>
                    <input type="hidden" name="user_id" value="{{ $patient->user_id }}" />
                  </div>
                  @error('user_id')
                    <div class="block w-full h-auto p-0 mt-2 relative">
                      <span class="block p-0 m-0 body-2 text-red-500 break-words">
                        {{ $message }}
                      </span>
                    </div>
                  @enderror
                </div>
              </div>

              <div class="flex justify-between content-start flex-wrap gap-4 w-full max-w-3xl h-auto p-0 mb-4 relative sm:flex-nowrap">
                <div class="inline-block min-w-0 w-full h-auto p-0 m-0 relative sm:w-full">
                  <div class="block p-0 m-0 relative">
                    <select class="hidden w-full" data-te-select-init data-te-select-auto-select="true" data-te-select-size="lg" data-te-class-select-arrow="absolute right-2.5 text-[0.8rem] cursor-pointer peer-focus:text-red-500 peer-data-[te-input-focused]:text-red-500 group-data-[te-was-validated]/validation:peer-valid:text-green-600 group-data-[te-was-validated]/validation:peer-invalid:text-red-500 w-5 h-5" data-te-class-select-label="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate text-black/[0.60] transition-all duration-200 ease-out peer-focus:scale-[0.8] peer-focus:text-red-500 peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none data-[te-input-state-active]:scale-[0.8]" data-te-class-select-filter-input="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-gray-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition duration-300 ease-in-out motion-reduce:transition-none focus:border-red-500 focus:text-gray-700 focus:shadow-[0_0_0_1px_#ef4444] focus:outline-none" disabled>
                      <option value="{{ $patient->id }}" selected>{{ $patient->name }}</option>
                    </select>
                    <label for="patient_id" data-te-select-label-ref>
                      Patient ID
                    </label>
                    <input type="hidden" name="patient_id" value="{{ $patient->id }}" />
                  </div>
                  @error('patient_id')
                    <div class="block w-full h-auto p-0 mt-2 relative">
                      <span class="block p-0 m-0 body-2 text-red-500 break-words">
                        {{ $message }}
                      </span>
                    </div>
                  @enderror
                </div>
              </div>

              <div class="flex justify-between content-start flex-wrap gap-4 w-full max-w-3xl h-auto p-0 mb-4 relative sm:flex-nowrap">
                <div class="inline-block min-w-0 w-full h-auto p-0 m-0 relative sm:w-full">
                  <div class="block p-0 m-0 relative" data-te-datepicker-init data-te-input-wrapper-init data-te-format="yyyy-mm-dd" data-te-class-notch-leading-normal="border-black/[0.12] group-data-[te-input-focused]:shadow-[-1px_0_0_#ef4444,_0_1px_0_0_#ef4444,_0_-1px_0_0_#ef4444] group-data-[te-input-focused]:border-red-500" data-te-class-notch-middle-normal="border-black/[0.12] group-data-[te-input-focused]:shadow-[0_1px_0_0_#ef4444] group-data-[te-input-focused]:border-red-500" data-te-class-notch-trailing-normal="border-black/[0.12] group-data-[te-input-focused]:shadow-[1px_0_0_#ef4444,_0_-1px_0_0_#ef4444,_0_1px_0_0_#ef4444] group-data-[te-input-focused]:border-red-500" data-te-class-datepicker-header="xs:max-md:landscape:h-full h-[120px] px-6 bg-red-500 flex flex-col rounded-t-lg" data-te-class-datepicker-footer-btn="outline-none bg-white text-red-500 border-none cursor-pointer py-0 px-2.5 uppercase text-[0.8rem] leading-10 font-medium h-10 tracking-[.1rem] rounded-[10px] mb-2.5 hover:bg-neutral-200 focus:bg-neutral-200" data-te-class-datepicker-cell-content="mx-auto group-[:not([data-te-datepicker-cell-disabled]):not([data-te-datepicker-cell-selected]):hover]:bg-neutral-300 group-[[data-te-datepicker-cell-selected]]:bg-red-500 group-[[data-te-datepicker-cell-selected]]:text-white group-[:not([data-te-datepicker-cell-selected])[data-te-datepicker-cell-focused]]:bg-neutral-100 group-[[data-te-datepicker-cell-focused]]:data-[te-datepicker-cell-selected]:bg-red-500 group-[[data-te-datepicker-cell-current]]:border-solid group-[[data-te-datepicker-cell-current]]:border-black group-[[data-te-datepicker-cell-current]]:border">
                    <input class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" type="text" id="date" name="date" placeholder="Date" value="{{ optional($patient)->forms[0]->date ?? '' }}" />
                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-red-500 peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none" for="date">
                      Date
                    </label>
                    <button class="block w-8 h-8 p-1.5 m-0 text-black/[0.60] rounded-full align-middle cursor-pointer outline-none transition duration-150 ease-in-out absolute right-1 top-1/2 -translate-y-1/2 hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12]" type="button" data-te-datepicker-toggle-ref data-te-datepicker-toggle-button-ref>
                      <svg 
                        class="pointer-events-none w-5 h-5 fill-current"
                        xmlns="http://www.w3.org/2000/svg" 
                        height="24px" 
                        viewBox="0 0 24 24" 
                        width="24px" 
                        fill="#000000"
                      >
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                      </svg>
                    </button>
                  </div>
                  @error('date')
                    <div class="block w-full h-auto p-0 mt-2 relative">
                      <span class="block p-0 m-0 body-2 text-red-500 break-words">
                        {{ $message }}
                      </span>
                    </div>
                  @enderror
                </div>
              </div>

              <div class="flex justify-between content-start flex-wrap gap-4 w-full max-w-3xl h-auto p-0 mb-4 relative sm:flex-nowrap">
                <div class="inline-block min-w-0 w-full h-auto p-0 m-0 relative sm:w-full">
                  <div class="block p-0 m-0 relative" data-te-input-wrapper-init data-te-class-notch-leading-normal="border-black/[0.12] group-data-[te-input-focused]:shadow-[-1px_0_0_#ef4444,_0_1px_0_0_#ef4444,_0_-1px_0_0_#ef4444] group-data-[te-input-focused]:border-red-500" data-te-class-notch-middle-normal="border-black/[0.12] group-data-[te-input-focused]:shadow-[0_1px_0_0_#ef4444] group-data-[te-input-focused]:border-red-500" data-te-class-notch-trailing-normal="border-black/[0.12] group-data-[te-input-focused]:shadow-[1px_0_0_#ef4444,_0_-1px_0_0_#ef4444,_0_1px_0_0_#ef4444] group-data-[te-input-focused]:border-red-500">
                    <textarea class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" rows="3" id="soap" name="soap" placeholder="S O A P">{{ optional($patient)->forms[0]->soap ?? '' }}</textarea>
                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-red-500 peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none" for="soap">
                      S O A P
                    </label>
                  </div>
                  @error('soap')
                    <div class="block w-full h-auto p-0 mt-2 relative">
                      <span class="block p-0 m-0 body-2 text-red-500 break-words">
                        {{ $message }}
                      </span>
                    </div>
                  @enderror
                </div>
              </div>

              <div class="flex justify-between content-start flex-wrap gap-4 w-full max-w-3xl h-auto p-0 mb-4 relative sm:flex-nowrap">
                <div class="inline-block min-w-0 w-full h-auto p-0 m-0 relative sm:w-full">
                  <div class="block p-0 m-0 relative" data-te-input-wrapper-init data-te-class-notch-leading-normal="border-black/[0.12] group-data-[te-input-focused]:shadow-[-1px_0_0_#ef4444,_0_1px_0_0_#ef4444,_0_-1px_0_0_#ef4444] group-data-[te-input-focused]:border-red-500" data-te-class-notch-middle-normal="border-black/[0.12] group-data-[te-input-focused]:shadow-[0_1px_0_0_#ef4444] group-data-[te-input-focused]:border-red-500" data-te-class-notch-trailing-normal="border-black/[0.12] group-data-[te-input-focused]:shadow-[1px_0_0_#ef4444,_0_-1px_0_0_#ef4444,_0_1px_0_0_#ef4444] group-data-[te-input-focused]:border-red-500">
                    <textarea class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" rows="3" id="icd" name="icd" placeholder="ICD X / ICD IX">{{ optional($patient)->forms[0]->icd ?? '' }}</textarea>
                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-red-500 peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none" for="icd">
                      ICD X / ICD IX
                    </label>
                  </div>
                  @error('icd')
                    <div class="block w-full h-auto p-0 mt-2 relative">
                      <span class="block p-0 m-0 body-2 text-red-500 break-words">
                        {{ $message }}
                      </span>
                    </div>
                  @enderror
                </div>
              </div>

              <div class="flex justify-between content-start flex-wrap gap-4 w-full max-w-3xl h-auto p-0 mb-4 relative sm:flex-nowrap">
                <div class="inline-block min-w-0 w-full h-auto p-0 m-0 relative sm:w-full">
                  <div class="block p-0 m-0 relative">
                    <select class="hidden w-full" data-te-select-init data-te-select-auto-select="true" data-te-select-size="lg" data-te-class-select-arrow="absolute right-2.5 text-[0.8rem] cursor-pointer peer-focus:text-red-500 peer-data-[te-input-focused]:text-red-500 group-data-[te-was-validated]/validation:peer-valid:text-green-600 group-data-[te-was-validated]/validation:peer-invalid:text-red-500 w-5 h-5" data-te-class-select-label="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate text-black/[0.60] transition-all duration-200 ease-out peer-focus:scale-[0.8] peer-focus:text-red-500 peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none data-[te-input-state-active]:scale-[0.8]" data-te-class-select-filter-input="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-gray-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition duration-300 ease-in-out motion-reduce:transition-none focus:border-red-500 focus:text-gray-700 focus:shadow-[0_0_0_1px_#ef4444] focus:outline-none" disabled>
                      <option value="{{ $patient->doctor_id }}" selected>{{ $patient->doctor->name }}</option>
                    </select>
                    <label for="doctor_id" data-te-select-label-ref>
                      Doctor ID
                    </label>
                    <input type="hidden" name="doctor_id" value="{{ $patient->doctor_id }}" />
                  </div>
                  @error('doctor_id')
                    <div class="block w-full h-auto p-0 mt-2 relative">
                      <span class="block p-0 m-0 body-2 text-red-500 break-words">
                        {{ $message }}
                      </span>
                    </div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="flex justify-end items-center gap-4 w-full h-[52px] p-2 m-0 relative">
              <div class="inline-block w-auto h-auto p-0 m-0 relative">
                <button class="block w-auto min-w-[64px] h-9 p-2 m-0 cursor-pointer bg-transparent rounded shadow-none button text-center text-red-500 select-none align-middle outline-none relative hover:bg-red-500/[0.04] active:bg-red-500/[0.10] focus:bg-red-500/[0.12]" type="reset" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                  Reset
                </button>
              </div>
              <div class="inline-block w-auto h-auto p-0 m-0 relative">
                <button class="block w-auto min-w-[64px] h-9 p-2 m-0 cursor-pointer bg-transparent rounded shadow-none button text-center text-red-500 select-none align-middle outline-none relative hover:bg-red-500/[0.04] active:bg-red-500/[0.10] focus:bg-red-500/[0.12]" type="submit" data-te-ripple-init data-te-ripple-color="light">
                  Submit
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>

    @include('layouts.footer')

  </div>

@endsection
