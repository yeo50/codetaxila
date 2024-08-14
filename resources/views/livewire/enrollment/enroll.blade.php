<?php

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\enroll;
use App\Models\Progress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Http\Request;

new #[Layout('layouts.app')] class extends Component {
    public $course_name;
    public $enrolls;
    public $courses;
    public $register = null;
    public function mount(Request $request)
    {
        $this->course_name = $request->course_name;
        $this->enrolls = Enroll::all();
        $this->courses = Auth()->user()->student->enroll->pluck('course')->unique()->values()->toArray();
        $this->register = array_filter($this->courses, function ($value) {
            return $value == $this->course_name;
        });
    }
    public function enrollCreate($discount)
    {
        $new['student_id'] = Auth()->user()->student->id;
        $new['course'] = $this->course_name;
        $new['fee'] = 800;
        $percentage = (800 * $discount) / 100;
        $new['payment'] = 800 - $percentage;
        $progress = ['course' => $this->course_name, 'value' => 0, 'student_id' => Auth()->user()->student->id];

        DB::transaction(function () use ($progress, $new) {
            if ($this->course_name = 'frontend') {
                $subjects = ['html', 'css', 'js'];
                foreach ($subjects as $key => $value) {
                    $progress['subject'] = $value;
                    $newProgress = Progress::create($progress);
                }
            }

            $enroll = Enroll::create($new);
        });
        if ($this->course_name == 'frontend') {
            $this->redirect(route('courses.frontend'), navigate: true);
        }
        if ($this->course_name == 'backend') {
            $this->redirect(route('courses.frontend'), navigate: true);
        }
    }
};
?>

<div>


    @if ($register)
        <div
            class="w-full h-52 border border-black flex flex-col items-center justify-center text-lg font-semibold text-red-600">
            <p>You already registered {{ $course_name }} Course </p>
            <a href="{{ route('dashboard') }}" class="text-blue-700 mt-5 ">Return back</a>
        </div>
    @else
        <h1>Enter Your Info to enroll
            <span class="text-lg font-semibold">
                {{ $course_name }}</span>
            course
        </h1>
        <div x-data="{ popup: false, fee: 800, discount: null }">
            <h4>{{ Auth()->user()->email }}</h4>
            <h3>Total cost for <span> {{ $course_name }} is 800$</span></h3>

            <div class="flex gap-3 justify-between mt-4">
                <div
                    class="flex-1 h-44 rounded-lg shadow-md flex items-center justify-center flex-col  border  border-violet-700">
                    <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-12 w-12">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>
                    </div>
                    <p>Full Paid

                    </p>
                    <p>15% discount</p>
                    <x-primary-button @click="popup =  true; fee =  800-(800 * 15/100); discount=15">Enroll
                    </x-primary-button>

                </div>
                <div
                    class="flex-1 h-44 rounded-lg shadow-md flex items-center justify-center flex-col  border  border-violet-700">
                    <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-12 w-12">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                    </div>
                    <p>Monthly Pay

                    </p>
                    <p>10% discount</p>
                    <x-primary-button @click="popup =  true; fee =  800-(800 * 10/100);discount = 10">Enroll
                    </x-primary-button>

                </div>
                <div
                    class="flex-1 h-44 rounded-lg shadow-md flex items-center justify-center flex-col  border  border-violet-700">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-12 w-12">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>

                    </div>
                    <p>Weekly Pay

                    </p>
                    <p>Early Member will get 5% discount</p>
                    <x-primary-button @click="popup =  true; fee =  800-(800 * 5/100);discount= 5">Enroll
                    </x-primary-button>

                </div>
            </div>
            <div x-show="popup"
                class="absolute inset-0 z-10 bg-neutral-900 bg-opacity-[0.6] flex items-center justify-center">
                <div class="z-20 bg-white w-96 h-52 rounded-lg px-6 py-4 ">
                    <h3 class="font-semibold text-lg">Your amount to pay</h3>
                    <h2 class="text-xl mt-6 text-center font-bold"><span x-text="fee"></span> $</h2>
                    <h3 x-text="discount "></h3>

                    <div class="flex justify-between mt-6">
                        <button @click="popup = false"
                            class="px-4 py-2 border hover:border-black rounded-lg">Cancel</button>
                        <button @click="$wire.enrollCreate(discount)"
                            class="px-6 py-2 bg-violet-700 text-white rounded-lg hover:bg-violet-800 hover:ring-2 hover:ring-offset-2 hover:ring-violet-800">Ok</button>
                        {{-- <a href="{{ route('enrolls.create', ['course_name' => 'frontend', 'discount' => '15']) }}">
                        <button
                            class="px-6 py-2 bg-violet-700 text-white rounded-lg hover:bg-violet-800 hover:ring-2 hover:ring-offset-2 hover:ring-violet-800">Ok</button>
                    </a> --}}
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
