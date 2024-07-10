 <?php
 
 use App\Models\Assignment;
 use App\Models\Exercise;
 use Livewire\Volt\Component;
 use Livewire\Attributes\On;
 
 new class extends Component {
     public $assignments;
     public $exercise;
     public $exercises;
     public $inputValues = [];
     public $modifiedContent;
     public $currentExercise;
     public $currentExerciseIds = [];
     public $showExercise;
     public $answer;
     public $correctId = [];
     public $assignment_id;
     public function mount()
     {
         $this->assignments = Assignment::all();
         $this->exercises = Exercise::all();
         $this->answer = false;
         $this->exercise = Exercise::find(1);
         $this->showExercise = null;
         $this->currentExercise;
     }
     public function setAssignment($id)
     {
         $this->assignment_id = $id;
 
         $this->exercises = Exercise::where('assignment_id', $id)->get();
         $this->currentExerciseIds = [];
         foreach ($this->exercises as $key => $value) {
             $this->currentExerciseIds[] = $value->id;
         }
     }
     protected $listeners = [
         'completeExercise' => '$refresh',
     ];
     public function setStatus($id)
     {
         $this->inputValues = [];
         $this->exercise = $this->exercises->firstWhere('id', $id);
 
         if ($this->exercise) {
             $values = explode(',', $this->exercise->value);
             $replacements = array_map(function ($key) {
                 return "<input type='text' wire:model.live='inputValues.{$key}' class='w-16 ms-1 outline-none h-6'/>";
             }, array_keys($values));
             $this->modifiedContent = str_replace($values, $replacements, $this->exercise->content);
 
             $this->currentExercise = array_search($this->exercise->id, $this->currentExerciseIds);
 
             $this->answer = false;
         }
     }
 
     public function submitExercise($assignmentId)
     {
         if ($this->exercise->value == implode(',', $this->inputValues)) {
             $this->correctId[] = [
                 'assignment_id' => $assignmentId,
                 'exercise_id' => $this->exercise->id,
             ];
 
             $filtered = array_filter($this->correctId, function ($item) use ($assignmentId) {
                 return $item['assignment_id'] == $assignmentId;
             });
             $correctCount = count($filtered);
             $exerciseCount = Exercise::where('assignment_id', $assignmentId)->count();
             if ($this->currentExercise == $exerciseCount - 1) {
                 $this->showExercise = null;
             }
             if ($correctCount == $exerciseCount) {
                 $assignment = Assignment::find($assignmentId);
                 if ($assignment) {
                     session(['assignment_status_' . $assignmentId => true]);
 
                     // to session data
                     //  $sessionId = session()->getId();
                     //  $sessionData = DB::table('sessions')->where('id', $sessionId)->first();
                     //  if ($sessionData) {
                     //      $payload = unserialize(base64_decode($sessionData->payload));
                     //      dd($payload);
                     //      $sessionAssignmentStatus = $payload['assignment_status_' . $assignmentId] ?? null;
                     //      dd($sessionAssignmentStatus);
                     //  }
                     $this->showExercise = null;
                     $this->dispatch('completeExercise');
                 }
             }
             if ($this->currentExercise < $exerciseCount - 1) {
                 $this->currentExercise += 1;
                 $nextId = $this->currentExerciseIds[$this->currentExercise];
 
                 $this->exercise = Exercise::find($nextId);
                 $this->inputValues = [];
                 $values = explode(',', $this->exercise->value);
                 $replacements = array_map(function ($key) {
                     return "<input type='text' wire:model.live='inputValues.{$key}' class='w-16 ms-1 outline-none h-6'/>";
                 }, array_keys($values));
                 $this->modifiedContent = str_replace($values, $replacements, $this->exercise->content);
                 $this->answer = false;
             }
         } else {
             $this->answer = true;
         }
     }
 
     #[On('show-status')]
     public function assignmentStatus($status)
     {
         $session = session()->all();
         $keys = array_keys($session);
 
         $ids = [];
         foreach ($keys as $key) {
             if (preg_match('/assignment_status_(\d+)/', $key, $matches)) {
                 $ids[] = (int) $matches[1];
             }
         }
         if ($status == 3) {
             $this->assignments = Assignment::all();
         } elseif ($status == 1) {
             $this->assignments = Assignment::whereIn('id', $ids)->get();
         } else {
             $this->assignments = Assignment::whereNotIn('id', $ids)->get();
         }
     }
 };
 ?>
 <div x-data="{ showAssignment: null, showExercise: @entangle('showExercise').live, exerciseList: true, correct: @entangle('correctId').live, wrongAnswer: @entangle('answer').live }">


     @foreach ($assignments as $assignment)
         <div @click="showAssignment= showAssignment === {{ $assignment->id }} ? null : {{ $assignment->id }} ;$wire.setAssignment({{ $assignment->id }}); exerciseList=true; showExercise = null "
             class="flex  justify-between p-4 border shadow-lg rounded-lg cursor-pointer"
             :class="showAssignment ? 'rounded-b-none ' : ''">
             <div class="flex flex-col">
                 <h4 class="font-bold"> {{ $assignment->name }}</h4>
                 <span class="text-slate-500 text-sm">{{ $assignment->category }}</span>
             </div>
             <div>

                 <x-primary-button>View</x-primary-button>
                 <span
                     class="px-4 py-2 inline-flex items-center justify-center w-32 text-white rounded-sm {{ session('assignment_status_' . $assignment->id) == 1 ? 'bg-green-500' : 'bg-orange-500' }}">{{ session('assignment_status_' . $assignment->id) == 1 ? 'Completed' : 'On Going' }}</span>
             </div>
         </div>
         <div x-show="showAssignment === {{ $assignment->id }}" class="">

             @foreach ($exercises as $key => $item)
                 <div>
                     <div x-show ="exerciseList" class="border p-4 flex justify-between cursor-pointer"
                         :key="{{ $item->id }}"
                         @click="exerciseList = false; showExercise = showExercise === {{ $item->id }} ? null : {{ $item->id }}; $wire.setStatus({{ $item->id }})">
                         <h5>Exercise {{ $key + 1 }}</h5>
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
                             <h1>Exercise : <span>{{ $currentExercise + 1 }}</span></h1>

                             <p>{{ $exercise->description }}</p>


                             <div>{!! $modifiedContent !!}</div>


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
