<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        
    </style>
</head>
<body class="bg-gray-200 p-4 border-2 border-green-300">
    
    @auth
        <div class="mt-2">
            <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
                
                <span class="capitalize">Welcome {{auth()->user()->name}}!</span>
                <div class="relative h-32 w32">
                    <div class="absolute top-0 right-0 h-16 w-16">
                <form class="" method="POST" action="/logout">
                    <button class="py-2 px-2 bg-red-400 text-white rounded">
                        Logout       
                    </button>
                    @csrf

                </form>
            </div>
            </div>
            <div class="lg mx-auto py-8 px-6 bg-white rounded-xl">
                <h1 class="font-bold text-3xl text-center mb-8">Create a Post</h1>
                <div class="mb-6">
                    <form action="/create-post" method="POST" class="flex flex-col space-y-4">
                        @csrf
                        <input type="text" name="title" placeholder="Post title" class="py-3 p-4 bg-gray-100 rounded-xl">
                        <textarea name="body" placeholder="Body content..." class="py-3 p-4 bg-gray-100 rounded-xl">
                        </textarea>
                        <button type="submit" class="w-20 py-2 px-3 bg-green-500 text-white rounded-xl">Post</button>
                    </form>
                </div>
                </div>
                <h1 class="font-bold text-3xl text-center mb-8"><u>Posts</u></h1>
                @foreach($posts as $post)
                <div class="mb-6">
            <div class="p-4 flex items-center border-b border-gray-300 px-3">
                <div class="flex-1 pr-8">
                    <h3 class="text-lg font-semibold">{{$post->title}}</h3>
                    <p class="text-gray-500">{{$post->body}}</p>
                    <p class="text-gray-300">{{$post->created_at}}</p>
                    <p class="text-gray-200">By:{{$post->user->name}}</p> 
                </div>
                <div class="flex space-x-3">
                        {{-- @method('PATCH') --}}
                    <p class="py-2 px-2 bg-green-500 text-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><a href="/edit-post/{{$post->id}}">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                          </svg>
                        </a>
                          </p>
                
                <form class="" method="POST" action="/delete-post/{{$post->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                          </svg>
                            
                    </button>
                </form>
                
                </div>
            </div>
        </div>
        @endforeach
        </div>
        </div>
    
    @else
    <div class="flex flex-nowrap">
    
           <div class="lg:w-1/4 mx-auto py-2 px-2 bg-white rounded-xl">
        <h1 class="font-bold text-3xl text-center mb-8">Register Here</h1>
        <div class="mb-6">
            <form action="/register" method="POST" class="flex flex-col space-y-4">
                @csrf
                <input type="text" name="name" placeholder="name" class="py-3 p-4 bg-gray-100 rounded-xl">
                <input type="email" name="email" placeholder="email" class="py-3 p-4 bg-gray-100 rounded-xl">
                <input type="password" name="password" placeholder="password" class="py-3 p-4 bg-gray-100 rounded-xl">
                <button type="submit" class="w-20 py-2 px-3 bg-green-500 text-white rounded-xl">Register</button>
            </form>
        </div>
        </div>
        <hr>
        <div class="lg:w-1/4 mx-auto py-2 px-2 bg-white rounded-xl">
            <h1 class="font-bold text-3xl text-center mb-8">Log In Here</h1>
            <div class="mb-6">
                <form action="/login" method="POST" class="flex flex-col space-y-4">
                    @csrf
                    <input type="text" name="loginname" placeholder="name" class="py-3 p-4 bg-gray-100 rounded-xl">
                    <input type="password" name="loginpassword" placeholder="password" class="py-3 p-4 bg-gray-100 rounded-xl">
                    <button type="submit" class="w-20 py-2 px-3 bg-green-500 text-white rounded-xl">Login</button>
                </form>
            </div>
            </div>
    </div>

    
   


    @endauth
    
</body>
</html>