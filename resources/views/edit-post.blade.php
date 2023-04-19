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
    <div class="mt-2">
    <div class="lg mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-3xl text-center mb-8">EditPost</h1>
        <div class="mb-6">
            <form action="/edit-post/{{$post->id}}" method="get" class="flex flex-col space-y-4">
                @csrf
                <input type="text" name="title" value="{{$post->title}}" class="py-3 p-4 bg-gray-100 rounded-xl">
                <textarea name="body" class="py-3 p-4 bg-gray-100 rounded-xl">{{$post->body}}
                </textarea>
                <button type="submit" class="w-20 py-2 px-3 bg-green-500 text-white rounded-xl">Save</button>
            </form>
        </div>
        </div>
    </div>
    
</body>
</html>