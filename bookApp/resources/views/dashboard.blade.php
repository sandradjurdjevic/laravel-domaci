<x-app-layout>
       
    <x-slot name="header" >
        
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-pink-200 overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">Books List</div>
                
                <div class="flex-auto text-right mt-2">
                    <a href="/book" class="bg-pink-900 hover:bg-purple-300 text-white font-bold py-2 px-4 rounded">Add new Book</a>
                </div>
            </div>
            <table class="w-full  text-md rounded mb-4">
                <thead>
                @if(count($data)>0)
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Book</th>
                    <th class="text-left p-3 px-5">Author</th>
                    <th class="text-left p-3 px-5">Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach($data as $book)
                    <tr class="border-b hover:bg-orange-100">
                        <td class="p-3 px-5">
                            {{$book['name']}}
                        </td>
                        <td class="p-3 px-5">
                            {{$book['detail']}}
                        </td>
                        <td class="p-3 px-5">
                            
                            <a href="/book/{{$book->id}}" name="edit" class="mr-3 text-sm bg-pink-900 hover:bg-purple-300 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                            <form action="/book/{{$book->id}}" class="inline-block">
                                <button type="submit" name="delete" formmethod="POST" class="text-sm bg-pink-900 hover:bg-purple-300 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            
        </div>
    </div>
</div>

</x-app-layout>