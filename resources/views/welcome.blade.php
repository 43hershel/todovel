<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
    </head>
    <body class=" flex w-1/2 mt-36 mx-auto h-full">
        <div class="">
            <div class="flex">
                <div class=" bg-blue-400 p-10">
                   <h1 class="text-5xl font-bold mb-10">To-Do List</h1>
                    <form method="post" action="{{ route('saveItem') }}" accept-charset="UTF-8" class="flex mx-2 gap-2">
                        @csrf
                        <label class="font-bold" for="item">New To-Do item</label> </br>
                        <input class="ring-1 ring-neutral-800 rounded-md" type="text" name="item"> </br>
                        <button type="submit" class="ring-1 ring-blue-300 px-2 rounded-lg bg-blue-400 text-white/80">Save Item</button>
                    </form>
                    @if ($errors->any())
                            <div>
                                <ul class="text-red-500">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="bg-blue-500 p-10 text-white">
                    @foreach ($incompleteItems as $item )
                    <div class="flex justify-between ring-1 ring-blue-400 p-2 my-4 rounded-md">
                    <p>{{ $item->name }}</p>
                        <form method="post" action=" {{ route('markComplete', $item->id) }}" accept-charset="UTF-8">
                        @csrf
                            <button class="" type:"sumbit">Mark Complete</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-green-400 p-10">
                <h1 class="text-5xl font-bold mb-10">Completed tasks</h1>
                <div class="bg-green-500 p-10 text-white">
                @foreach ($completedItems as $item )
                    <div class="flex justify-between ring-1 ring-green-400 p-2 my-4 rounded-md">
                    <p>{{ $item->name }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
