 <?php
 
 use App\Models\Assignment;
 use Livewire\Volt\Component;
 use Livewire\Attributes\On;
 
 new class extends Component {
     public $assignments;
 
     public function mount()
     {
         $this->assignments = Assignment::all();
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
 <div>
     <div class="flex justify-between p-4 border shadow-lg rounded-lg">
         <div class="flex flex-col">
             <h4 class="font-bold"> HTML Basic</h4>
             <span class="text-slate-500 text-sm">HTML</span>
         </div>
         <div>
             <x-primary-button>View</x-primary-button>
             <span class="px-4 py-2 text-white rounded-sm bg-green-600">Completed again</span>
         </div>
     </div>
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
 </div>
