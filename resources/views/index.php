<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>REST test</title>

    <!-- Bootstrap -->
    <link href="<?= asset('css/app.css') ?>" rel="stylesheet">

  </head>
  <body>


    <div class="rest-test" ng-app="restTest" ng-controller="personController">

        <div class="modal fade" tabindex="-1" role="dialog" id="updateModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit contact</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <input ng-model="personToUpdate.first_name" class="form-control"  placeholder="First name (required)">
                    <div class="error" ng-if="updateErrors.first_name"><p>{{ updateErrors.first_name }}</p></div>
                </div>
                <div class="form-group">
                    <input ng-model="personToUpdate.last_name" class="form-control"  placeholder="Last name (required)">
                    <div class="error" ng-if="updateErrors.last_name"><p>{{ updateErrors.last_name }}</p></div>
                </div>
                <div class="form-group">
                    <input ng-model="personToUpdate.email" class="form-control"  placeholder="Email (required)">
                    <div class="error" ng-if="updateErrors.email"><p>{{ updateErrors.email }}</p></div>
                </div>
                <div class="form-group">
                    <input ng-model="personToUpdate.phone" class="form-control"  placeholder="Phone number (required)">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" ng-click="updatePerson(personToUpdate)">Save</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add contact</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <input ng-model="personToAdd.first_name" class="form-control" placeholder="First name (required)">
                    <div class="error" ng-if="addErrors.first_name"><p>{{ addErrors.first_name }}</p></div>
                </div>
                <div class="form-group">
                    <input ng-model="personToAdd.last_name" class="form-control" placeholder="Last name (required)">
                    <div class="error" ng-if="addErrors.last_name"><p>{{ addErrors.last_name }}</p></div>
                </div>
                <div class="form-group">
                    <input ng-model="personToAdd.email" class="form-control" placeholder="Email (required)">
                    <div class="error" ng-if="addErrors.email"><p>{{ addErrors.email }}</p></div>
                </div>
                <div class="form-group">
                    <input ng-model="personToAdd.phone" class="form-control" placeholder="Phone number">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" ng-click="addPerson(personToAdd)">+ Add</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <span class="navbar-brand">
                        <span>REST test</span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="container" ng-cloak>

            <div class=panel>
                <button type="button" class="btn btn-primary" ng-click="showAddModal()">
                  + Add contact
                </button>
            </div>
            
            <div class="panel" ng-repeat="person in people">
                
                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <span>{{ person.first_name }} {{ person.last_name }}</span>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <span>{{ person.email }}</span>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <span>{{ person.phone }}</span>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="btns">
                                <button type="submit" class="btn btn-primary" ng-click="showUpdateModal(person)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                                <button type="button" class="btn btn-danger" ng-click="deletePerson(person.id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </div>

            </div>

        </div> <!-- container -->

    </div> <!-- app -->

    
    <script src="<?= asset('js/app.js') ?>"></script>
  </body>
</html>