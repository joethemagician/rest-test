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

        <div class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ editMode }} contact</h4>
              </div>
              <div class="modal-body">
                <input>
                <input>
                <input>
                <input>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <span>REST test</span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="container">
            
            <div class="panel" ng-repeat="person in people">
                <form ng-submit="updatePerson(person)">
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
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                                <button type="button" class="btn btn-danger" ng-click="deletePerson(person.id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div> <!-- container -->

    </div> <!-- app -->

    
    <script src="<?= asset('js/app.js') ?>"></script>
  </body>
</html>