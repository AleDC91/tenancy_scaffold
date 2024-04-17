 @if ($errors->any())
 <div class="p-4 m-4 text-sm text-center text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
     <ul class="alert alert-warning">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
     </ul>
 </div>
 @endif
 
 <form action={{ route('inbox.store') }} method="post" enctype="multipart/form-data">
     @csrf

     <label>Upload files (max 20)</label>
     <input type="file" name="docs[]" class="form-control" multiple>
     <button type="submit">Submit</button>
 </form>
