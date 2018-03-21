@extends('layouts.adminLayout')

@section('content')
    <div id="page-wrapper" ng-controller="InboxController">
      <div class="row">
        <div class="col-md-12">
          <h4><i class="icon-envelope-l"></i> Inbox</h4> 
          <hr>
            <button id="btn-add" class="btn btn-success btn-sm" ng-click="toggleNewOpen()"><i class="fa fa-plus" aria-hidden="true"></i> New message </button>
          <hr>                
          <table class="table table-bordered table-hover tablesorter">
            <thead>
              <tr>
                <th></th>
                <th>From <i class="fa fa-sort"></i></th>
                <th>Subject</th>
                <th>Data</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <!-- unreaded -->
              <tr ng-repeat="msg in msg"> 
                <td><button id="btn-add" class="btn btn-primary btn-sm" ng-click="toggle(msg.id)"> Read </button></td>
                <td>@{{ msg.from }}</td>
                <td>@{{ msg.subject }}</td>
                <td>@{{ msg.datesend }}</td>
                <td><span class="label label-danger">@{{ msg.status }}</span></td>
                <td><button id="btn-add" class="btn btn-danger btn-sm" ng-click="toggleDeleteMsg(msg.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
              </tr>
            <!-- readed -->
              <tr ng-repeat="msgr in msgreaded">
                <td><button id="btn-add" class="btn btn-primary btn-sm" ng-click="toggle(msgr.id)"> Read </button></td>
                <td>@{{ msgr.from }}</td>
                <td>@{{ msgr.subject }}</td>
                <td>@{{ msgr.datesend }}</td>
                <td><span class="label label-success">@{{ msgr.status }}</span></td>
                <td><button id="btn-add" class="btn btn-danger btn-sm" ng-click="toggleDeleteMsg(msgr.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- mensagens enviadas -->
      <div class="row">
        <div class="col-md-12">
          <h4><i class="icon-envelope-l"></i> Messages sent</h4> 
          <hr>                
          <table class="table table-bordered table-hover tablesorter">
            <thead>
              <tr>
                <th>To <i class="fa fa-sort"></i></th>
                <th>Subject</th>
                <th>Data</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <!-- unreaded -->
              <tr ng-repeat="msgsent in msgsent"> 
                <td>@{{ msgsent.to }}</td>
                <td>@{{ msgsent.subject }}</td>
                <td>@{{ msgsent.datesend }}</td>
                <td><button id="btn-add" class="btn btn-danger btn-sm" ng-click="toggleDeleteMsg(msgsent.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> 
      <!-- Mensage modal (readed and unreaded) -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Message details</h4>
            </div>
            <div class="modal-body">
              <div class="row" ng-repeat="abc in showmsg">
                <div class="col-sm-12" >                 
                    <p><b>From:</b> @{{ abc.from }}</p>
                </div>
                <div class="col-sm-12">                 
                    <p><b>Subject:</b> @{{ abc.subject }}</p>
                    <hr>
                </div>  
                <div class="col-sm-12">                 
                    <p>@{{ abc.description }}</p> 
                    <hr>
                </div>
              
                <div class="col-sm-4"></div>
                <div class="col-sm-4"></div> 
                <div class="col-sm-4" > <!-- change msg status -->
                  <button id="btn-add" class="btn btn-success btn-sm" ng-click="toggleStatus(abc.id)"> OK! </button>
                </div> 
              </div>      
            </div>
          </div>
        </div>
      </div>
      <!-- New message modal -->
       <div class="modal fade" id="myModalNewMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">New message</h4>
            </div>
            <div class="modal-body">
              <form novalidate class="simple-form">
                <div class="form-group">
                  <label class="col-md-4 control-label" for="to">To:</label>
                  <div class="col-md-8">
                    <select id="to" name="to" ng-model="cv.to" class="form-control" required="true">
                      <option ng-repeat="uti in utiTo" value="@{{ uti.id }}">@{{ uti.name }}</option>
                    </select>
                    <hr>
                  </div>
                </div>

                <!-- Text input-->
                <div class="form-group row">
                  <label class="col-md-4 control-label" for="textinput">Subject:</label>  
                  <div class="col-md-8">
                  <input id="textinput" name="textinput" ng-model="cv.subject" type="text" placeholder="subject" class="form-control input-md" required="true">
                    
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group row">
                  <label class="col-md-4 control-label" for="textarea">Message:</label>
                  <div class="col-md-12">                     
                    <textarea class="form-control" id="textarea" ng-model="cv.description" name="textarea" style="textarea {resize: none;}" required="true"></textarea>
                  </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group row">
                  <label class="col-md-8 control-label" for="send"></label>
                  <div class="col-md-4">
                    <button id="send" name="send" class="btn btn-success" ng-click="toggleNew(cv)">Send</button>
                    <button id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
                  </div>
                </div>
              </form>  
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
