 <?php
 
 use App\Models\Assignment;
 use App\Models\Exercise;
 use Livewire\Volt\Component;
 use Livewire\Attributes\On;
 use Illuminate\Validation\Rules;
 
 use Livewire\Attributes\Validate;
 
 new class extends Component {
     #[Validate('required')]
     public $name;
 
     #[Validate('required')]
     public $category;
     public $id;
 
     public $title;
     public $description;
     public $content;
     public $value;
 
     public $form_open;
 
     public $status = 0;
     public function mount()
     {
         $this->form_open = false;
     }
     public function createAssignment()
     {
         $this->validate();
         $new = ['name' => $this->name, 'category' => $this->category, 'status' => $this->status];
 
         $assignment = Assignment::create($new);
         $this->id = $assignment->id;
         //  return redirect()->route('assignments.create');
     }
     public function createExercise()
     {
         $validated = $this->validate([
             'title' => ['required', 'string', 'max:255'],
             'description' => ['required', 'string', 'max:255'],
             'content' => ['required', 'string', 'max:255'],
             'value' => ['required', 'string', 'max:255'],
         ]);
         $validated['assignment_id'] = $this->id;
         $exercise = Exercise::create($validated);
         $this->form_open = false;
     }
 };
 ?>
 <div x-data="{ assignment: true, exercise: false }">

     <form x-show="assignment" wire:submit="createAssignment" class="w-4/5 p-4 border shadow-lg mx-auto">
         <h1 class="text-center font-bold text-xl my-2">Create Assignment</h1>
         <div>
             <x-input-label for="name" :value="__('Name')" />
             <x-text-input wire:model="name" id="name" class="inline-block mt-1 w-4/5" type="text"
                 placeholder="Your Name" autofocus autocomplete="name" />
             <x-input-error :messages="$errors->get('name')" class="mt-2" />
         </div>
         <div>
             <x-input-label for="category" :value="__('Category')" />
             <x-text-input wire:model="category" id="category" class="inline-block mt-1 w-4/5" type="text"
                 placeholder="Category" autofocus autocomplete="category" />
             <x-input-error :messages="$errors->get('category')" class="mt-2" />
         </div>
         <div class=" block w-40 mx-auto">

             <x-primary-button @click="assignment = false; exercise = true"> {{ __('Submit') }} </x-primary-button>
         </div>

     </form>
     <div x-data="{ exerciseForm: @entangle('form_open').live }" x-show="exercise">
         <div @click="exerciseForm = true" class="cursor-pointer py-2 shadow-lg flex justify-between px-4 w-2/5">
             <h1>Add Exercise to your <span class="font-semibold text-lg">{{ $name }}</span>
                 assignment</h1>
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="#8B56EF" class="h-8">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
             </svg>

         </div>

         <form x-show="exerciseForm" wire:submit="createExercise" class="w-4/5 p-4 my-3 border shadow-lg mx-auto ">
             <h1 class="text-center font-semibold mb-2">{{ $name }}</h1>
             <div>
                 <x-input-label for="title" :value="__('Title')" />
                 <x-text-input wire:model="title" id="title" class="inline-block mt-1 w-4/5" type="text"
                     autofocus autocomplete="title" />
                 <x-input-error :messages="$errors->get('description')" class="mt-2" />
             </div>
             <div>
                 <x-input-label for="description" :value="__('Description')" />
                 <x-text-input wire:model="description" id="description" class="inline-block mt-1 w-4/5" type="text"
                     autofocus autocomplete="description" />
                 <x-input-error :messages="$errors->get('description')" class="mt-2" />
             </div>
             <div>
                 <x-input-label for="content" :value="__('Content')" />
                 <x-text-input wire:model="content" id="content" class="inline-block mt-1 w-4/5" type="text"
                     autofocus autocomplete="content" />

                 <x-input-error :messages="$errors->get('content')" class="mt-2" />
             </div>
             <div>
                 <x-input-label for="value" :value="__('Value')" />
                 <x-text-input wire:model="value" id="value" class="inline-block mt-1 w-4/5" type="text"
                     autofocus autocomplete="value" />
                 <x-input-error :messages="$errors->get('value')" class="mt-2" />
             </div>
             <x-primary-button> Submit </x-primary-button>
         </form>

     </div>
 </div>
