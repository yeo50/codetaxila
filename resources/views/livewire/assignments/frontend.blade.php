 <?php
 
 use App\Models\Assignment;
 use App\Models\Exercise;
 use Livewire\Volt\Component;
 use Livewire\Attributes\On;
 
 new class extends Component {
     public $assignments;
     public $exercises;
     public function mount()
     {
         $this->assignments = Assignment::all();
         $this->exercises = Exercise::all();
     }
 
     #[On('show-ongoing')]
     public function ongoing()
     {
         $this->assignments = Assignment::where('status', 0)->get();
     }
 
     #[On('show-complete')]
     public function complete()
     {
         $this->assignments = Assignment::where('status', 1)->get();
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
 <div x-data="{ showAssignment: false, showExercise: { currentExercise: false }, currentExercise: 1 }">
     <div class="flex justify-between p-4 border shadow-lg rounded-lg"
         :class="showAssignment ? 'rounded-b-none class="border p-4" ' : ''">
         <div class="flex flex-col">
             <h4 class="font-bold"> HTML Basic</h4>
             <span class="text-slate-500 text-sm">HTML</span>
         </div>
         <div>
             <x-primary-button
                 @click="showAssignment = !showAssignment ; showExercise= { currentExercise: false};  currentExercise = 1 ">View</x-primary-button>
             <span class="px-4 py-2 text-white rounded-sm bg-green-600">Completed again</span>
         </div>
     </div>
     <div x-show="showAssignment" class="">
         @foreach ($exercises as $exercise)
             <div @click="showExercise[{{ $exercise->id }}]=true, showAssignment=false" class="border p-4">
                 <h5>Exercise {{ $exercise->id }}</h5>
             </div>
         @endforeach
         {{-- <div @click="showExercise[1]=true, showAssignment=false" class="border p-4">
             <h5>Exercise 1</h5>
         </div>
         <div @click="showExercise[2]=true, showAssignment=false" class="border p-4">
             <h5>Exercise 2</h5>
         </div> --}}

     </div>
     @foreach ($exercises as $exercise)
         <div x-show="showExercise[{{ $exercise->id }}]" :key="{{ $exercise->id }}">
             <h1>Exercise <span x-text="{{ $exercise->id }}"></span> show</h1>
             <h2>{{ $exercise->title }}</h2>
             <p>{{ $exercise->description }}</p>
             <p>{{ $exercise->content }}</p>
             <button
                 @click=" currentExercise = {{ $exercise->id }};currentExercise += 1; showExercise[currentExercise ]= true; showExercise[{{ $exercise->id }}] =false ;"
                 class="bg-green-500 p-4">Submit
                 Exercise <span x-text="{{ $exercise->id }}"></span></button>
         </div>
     @endforeach
     {{-- <div x-show="showExercise[1]" class="">
         <h1>Exercise <span x-text="currentExercise"></span> show</h1>
         <p>Lorem ipsum dolor sit amet consectetur.</p>
         <button
             @click="currentExercise += 1; showExercise[currentExercise ]= true; showExercise[currentExercise - 1] =false ;"
             class="bg-green-500 p-4">Submit
             Exercise <span x-text="currentExercise"></span></button>
     </div>
     <div x-show="showExercise[2]">
         <h1>Exercise <span x-text="currentExercise"></span> show</h1>
         <p>Lorem ipsum dolor sit amet consectetur.</p>
         <button
             @click="currentExercise += 1; showExercise[currentExercise ]= true; showExercise[currentExercise - 1] =false ;
             if(currentExercise >2)  currentExercise= 1,showExercise= { 1: false, 2: false }, showAssignment=true"
             class="bg-green-500 p-4">Submit
             Exercise <span x-text="currentExercise"></span></button>
     </div> --}}
     @foreach ($assignments as $assignment)
         <div class="flex justify-between p-4 border shadow-lg rounded-lg">
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
     @endforeach
     @foreach ($exercises as $exercise)
         <div class="mb-5" :key="{{ $exercise->id }}">
             <h2>{{ $exercise->title }}</h2>
             <p>{{ $exercise->description }}</p>
             <p>{{ $exercise->content }}</p>
         </div>
     @endforeach
 </div>
