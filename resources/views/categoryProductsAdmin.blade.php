
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
                        <form action="http://www.ochag55.ru:8080/product" method="post" enctype="multipart/form-data">
                            @csrf
                            <p>Название товара: 
                            <input name="name" class="form-control">
                            </p>

                            <p>Цена: 
                            <input name = "price" type="text" class="form-control">
                            </p>

                            <p>Вес: 
                            <input name = "weight" type="text" class="form-control">
                            </p>


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
          <input id = "pImage{{$row->id}}" type="hidden" name = "imageHidden" value="{{$row->image}}">
            <div class="card-body">
              Название:<p class="card-text"> {{$row->name}}</p>
              <input id = "pName{{$row->id}}" name = 'pName' type="hidden" value="{{$row->name}}">
              Цена:<p class="card-text"> {{$row->price}}</p>
              <input id = "pPrice{{$row->id}}" name = 'pPrice' type="hidden" value="{{$row->price}}">
              Вес:<p class="card-text"> {{$row->weight}}</p>
              <input id = "pWeight{{$row->id}}" name = 'pWeight' type="hidden" value="{{$row->weight}}">
              Описание:<p class="card-text"> {{$row->description}}</p>
              <input id = "pDescription{{$row->id}}" name = 'pDescription' type="hidden" value="{{$row->description}}">
              <input name = "hiddenProductId" type="hidden" value="{{$row->id}}">
              <style>
                .card-text {
                  font-size: 15px;
                }
              </style>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                  <button id = "{{$row->id}}" name = "modelButton" type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#productEditModal">Редактировать</button>
                    <form action="/productDelete" method="post">
                      @csrf
                      <input name = "productId" type="hidden" value="{{$row->id}}">
                      <input type="hidden" name = "imageHiddenPost" value="{{$row->image}}">
                      <button type="submit" class="btn btn-sm btn-outline-secondary">Удалить</button>
                    </form>
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
                    <form action="http://www.ochag55.ru:8080/product" method="post" enctype="multipart/form-data">
                      @csrf  
                      @method('PUT')
                        <p>Название товара: 
                        <input id = "name" name="name" class="form-control" >
                        </p>
                          
                        <p>Цена: 
                        <input id = "price" name = "price" type="text" class="form-control" >
                        </p>
                        <input id = "editProductId" name = 'productEditId' type="hidden">

                        <p>Вес: 
                        <input id = "weight" name = 'weight' type="text" class="form-control">
                        </p>

                        <p>Категория: 
                        <select name="categoryId" multiple>
                          @foreach($categorys as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>      
                          @endforeach 
                        </select>
                        </p>

                        <p>Картинка товара: 
                        <input type="file" name="img">
                        <input id = "imgEditHidden" type="hidden" name="imgEditHidden">
                        </p>

                        <p>Описание товара: 
                        <textarea id = "descriptionEdit"  name="description" rows="8" cols="50"></textarea>
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
    <!-- Modal EDIT END-->
    
    <script>
      const nameEditId        = document.getElementById('name');
      const priceEditId       = document.getElementById('price');
      const weightEditId      = document.getElementById('weight');
      const editProductId     = document.getElementById('editProductId');
      const descriptionEditId = document.getElementById('descriptionEdit');
      const imgEdit           = document.getElementById('imgEditHidden');

      const modelButton  = document.getElementsByName('modelButton');
      const productId    = document.getElementsByName('hiddenProductId');
      const pName        = document.getElementsByName('pName');
      const pPrice       = document.getElementsByName('pPrice');
      const pWeight      = document.getElementsByName('pWeight');
      const pDescription = document.getElementsByName('pDescription');
      const pImage       = document.getElementsByName('imageHidden');
      
      var cartData;
      var arrCartData = [];

      console.log(weightEditId.value);
      console.log(pWeight.value);


      for(let i = 0; i < pName.length; i++)
      {     
        cartData = {
          productId    : productId[i].value,
          pName        : pName[i].value,
          pPrice       : pPrice[i].value,
          pWeight      : pWeight[i].value,
          pImage       : pImage[i].value,
          pDescription : pDescription[i].value
        };
        //console.log(productId[i].value);
        arrCartData[i] = cartData;
      }
     
      modelButton.forEach((element) => {
        var modelButtonId = document.getElementById(element.id);
        //console.log(modelButtonId.id);
        modelButtonId.addEventListener('click', (event) => {
          for(let i = 0; i < arrCartData.length; i++)
          {
            if(modelButtonId.id == arrCartData[i].productId)
            {
              nameEditId.value        = arrCartData[i].pName;
              priceEditId.value       = arrCartData[i].pPrice;
              weightEditId.value      = arrCartData[i].pWeight;
              editProductId.value     = arrCartData[i].productId;
              imgEdit.value           = arrCartData[i].pImage;
              descriptionEditId.value = arrCartData[i].pDescription;
            }
          }
        });
      });
    </script>
        
@endsection