 <x-app-layout>
     @if (session('message'))
         <h1 class="p-4 my-3 border border-red-500 text-red-600 font-bold text-lg text-center">{{ session('message') }}
         </h1>
     @endif
     <table class="w-full">
         <tr class="text-center">
             <th class="p-2 border border-black">User Name</th>
             <th class="p-2 border border-black">User Type</th>
             <th class="p-2 border border-black">Action</th>
         </tr>
         @foreach ($users as $user)
             <tr class="text-center">
                 <td class="p-2 border border-black">{{ $user->name }}</td>
                 <td class="p-2 border border-black">{{ $user->usertype == 1 ? 'student' : 'teacher' }}</td>
                 <td class="p-2 border border-black">
                     <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                         @csrf
                         @method('DELETE')
                         <input type="submit" value="Delete" class="px-3 py-2 text-white bg-red-600 cursor-pointer">
                     </form>
                 </td>
             </tr>
         @endforeach
     </table>

 </x-app-layout>
