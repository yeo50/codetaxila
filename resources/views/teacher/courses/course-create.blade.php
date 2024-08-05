     <x-app-layout>
         <h1 class="my-3">Create course</h1>
         <form action="{{ route('courses.store') }}" method="POST" class="w-3/5 ">
             @csrf
             <div>
                 <label for="subjectName">Course Name </label> <br>
                 <input type="text" name="name" id="subjectName">
             </div>
             <div>
                 <label for="subject">Subject </label> <br>
                 <input type="text" name="subject" id="subject">
             </div>
             <div>
                 <label for="topic">Topic </label><br>
                 <input type="text" name="topic" id="topic">
             </div>
             <div>
                 <label for="content">content </label> <br>
                 <input type="text" name="content" id="content">
             </div>
             <div>
                 <label for="example">example </label><br>
                 <input type="text" name="example" id="example">
             </div>
             <div>
                 <label for="header">header </label><br>
                 <input type="text" name="header" id="header">
             </div>
             <input type="submit" name="submit" value="Submit"
                 class="mt-4 p-4 bg-violet-700 text-white font-semibold rounded-lg">
         </form>
     </x-app-layout>
