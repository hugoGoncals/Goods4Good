@extends('layouts.adminLayout')

   @section('content')

      <div id="page-wrapper" ng-controller="adminProductsController as vm">
        <h1>Create basket</h1>
        <hr>


        <div class="row" id="escolha">
          <div class="col-md-6" style="text-align: center">
            <h3 class="text-center">
              Create a manual basket.
            </h3>
            <img src="{{ asset('imgs/logos/logo.png') }}"  alt="Bootstrap Image Preview" ng-click="vm.showManualBasket();"/>
          </div>
          <div class="col-md-6" style="text-align: center">
            <h3 class="text-center">
              Create a random basket.
            </h3>
            <img src="{{ asset('imgs/logos/logo.png') }}"  alt="Bootstrap Image Preview" ng-click="vm.showRandomBasket();"/>
          </div>
        </div>
        <br>
        <br>
        <br>

        <div class="row" id="cabazAutomatico" style="display:none">
            <div class="col-md-6">
              <h3 class="text-center">
                Insert information.
              </h3>
              <div class="col-md-12" >
                  <form class="form-inline">
                    <label>Providers</label>
                    <select id="providersAutomatico" class="form-control input-sm" ng-model="provid" 
                        ng-options="prov.id as prov.name for prov in vm.listProviders">
                        <option value="">Escolha uma opcao</option>
                    </select>
                  </form>
                  <hr>
                </div>
                <div class="col-md-12" >
                    <form class="form-inline">
                      <label>Categories</label>
                      <select id="opcoesCat" class="form-control input-sm" ng-model="categorias" 
                          ng-options="cat.id as cat.description for cat in vm.listaCategorias">
                          <option value="">Escolha uma opcao</option>
                      </select>
                    </form>
                    <hr>
                  </div>
                  <div class="col-md-12" >
                      <div class="slidecontainer">
                          <input type="range" min="1" max="100" value="50" class="slider" ng-model="rang" id="myRange">
                          <p>Value: <span id="demo"></span> Euros</p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" ng-click="vm.createRandomBasket();">Create Basket</button>
            </div>
            <div class="col-md-6">
              <h3 class="text-center">
            Final Basket
              </h3>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-clock-o"></i> Create Baskets</h3>
                </div>
                <div class="panel-body">
                  <h3>Basket Name: </h3>
                  <input class="form-control" type="text" ng-model="nomeCarro">
                  <br>
                  <div class="list-group">
                    <table class="table table-bordered table-hover tablesorter">
                      <thead>
                        <tr>
                          <th>Product <i class="fa fa-sort"></i></th>
                          <th>Quantity <i class="fa fa-sort"></i></th>
                          <th>Price <i class="fa fa-sort"></i></th>
                          <th colspan="2">Total <i class="fa fa-sort"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="!vm.listProdsCarAut.length">
                          <td colspan="5" class="text-center"> Sem elementos</td>
                        </tr>
                        <tr ng-repeat="product in vm.listProdsCarAut">
                          <td class="col-sm-4">@{{ product.nome }}</td>
                          <td class="col-sm-1"><input type="number" value="@{{ product.quantidade }}" class="form-control" ng-model="product.quantity"  
                          min="1" ></td>
                          <td class="col-sm-1"><strong>@{{ product.preco | currency:'€'}}</strong></td>
                          <td class="col-sm-1 text-right"><strong>@{{ product.quantidade * product.preco || 0 | currency:'€'}}</strong></td>
                          <td class="col-sm-1">
                            <button type="button" class="btn btn-xs btn-danger" ng-click="vm.removeFromAutomaticCar($index)">
                                <span class="glyphicon glyphicon-remove"></span> Remove
                            </button>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot ng-if="vm.listProdsCar.length">
                        <td colspan="3" class="text-right">Total</td>
                        <td class="text-right col-sm-1">
                              @{{ vm.getTotalCar() | currency:'€'}}
                        </td>
                        <td class="text-right col-sm-1"></td>
                      </tfoot>
                    </table>
                  </div>
                  <div class="text-right">
                    <button type="button" class="btn btn-default" ng-click="vm.saveAutomaticCar()" ng-if="vm.listProdsCarAut.length">Save card</button>
                  </div>
                </div>
              </div>
            </div>
          </div>


        <div class="row" id="cabazManual" style="display:none">
            <div class="col-md-12" >
                <form class="form-inline">
                  <div class="form-group ">
                    <label >Search</label>
                    <input type="text" ng-model="search" class="form-control input-sm" placeholder="Search">
                  </div>
                </form>
                <hr>
              </div>
              <div class="col-md-12" >
                  <form class="form-inline">
                    <label>Providers</label>
                    <select id="opcoes" class="form-control input-sm" ng-model="provid" 
                        ng-options="prov.id as prov.name for prov in vm.listProviders">
                        <option value="">Escolha uma opcao</option>
                    </select>
                  </form>
                  <hr>
                </div>
          <div class="col-lg-6" >
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o"></i> Produts</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                <table class="table table-bordered table-hover tablesorter">
                  <thead>
                    <tr>
                      <th>Product <i class="fa fa-sort"></i></th>
                      <th>Quantity <i class="fa fa-sort"></i></th>
                      <th>Provider <i class="fa fa-sort"></i></th>
                      <th colspan="2">Price <i class="fa fa-sort"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                   <tr ng-repeat="product in vm.listProduts | orderBy:propertyName:reverse|filter:provid||undefined: true|filter:search">
                      <td class="col-sm-4">
                        @{{ product.description }}
                      </td>
                      <td class="col-sm-1">@{{product.quantity}}</td>
                      <td class="col-sm-1">@{{product.idprovider}}</td>
                      <td class="col-sm-1"><strong>@{{ product.price }}</strong> € </td>
                      <td class="col-sm-1">
                        <button type="button" class="btn btn-default" ng-click="vm.addCar(product); vm.disableInput()">add</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o"></i> Create Baskets</h3>
              </div>
              <div class="panel-body">
                <h3>Basket Name: </h3>
                <input class="form-control" type="text" ng-model="vm.car.name">
                <br>
                <div class="list-group">
                  <table class="table table-bordered table-hover tablesorter">
                    <thead>
                      <tr>
                        <th>Product <i class="fa fa-sort"></i></th>
                        <th>Quantity <i class="fa fa-sort"></i></th>
                        <th>Price <i class="fa fa-sort"></i></th>
                        <th colspan="2">Total <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-if="!vm.listProdsCar.length">
                        <td colspan="5" class="text-center"> Sem elementos</td>
                      </tr>
                      <tr ng-repeat="product in vm.listProdsCar">
                        <td class="col-sm-4">@{{ product.description }}</td>
                        <td class="col-sm-1"><input type="number" value="0" class="form-control" ng-model="product.quantity"  
                        min="1" ></td>
                        <td class="col-sm-1"><strong>@{{ product.price | currency:'€'}}</strong></td>
                        <td class="col-sm-1 text-right"><strong>@{{ product.quantity * product.price || 0 | currency:'€'}}</strong></td>
                        <td class="col-sm-1">
                          <button type="button" class="btn btn-xs btn-danger" ng-click="vm.removeFromCar($index)">
                              <span class="glyphicon glyphicon-remove"></span> Remove
                          </button>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot ng-if="vm.listProdsCar.length">
                      <td colspan="3" class="text-right">Total</td>
                      <td class="text-right col-sm-1">
                            @{{ vm.getTotalCar() | currency:'€'}}
                      </td>
                      <td class="text-right col-sm-1"></td>
                    </tfoot>
                  </table>
                </div>
                <div class="text-right">
                  <button type="button" class="btn btn-default" ng-click="vm.saveCar()" ng-if="vm.listProdsCar.length">Save card</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /#wrapper -->
    @endSection('content')