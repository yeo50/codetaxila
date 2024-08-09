<?php

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Http\Request;

new #[Layout('layouts.app')] class extends Component {
    public $student_id;
    public $subjects = ['html', 'css', 'js'];
    public $values = [];
    public $grade_id;
    public $grades;
    public $student;
    public $grade_values;

    public function mount(Request $request)
    {
        $this->student_id = $request->student_id;
        $this->student = Student::where('id', $this->student_id)->first();
        $this->grades = Grade::where('student_id', $this->student_id)->get();
        $this->grade_id = $this->grades->pluck('id')->values()->toArray();

        $this->grade_values = $this->grades->pluck('value')->values()->toArray();
        if (count($this->grade_values) < 3) {
            for ($i = count($this->grade_values); $i < 3; $i++) {
                $this->grade_values[$i] = 0;
            }
        }
    }
    public function gradeCreate($key)
    {
        $new = ['subject' => $this->subjects[$key], 'value' => $this->values[$key] ?? $this->grade_values[$key], 'student_id' => $this->student_id];

        if ($key < count($this->grade_id) && count($this->grade_id) != 0) {
            $id = $this->grade_id[$key];
            $grade = Grade::where('id', $id)->first();
            $update = ['subject' => $this->subjects[$key], 'value' => $this->values[$key] ?? $this->grade_values[$key], 'student_id' => $this->student_id];
            $grade->fill($update);
            $grade->save();
            $this->grade_values[$key] = $this->values[$key] ?? $this->grade_values[$key];
        } else {
            $newGrade = Grade::create($new);
            $this->grade_values[$key] = $this->values[$key] ?? $this->grade_values[$key];
        }
    }
    public function gradeDelete($id)
    {
        $grade = Grade::where('id', $id)->first();
        $grade->delete();
    }
};
?>
<div>
    <p>Insert <span class="font-semibold text-lg">{{ "$student->fname" . "$student->lname" }}</span> Grades</p>

    @foreach ($subjects as $key => $item)
        <div x-data="{ open: false, form: true }">
            <div x-show="open" class="uppercase  w-40 font-semibold flex justify-between mt-2">
                <span>{{ $item }}</span>
                <span>{{ $grade_values[$key] }}</span>
            </div>

            <form x-show='form' wire:submit="gradeCreate({{ $key }})" class=" block   mt-4 p-5">
                @csrf

                <div>
                    <span class="uppercase inline-block w-12 font-semibold">{{ $item }}</span>

                    <input type="number" required wire:model="values.{{ $key }}"
                        :value="{{ $grade_values[$key] ? $grade_values[$key] : '' }}" name="value" id="value"
                        class="mt-2">
                    <input type="submit" value="submit" class="py-2 px-2 rounded-md shadow-md text-white bg-blue-700 "
                        @click="open =true; form = false; " name="submit">
                </div>

            </form>
        </div>
    @endforeach
    <div x-data="{ grade_delete: false }" class="mt-4 p-4 ">
        <div class=" px-3 py-2 w-[50%] flex justify-between">
            <h1>
                Delete <span class="font-semibold text-lg">{{ "$student->fname" . "$student->lname" }}</span> Grades
            </h1>

            <button @click="grade_delete = !grade_delete"
                class="border border-red-600 text-red-600 px-3 py-2 rounded-lg font-bold shadow-lg">Delete
                Grades</button>
        </div>
        <div x-show="grade_delete">
            @foreach ($grades as $item)
                <div class="flex mt-2 justify-between">
                    <p class="text-lg font-semibold block w-40">{{ $item->subject }}</p>
                    <p class="text-lg font-semibold block w-40">{{ $item->value }} </p>
                    <button class="px-3 py-2 rounded-lg bg-red-500 text-whte"
                        wire:click="gradeDelete({{ $item->id }})" wire:confirm="Are you sure? ">Delete</button>
                </div>
            @endforeach
        </div>
    </div>


</div>
