     <x-app-layout>
         <h1 class="my-3">Edit course</h1>
         <form action="{{ route('courses.update', $course->id) }}" method="POST" class="w-4/5  mt-5">
             @csrf
             @method('PATCH')
             <div>
                 <label for="courseName">Course Name </label> <br>
                 <input type="text" class="w-full ps-2" name="name" id="courseName" value="{{ $course->name }}">
             </div>
             <div>
                 <label for="subject">Subject </label> <br>
                 <input type="text" class="w-full ps-2" name="subject" id="subject" value="{{ $course->subject }}">
             </div>
             <div>
                 <label for="topic">Topic </label><br>
                 <input type="text" class="w-full ps-2" name="topic" id="topic" value="{{ $course->topic }}">
             </div>
             <div>
                 <label for="content">content </label> <br>
                 <input type="text" class="w-full ps-2" name="content" id="content" value="{{ $course->content }}">
             </div>
             <div>
                 <label for="example">example </label><br>
                 <input type="text" class="w-full ps-2" name="example" id="example" value="{{ $course->example }}">
             </div>
             <div>
                 <label for="header">header </label><br>
                 <input type="text" class="w-full ps-2" name="header" id="header"
                     value="{{ $course->header ?? '' }}">
             </div>
             <input type="submit" name="submit" value="Submit"
                 class="mt-4 p-4 bg-violet-700 text-white font-semibold rounded-lg">
         </form>
     </x-app-layout>
