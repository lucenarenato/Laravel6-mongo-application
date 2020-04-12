<!DOCTYPE html>
<html>
<head><title>Edit Book</title>
<link href="/css/lib.css" rel="stylesheet">
</head>
<body>
<h1>Welcome to My Library</h1>
<h2>Edit Book</h2>

<hr/>

<form action="{{ route('books.update',['id' =>  $book{0}{'_id'} ]) }}" method="post">

<label for="title">Title</label><input type="text" name="title" value="{{ $book{0}{'title'} }}">
<label for="isbn">ISBN</label><input type="text" name="isbn" value="{{ isset( $book{0}{'isbn'} ) ?  $book{0}{'isbn'} : ' - ' }}">
<label for="author">Author</label><input type="text" name="author" value="{{ $book{0}{'author'} }}">
<label for="category">Category</label><input type="text" name="category" value="{{ $book{0}{'category'} }}">
<br/><hr/>

  <input type="button" class="book-action big" value="Cancel" onclick="window.location='{{ route('books.index') }}'"/>
  <input type="reset" class="book-action big" />
  <input type="hidden" name="_method" value="PUT"/>
  <input type="submit" class="book-action big" name="sub" value="Submit"/>

</form>



</body>
</html>