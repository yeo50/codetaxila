<?php
use App\Models\Course;
use App\Models\Progress;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {
    public $courses;
    public $topics;
    public $topic_name;
    public $topic_checked;

    public function mount()
    {
        // $this->courses = Course::where('subject', 'html')->get();
        // $topic_array = [];
        // foreach ($this->courses as $key => $value) {
        //     $topic_array[] = $value->topic;
        // }
        // $this->topics = array_unique($topic_array);
        // $this->courses = Course::where('topic', $this->topics[0])->get();

        //Refactor code
        $this->topics = Course::where('subject', 'html')->pluck('topic')->unique()->values()->toArray();
        if (!empty($this->topics)) {
            $this->courses = Course::where('topic', $this->topics[0])->get();
            $this->topic_name = $this->topics[0];
            $this->checked($this->topic_name);
        } else {
            $this->courses = collect();
        }
    }
    public function checked($topic)
    {
        $session_topic = array_keys(session()->all());

        $filter = array_filter($session_topic, function ($item) use ($topic) {
            return $item == $topic;
        });
        if ($filter) {
            $this->topic_checked = true;
        } else {
            $this->topic_checked = false;
        }
    }

    public function topic($topic)
    {
        $this->courses = Course::where('topic', $topic)->get();
        $this->topic_name = $topic;

        $this->checked($topic);
    }
    public function topicFinished()
    {
        $student_id = Auth()->user()->student->id;

        $progresses = Progress::where('student_id', $student_id)->where('subject', 'html')->get();

        foreach ($progresses as $progress) {
            if ($progress->value <= 75) {
                session([$this->topic_name => true]);
                $this->topic_checked = true;
                $valueAdded = $progress->value + 25;
                $progress->update(['value' => $valueAdded]);
            }
        }
    }
};
?>
<div>
    <x-slot:label>courses</x-slot:label>
    <x-slot:student_year>
        3rd year
    </x-slot>


    <div x-data="{ tab: '{{ $topics[0] }}' }">
        <div class="min-h-40 bg-violet-700 flex flex-col items-center justify-center">
            <p class=" w-2/5 text-start text-white font-semibold">Learn HTML</p>

            <h1 class=" text-white text-5xl capitalize " x-text="tab"></h1>
        </div>

        <div class="flex h-56 mt-4">
            <div class="w-[200px]  ">
                <h1 class="my-2">Topics </h1>
                {{-- here loop --}}
                <div class="border border-black">
                    @foreach ($topics as $topic)
                        <div class="py-2 flex-1 flex cursor-pointer border-y-0 border-black "
                            @click="tab = '{{ $topic }}';$wire.topic('{{ $topic }}')">
                            <div x-show="tab === '{{ $topic }}'" class="block w-2 h-[95%] bg-black ">1
                            </div><span class="ps-1 capitalize">{{ $topic }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex-1  gap-2">
                @foreach ($courses as $course)
                    <div class="flex mt-3">
                        <div class="flex-1  p-4">
                            <h1 class="text-xl font-bold">{{ $course->header ?? '' }}</h1>
                            <p> {{ $course->content }}</p>
                        </div>
                        <div class="flex-1  p-4 bg-black text-[#eee]">
                            {{ $course->example }}
                        </div>

                    </div>
                @endforeach
                <div class="text-center mt-4 text-lg font-semibold text-green-600">
                    {{ $topic_checked == true ? 'You have finished this topic' : '' }} </div>

                @if (!$topic_checked)
                    <div class="block w-40 mx-auto mt-4 ">
                        <label for="mark_finished" class="me-1">Mark Finished</label>
                        <input type="checkbox" wire:click="topicFinished" id="mark_finished">
                    </div>
                @endif

            </div>

        </div>
    </div>
</div>
