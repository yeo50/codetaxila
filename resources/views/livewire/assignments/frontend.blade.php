 <?php
 
 use App\Models\Assignment;
 use App\Models\Exercise;
 use Livewire\Volt\Component;
 use Livewire\Attributes\On;
 
 new class extends Component {
     public $assignments;
     public $exercise;
     public $exercises;
     public $inputValue = '';
     public $currentExercise;
     public $answer;
     public $correctId = [];
     public $refreshStatus;
 
     public function mount()
     {
         $this->assignments = Assignment::all();
         $this->exercises = Exercise::all();
         $this->exerciseStatus = false;
         $this->answer = false;
         $this->exercise = Exercise::find(1);
     }
     protected $listeners = [
         'some-event' => '$refresh',
     ];
     public function setStatus($id)
     {
         $this->exercise = Exercise::find($id);
 
         $this->currentExercise = $this->exercise->id;
         $this->answer = false;
     }
 
     public function submitExercise($assignmentId)
     {
         if ($this->exercise->value == $this->inputValue) {
             $this->correctId[] = [
                 'assignment_id' => $assignmentId,
                 'exercise_id' => $this->exercise->id,
             ];
             $filtered = array_filter($this->correctId, function ($item) use ($assignmentId) {
                 return $item['assignment_id'] == $assignmentId;
             });
             $correctCount = count($filtered);
             $exerciseCount = Exercise::where('assignment_id', 1)->count();
             if ($correctCount == $exerciseCount) {
                 $assignment = Assignment::find($assignmentId);
                 if ($assignment) {
                     $assignment->status = 1;
                     $assignment->save();
                     $this->dispatch('some-event');
                 }
             }
             $this->currentExercise += 1;
             $this->exercise = Exercise::find($this->currentExercise);
             $this->inputValue = '';
             $this->answer = false;
         } else {
             $this->answer = true;
         }
     }
 
     #[On('show-status')]
     public function assignmentStatus($status)
     {
         if ($status == 3) {
             $this->assignments = Assignment::all();
         } else {
             $this->assignments = Assignment::where('status', $status)->get();
         }
     }
 };
 ?>
 <div x-data="{ showAssignment: null, showExercise: null, exerciseList: true, correct: @entangle('correctId').live, wrongAnswer: @entangle('answer').live }">


     @foreach ($assignments as $assignment)
         <div @click="showAssignment= showAssignment === {{ $assignment->id }} ? null : {{ $assignment->id }} ; exerciseList=true; showExercise = null "
             class="flex  justify-between p-4 border shadow-lg rounded-lg cursor-pointer"
             :class="showAssignment ? 'rounded-b-none ' : ''">
             <div class="flex flex-col">
                 <h4 class="font-bold"> {{ $assignment->name }}</h4>
                 <span class="text-slate-500 text-sm">{{ $assignment->category }}</span>
             </div>
             <div>
                 <x-primary-button>View</x-primary-button>
                 <span
                     class="px-4 py-2 inline-flex items-center justify-center w-32 text-white rounded-sm {{ $assignment->status === 1 ? 'bg-green-500' : 'bg-orange-500' }}">{{ $assignment->status === 1 ? 'Completed' : 'On Going' }}</span>
             </div>
         </div>
         <div x-show="showAssignment === {{ $assignment->id }}" class="">

             @foreach ($exercises as $item)
                 <div>
                     <div x-show ="exerciseList" class="border p-4 flex justify-between cursor-pointer"
                         :key="{{ $item->id }}"
                         @click="exerciseList = false; showExercise = showExercise === {{ $item->id }} ? null : {{ $item->id }}; $wire.setStatus({{ $item->id }})">
                         <h5>item {{ $item->id }}</h5>
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="h-8 text-green-800"
                             :class="correct.some(c => c.assignment_id === {{ $assignment->id }} && c.exercise_id ===
                                     {{ $item->id }}) ? '' :
                                 'hidden'">
                             <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                         </svg>
                     </div>
                     <div class="relative p-3" x-show="showExercise === {{ $item->id }}">

                         @if ($exercise)
                             <h1>Exercise <span x-text="{{ $exercise->id }}"></span> show</h1>
                             <h2>{{ $exercise->title }}</h2>
                             <p>{{ $exercise->description }}</p>
                             <p></p>
                             <div>{!! str_replace(
                                 $exercise->value,
                                 "<input type='text' wire:model.live='inputValue' class='w-16 ms-1 outline-none h-6'/>",
                                 $exercise->content,
                             ) !!}</div>
                             <div x-show="wrongAnswer"
                                 class="absolute inset-0 bg-white flex flex-col items-center justify-center text-xl font-bold">
                                 <p class="text-red-700">Wrong Answer</p>
                                 <x-primary-button @click="$wire.setStatus({{ $exercise->id }})">Try
                                     Again</x-primary-button>
                             </div>
                             <x-primary-button class="p-3"
                                 wire:click="submitExercise({{ $assignment->id }})">submit</x-primary-button>
                         @endif

                     </div>
                 </div>
             @endforeach

         </div>
     @endforeach
 </div>
