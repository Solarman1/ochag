
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
                        <form action="/product" method="post" enctype="multipart/form-data">
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
                                <button type="submit" class="btn btn-success">Добавить</button>
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
  <h2>
    @foreach($categoryName as $row)
    {{$row->name}}
  @endforeach 
     </h2> 
<div class="album py-5 bg-light">
 
    <div class="container">
      <div class="row">
    @foreach($products as $row)
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
          <img class="card-img-top" alt="" style="height: 225px; width: 100%; margin: auto; display: block;" src="{{asset('/storage/productImages/'.$row->image)}}" data-holder-rendered="true">
            <div class="card-body">
              Название:<p id = "pName" class="card-text"> {{$row->name}}</p>
              Цена:<p id = "pPrice" class="card-text"> {{$row->price}}</p>
              Описание:<p id = "pDescription" class="card-text"> {{$row->description}}</p>
              <input id = "productId" type="hidden" value="{{$row->id}}">
              <style>
                .card-text {
                  font-size: 15px;
                }
              </style>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#productEditModal">Редактировать</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Удалить</button>
                  </div>                            
                </div>
            </div>
          </div>
        </div>
    @endforeach  

      </div>
    </div>
  </div>


          <!-- Modal EDIT -->
          <div class="modal fade" id="productEditModal" tabindex="-1" role="dialog" aria-labelledby="productEditModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productEditModalLabel">Редактирование товара</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal BODY  START-->
            <div class="modal-body">
                <div class="container">
                    <div class="card"> 
                        <div class="card-header">
                            <form action="/product" method="post" enctype="multipart/form-data">
                              @csrf  
                              @method('PUT')
                                <p>Название товара: 
                                <input id = "name" name="name" class="form-control">
                                </p>
                                  
                                <p>Цена: 
                                <input id = "price" name = "price" type="text" class="form-control">
                                </p>
                                <input id = "editProductId" name = 'productEditId' type="hidden">
                                <input id = "categoryIdEditModel" name = 'categoryIdEditModel' type="hidden">
                                {{-- <p>Объем: 
                                <input type="text" class="form-control">
                                </p> --}}
    
                                <p>Категория: 
                                <select name="categoryId" multiple>
                                  @foreach($categorys as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>      
                                  @endforeach 
                                </select>
                                </p>
    
                                <p>Картинка товара: 
                                <input type="file" name="img">
                                </p>
    
                                <p>Описание товара: 
                                <textarea id = "descriptionEdit"  name="description" rows="8" cols="50"></textarea>
                                </p>
    
                                <div>
                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                </div>
                                <script>
                                  const nameEditId        = document.getElementById('name');
                                  const priceEditId       = document.getElementById('price');
                                  const editProductId         = document.getElementById('editProductId');
                                 // const weightEditId      = document.getElementById();
                                  const descriptionEditId = document.getElementById('descriptionEdit');

                                  const productId    = document.getElementById('productId');
                                  const pName        = document.getElementById('pName');
                                  const pPrice       = document.getElementById('pPrice');
                                  const pDescription = document.getElementById('pDescription');

                                  nameEditId.value        = pName.innerHTML;
                                  priceEditId.value       = pPrice.innerHTML;
                                  descriptionEditId.value = pDescription.innerHTML;
                                  editProductId.value     = productId.value;
                                </script>
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
            <!-- Modal EDIT END-->
@endsection