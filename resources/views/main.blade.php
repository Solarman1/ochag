
@extends('layouts.app')

@section('content')
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <!-- <button type="button" class="btn btn-sm btn-outline-secondary" onclick="document.location='/addCategory'">Добавить категорию</button>-->
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
Добавить категорию
</button>

<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="categoryModalLabel">Modal title</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<!-- Modal BODY  START-->
  <div class="modal-body">
      <div class="container">
          <div class="card"> 
              <div class="card-header">
                  <form action="/category" method="post">
                      @csrf
                      <h1 class="h2">Введите название категории</h1>
                      <p></p>
                      <input name="categoryName" class="form-control" placeholder="Enter URL" >
                      <button type="submit" class="btn btn-success">Сохранить</button>
                  </form>
              </div>                                                    
           </div>
       </div>       
  </div>
<!-- Modal BODY  END-->
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>
<!-- Modal END-->


    </div>
  </div>
  

<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>№</th>
          <th>Название категории</th>
          <th>Действие</th>

        </tr>
      </thead>
      <tbody>
        @foreach($categorys as $row) 
            <tr>
            <td>{{$row->id}}</td>
            <td><a class="nav-link" href="/admin/category/{{$row->id}}">{{$row->name}}</a></td>
            <td>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="document.location='/editCategory/{{$row->id}}'">Редактировать</button> 
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="document.location='/deleteCategory/{{$row->id}}'">Удалить</button>
            </td>
            </tr>
        @endforeach 
      </tbody>
    </table>
  </div>
  
@endsection