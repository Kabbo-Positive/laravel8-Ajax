<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax CURD Application</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="{{ asset('../resources/css') }}/app.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</head>
<body>
    <div style="padding: 30px;"></div>
    <div class="container">
        <h2 style="color: red;">
            <marquee behavior="" direction="" >Laravel Ajax CRUD Application</marquee>
        </h2>
        <div class="row">
            <div class="col-sm-8">
              <div class="card">
                  <div class="card-header">
                    All Teacher
                  </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Institute</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- <tr>
                            <td>1</td>
                            <td>Jhon Deo</td>
                            <td>Udemy Teacher</td>
                            <td>Udemy</td>
                          <td>
                            <button class="btn btn-sm btn-primary mr-2">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                          </td>
                        </tr> --}}
                        </tbody>
                      </table>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="card">
                  <div class="card-header">
                    <span id="addT">Add New Teacher</span>
                    <span id="updateT">Update Teacher</span>
                  </div>

                <div class="card-body">
                    <div class="from-group">
                        <label for="examleInputEmail">Name</label>
                        <input type="text" class="form-control" id="name"
                        aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>

                    <div class="from-group">
                        <label for="examleInputPassword">Title</label>
                        <input type="text"class="form-control" id="title"
                         placeholder="Job Position">
                    </div>

                    <div class="from-group">
                        <label for="examleInputPassword1">Institute</label>
                        <input type="text" class="form-control" id="institute"
                         placeholder="Institute Name">
                    </div>
                    <br>
                  <button type="submit" id="addButton" onclick="addData()" class="btn btn-primary">Add</button>
                  <button type="submit" id="updateButton" class="btn btn-primary">Update</button>

                </div>
              </div>
            </div>
          </div>
    </div>

    <script>
        $('#addT').show();
        $('#addButton').show();
        $('#updateT').hide();
        $('#updateButton').hide();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta [name="csrf-token"]').attr('content')
            }
        })


        function allData()
        {
            $.ajax({
                type:"GET",
                dataType:"json",
                url:"/teacher/all",
                success: function (response) {
                    var data =""
                    $.each(response,function (key,value) {
                          data = data +"<tr>" 
                          data = data +"<td>"+value.id+"</td>"
                          data = data +"<td>"+value.name+"</td>"
                          data = data +"<td>"+value.title+"</td>"
                          data = data +"<td>"+value.institute+"</td>"
                          data = data +"<td>"
                          data = data +"<button class='btn btn-sm btn-primary mr-2'>Edit</button>"
                          data = data +"<button class='btn btn-sm btn-danger'>Delete</button>" 
                          data = data +"</td>" 
                          data = data +"</tr>"
                })
                $('tbody').html(data);
            }
            })
        }
        allData();
        
        function clearData() {
          $('#name').val();
          $('#title').val();
          $('#institute').val();
        }

        function addData() 
        {
         var name = $('#name').val();
         var title = $('#title').val();
         var institute = $('#institute').val();

         $.ajax({
           type:"POST",
           dataType:"json",
           data: {name:name,title:title,institute:institute},
           url:"/teacher/store",
           success:function(data){
            allData();
             console.log('Data Successfully Added');
           }
         })
        }

    </script>
</body>
</html>