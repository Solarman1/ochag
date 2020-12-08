
@extends('layouts.app')

@section('content')
<h2></h2>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <!-- <button type="button" class="btn btn-sm btn-outline-secondary" onclick="document.location='/addCategory'">Добавить категорию</button>-->
      <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal">
        Добавить Продукт
        </button>

        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="productModalLabel">Добавление товара</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- Modal BODY  START-->
        <div class="modal-body">
            <div class="container">
                <div class="card"> 
                    <div class="card-header">
                        <form action="/product" method="post">
                            @csrf
                            <p>Название товара: 
                            <input name="name" class="form-control">
                            </p>

                            <p>Цена: 
                            <input name = "price" type="text" class="form-control">
                            </p>

                            {{-- <p>Объем: 
                            <input type="text" class="form-control">
                            </p> --}}


                            <p>Категория: 
                            <select name="categoryId">
                              @foreach($categorys as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>      
                              @endforeach 
                            </select>
                            </p>

                            <p>Картинка товара: 
                            <input type="file" name="img">
                            </p>

                            <p>Описание товара: 
                            <textarea  name="description" rows="8" cols="50"></textarea>
                            </p>

                            <div>
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </div>
                            
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

<div class="album py-5 bg-light">
    <div class="container">

    @foreach($products as $row)

      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1763e349366%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1763e349366%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

    @endforeach  

      </div>
    </div>
  </div>
  
@endsection