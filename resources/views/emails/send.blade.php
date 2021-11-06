<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background:rgb(220,220,220)">
    <div class="card text-center" style=" 
    max-width: 120rem;
    width: 70%;
    margin: 2rem auto;
    padding:6rem auto;">
   <div style=" 
    height:50px;
    width:400px;
    margin:0px auto;">
        <strong>{{$details['title']}}</strong>
   </div>
   <br>
    <div >
      <p> {{$details['body']}} </p>
      
    </div>
    <a href="{{$details['link']}}" style="display: block; margin: 0 auto;" class="btn btn-primary">{{$details['action']}}</a>
   </div>
</body>
</html>