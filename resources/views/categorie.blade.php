@extends('layouts.adminLayout')

@section('content')
  <div id="page-wrapper" ng-controller="CategorieController">
    <h4><i class="fa fa-hashtag" aria-hidden="true"></i> | Categories</h4>
    <hr>
    <div class="row">

      <div class="col-md-12" >
        <form class="form-inline">
          <div class="form-group ">
            <label >Search</label>
            <input type="text" ng-model="search" class="form-control input-sm" placeholder="Search">
          </div>
        </form>
        <hr>
      </div>
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"> Categories list</h3>
          </div>
          <div class="panel-body">
            <div class="list-group">
            <table class="table table-bordered table-hover tablesorter">
            	<thead>
                <tr>
                  <th class="col-md-7" ng-click="sortBy('description')">Category<span class="sortorder" ng-show="propertyName === 'description'" ng-class="{reverse: reverse}"></span></th>
                  <th class="col-md-2"><button id="btn-add" class="btn btn-success btn-sm" ng-click="toggle('add', 0)"><i class="fa fa-plus" aria-hidden="true"></i> Add New Category </button></th>
                </tr>
              </thead>
              <tbody>
                  <tr ng-repeat="categorie in categories|orderBy:propertyName:reverse|filter:search">
    			        <td>@{{categorie.description }}</td>
    			        <td>
                    <button class="btn btn-default btn-sm btn-detail" ng-click="toggle('edit', categorie.id)">Edit <i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-left: 10px"></i></button>
                    <button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(categorie.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>  
                  </td>
    			      </tr>
              </tbody>
            </table>
            <dir-pagination-controls
                 max-size="5"
                 direction-links="true"
                 boundary-links="true" >
              </dir-pagination-controls>
            </div>
          </div>
        </div>
      </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-hashtag" aria-hidden="true"></i> | @{{form_title}}</h4>
          </div>
          <div class="modal-body">
            <form name="frmEmployees" class="form-horizontal" novalidate="">
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Category:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control has-error input-sm" id="name" name="name" placeholder="description" value="@{{categorie.description}}" ng-model="categorie.description" ng-required="true">
                    <span class="help-inline" 
                    ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched">Name of the category field is required</span>
                </div>
              </div>
            </form>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
        </div>
      </div>
    </div>
    </div>
  </div>
@endSection('content')
