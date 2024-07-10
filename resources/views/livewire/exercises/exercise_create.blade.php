 <?php
 
 use App\Models\Assignment;
 use App\Models\Exercise;
 use Livewire\Volt\Component;
 use Livewire\Attributes\On;
 use Illuminate\Validation\Rules;
 
 use Livewire\Attributes\Validate;
 
 new class extends Component {
     public $id;
     public $title;
     public $description;
     public $content;
     public $value;
     public $assignment;
     public $exercises;
     public $exercise;
 
     public function mount()
     {
         $this->assignment = Assignment::find($this->id);
         $this->exercises = Exercise::where('assignment_id', $this->id)->get();
     }
 
     public function create()
     {
         $validated = $this->validate([
             'title' => ['required', 'string', 'max:255'],
             'description' => ['required', 'string', 'max:255'],
             'content' => ['required', 'string', 'max:255'],
             'value' => ['required', 'string', 'max:255'],
         ]);
         $validated['assignment_id'] = $this->id;
         $this->exercise = Exercise::create($validated);
 
         return redirect()
             ->route('assignments.edit', $this->id)
             ->with(['message' => "Exercise {$this->exercise->id} created Successfully"]);
     }
 };
 ?>
 <div>
     <form wire:submit="create" class="w-4/5 p-4 border shadow-lg mx-auto ">
         <div>
             <x-input-label for="title" :value="__('Title')" />
             <x-text-input wire:model="title" id="title" class="inline-block mt-1 w-4/5" type="text" autofocus
                 autocomplete="title" />
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
             <x-text-input wire:model="content" id="content" class="inline-block mt-1 w-4/5" type="text" autofocus
                 autocomplete="content" />

             <x-input-error :messages="$errors->get('content')" class="mt-2" />
         </div>
         <div>
             <x-input-label for="value" :value="__('Value')" />
             <x-text-input wire:model="value" id="value" class="inline-block mt-1 w-4/5" type="text" autofocus
                 autocomplete="value" />
             <x-input-error :messages="$errors->get('value')" class="mt-2" />
         </div>
         <x-primary-button> Submit </x-primary-button>
     </form>

 </div>
