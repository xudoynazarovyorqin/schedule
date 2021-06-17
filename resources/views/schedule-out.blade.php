<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title>Document</title>
  <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  background-image: url("https://upload.wikimedia.org/wikipedia/commons/thumb/d/de/American_University_School_of_International_Service_building.jpg/420px-American_University_School_of_International_Service_building.jpg");
  filter: blur(8px);
  -webkit-filter: blur(8px);
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.bg-login{
  position: absolute;
  top: 2%;
  right: 2%;
  font-family: calibri;
  font-size: 20px;
  
}
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  font-family: calibri;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 90%;
  padding: 20px;
  text-align: center;
}
</style>
</head>
<body>
  <div class="bg-image"></div>
  <div class="bg-login">
    <h3 style="display: inline" class="text-center"><a href="/" class="text-sm text-gray-700 text-decoration-none text-light" >Ortga</a></h3>
  </div>
      <div class="bg-text">
      <table class="table text-light table-bordered">

        <thead >
          <tr>
            <th scope="col">Kun</th>
            <th scope="col">Vaqt</th>
            <th scope="col">Xona</th>
            <th scope="col">Fan</th>
            <th scope="col">O'qituvchi</th>
            <th scope="col">Guruh</th>
          </tr>
        </thead>
        
        <tbody>
          <tr>
                <form action="{{route('out-search')}}" method="POST">

            <td>
                  <input name="day" type="date" class="filter-select ">
                  </input>
                </td>
                <td>
                <select name="time" class="filter-select">
                  <option  disabled selected value>Parani tanlang</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
                </td>
            <td>
                  <select name="room" class="filter-select">
                  <option  disabled selected value>Xonani tanlang</option>
                  @foreach ($rooms as $room)
                      <option value="{{$room->number}}">{{$room->number}}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select name="subject" class="filter-select">
                  <option disabled selected value>fanni tanlang</option>
                  @foreach ($subjects as $subject)
                      <option value="{{$subject->name}}">{{$subject->name}}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select name="teacher" class="filter-select">
                  <option disabled selected value>o'qituvchini tanlang</option>
                  @foreach ($teachers as $teacher)
                      <option value="{{$teacher->name}}">{{$teacher->name}}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select name="group" class="filter-select">
                  <option disabled selected value>guruhni tanlang</option>
                  @foreach ($groups as $group)
                  <option value="{{$group->number}}">{{$group->number}}</option>
                  @endforeach
                </select>
              
                  @csrf
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search fa-fw">qidirish</i>
                  </button>
                </td>
              </form>
          </tr>
          @foreach ($schedules as $schedule)
          <tr>
            <td class="text-center">{{$schedule->day}}</td>
            <td class="text-center">{{$schedule->time}}</td>
            <td class="text-center">{{$schedule->room}}</td>
            <td class="text-center">{{$schedule->subject}}</td>
            <td class="text-center">{{$schedule->teacher}}</td>
            <td class="text-center">{{$schedule->group}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
</body>
</html>
